<?php
namespace Permit\Model;

use Zend\Db\Sql\Delete;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql as Sql;
use Zend\Db\Sql\Update;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class PermitObject implements InputFilterAwareInterface
{
    protected $dbAdapter;
    protected $table;
    protected $inputFilter;
    protected $private_attributes;
    protected $public_attributes;
    protected $primary_key = 'command_uuid';
    
    public function __construct($dbAdapter = null)
    {
        $this->dbAdapter = $dbAdapter;
        
        $this->private_attributes = [
            'dbAdapter',
            'table',
            'inputFilter',
            'private_attributes',
            'public_attributes',
            'primary_key',
        ];
        
        $this->public_attributes = array_diff(array_keys(get_object_vars($this)), $this->private_attributes);
    }
    
    public function exchangeArray($data)
    {
        foreach ($this->public_attributes as $var) {
            $this->$var = (!empty($data[$var])) ? $data[$var] : null;
        }
    }
    
    public function getArrayCopy()
    {
        foreach ($this->public_attributes as $var) {
            $data[$var] = $this->{$var};
        }
        return $data;
    }

    public function getTableName()
    {
        return $this->table;
    }
    
    public function setTableName($table)
    {
        $this->table = $table;
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception ("Not Used");
    }
    
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
        
            foreach ($this->public_attributes as $var) {
                $inputFilter->add([
                    'name' => $var,
                    'required' => false,
                    'filters' => [
                        ['name' => StripTags::class],
                        ['name' => StringTrim::class],
                    ],
                ]);
            }
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
    
    public function fetchAll()
    {
        $sql = new Sql($this->dbAdapter);
        
        $select = new Select();
        $select->from($this->table);;
        
        $statement = $sql->prepareStatementForSqlObject($select);
        
        try {
            $resultSet = $statement->execute();
        } catch (\Exception $e) {
            return $e;
        }
        
        return $resultSet;
    }

    public function create()
    {
        $sql = new Sql($this->dbAdapter);
        $values = $this->getArrayCopy();
        
        $insert = new Insert();
        $insert->into($this->table);
        $insert->values($values);
        
        $statement = $sql->prepareStatementForSqlObject($insert);
        
        try {
            $resultSet = $statement->execute();
        } catch (\Exception $e) {
            return $e;
        }
        return $this;
    }
    
    /**
     * 
     * @param array $criteria
     * @return \Exception|\Permit\Model\PermitObject
     */
    public function read(Array $criteria)
    {
        $sql = new Sql($this->dbAdapter);
        
        $select = new Select();
        $select->from($this->table);
        $select->where($criteria);
        
        $statement = $sql->prepareStatementForSqlObject($select);
        
        try {
            $resultSet = $statement->execute();
        } catch (\Exception $e) {
            return $e;
        }
        
        $this->exchangeArray($resultSet->current());
        return $this;
    }
    
    public function update()
    {
        $sql = new Sql($this->dbAdapter);
        $values = $this->getArrayCopy();
        $prikey = $this->primary_key;
        
        $update = new Update();
        $update->table($this->table);
        $update->set($values);
        $update->where(array('{$this->prikey}' => $prikey));
        
        $statement = $sql->prepareStatementForSqlObject($update);
        
        try {
            $resultSet = $statement->execute();
        } catch (\Exception $e) {
            return $e;
        }
        return $this;
    }
    
    public function delete()
    {
        $prikey = $this->primary_key;
        
        $sql = new Sql($this->dbAdapter);
        
        $delete = new Delete();
        $delete->from($this->table)->where(array($prikey => $this->$prikey));
        $statement = $sql->prepareStatementForSqlObject($delete);
        
        try {
            $resultSet = $statement->execute();
        } catch (\Exception $e) {
            return $e;
        }
        return true;
    }
    
    
}