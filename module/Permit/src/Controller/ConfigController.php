<?php 
namespace Permit\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Permit\Traits\AdapterTrait;
use Zend\Db\Sql\Ddl\CreateTable;
use Permit\Model\Permit;
use Zend\Db\Sql\Ddl\Column;
use Zend\Db\Sql\Ddl\Constraint;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Ddl\DropTable;

class ConfigController extends AbstractActionController
{
    use AdapterTrait;
    
    public function indexAction()
    {
        return new \Zend\View\Model\ViewModel();
    }
    
    public function createAction()
    {
        $permit = new Permit();
        $create = new CreateTable($permit->getTableName());
        $permit_number = new Column\Integer('PERMIT_NUMBER');
        $permit_number->setOption('AUTO_INCREMENT', TRUE);
        
        $create->addColumn(new Column\Varchar('UUID', 36))
            ->addConstraint(new Constraint\PrimaryKey('UUID'))
            
            ->addColumn($permit_number)
            ->addConstraint(new Constraint\UniqueKey('PERMIT_NUMBER'))
            
            ->addColumn(new Column\Varchar('RESIDENTIAL_OR_COMMERCIAL', 255, TRUE))
            
            ->addColumn(new Column\Integer('BUILDING_PERMIT', TRUE))
            ->addColumn(new Column\Integer('ELECTRIC_PERMIT', TRUE))
            ->addColumn(new Column\Integer('PLUMBING_PERMIT', TRUE))
            ->addColumn(new Column\Integer('HVAC_PERMIT', TRUE))
            ->addColumn(new Column\Integer('DEMOLITION_PERMIT', TRUE))
            
            ->addColumn(new Column\Varchar('LOCATION_OF_PROPOSED_WORK', 255, TRUE))
            
            ->addColumn(new Column\Varchar('PERMIT_APPLICANT_NAME', 255, TRUE))
            ->addColumn(new Column\Varchar('APPLICANTS_ADDRESS', 255, TRUE))
            ->addColumn(new Column\Varchar('APPLICANTS_CITY', 255, TRUE))
            ->addColumn(new Column\Varchar('APPLICANTS_STATE', 255, TRUE))
            ->addColumn(new Column\Varchar('APPLICANTS_ZIP', 255, TRUE))
            ->addColumn(new Column\Varchar('APPLICANTS_PHONE', 255, TRUE))
            ->addColumn(new Column\Varchar('APPLICANTS_FAX', 255, TRUE))
            ->addColumn(new Column\Varchar('APPLICANTS_EMAIL', 255, TRUE))
            
            ->addColumn(new Column\Text('PERMIT_DESCRIPTION', NULL, TRUE))
            ->addColumn(new Column\Integer('NUMBER_OF_DWELLING_UNITS', TRUE))
            
            ->addColumn(new Column\Varchar('CONTRACTORS_LICENSE_NUMBER', 255, TRUE))
            
            ->addColumn(new Column\Varchar('OWNER_OF_PROPERTY_NAME', 255, TRUE))
            ->addColumn(new Column\Varchar('OWNERS_ADDRESS', 255, TRUE))
            ->addColumn(new Column\Varchar('OWNERS_CITY', 255, TRUE))
            ->addColumn(new Column\Varchar('OWNERS_STATE', 255, TRUE))
            ->addColumn(new Column\Varchar('OWNERS_ZIP', 255, TRUE))
            
            ->addColumn(new Column\Floating('ESTIMATED_COSTS', 16, 2, TRUE))
            ->addColumn(new Column\Floating('PERMIT_FEE', 16, 2, TRUE))
            
            ->addColumn(new Column\Varchar('CHECK_NUMBER', 255, TRUE))
            
            ->addColumn(new Column\Floating('TOTAL_FEE', 16, 2, TRUE))
            ->addColumn(new Column\Floating('STATE_FEE', 16, 2, TRUE))
            ->addColumn(new Column\Floating('CITY_FEE', 16, 2, TRUE))
            
            ->addColumn(new Column\Datetime('PAYMENT_DATE', TRUE))
            ->addColumn(new Column\Datetime('APPLICATION_DATE', TRUE))
            ->addColumn(new Column\Datetime('CREATION_DATE', TRUE))
            ->addColumn(new Column\Datetime('MODIFIED_DATE', TRUE));

        $sql = new Sql($this->adapter);
        $this->adapter->query($sql->buildSqlString($create), $this->adapter::QUERY_MODE_EXECUTE);
        return $this->redirect()->toRoute('config/default', ['action' => 'index']);
    }
    
    public function dropAction()
    {
        $permit = new Permit();
        $drop = new DropTable($permit->getTableName());
        
        $sql = new Sql($this->adapter);
        $this->adapter->query($sql->buildSqlString($drop), $this->adapter::QUERY_MODE_EXECUTE);
        return $this->redirect()->toRoute('config/default', ['action' => 'index']);
    }
}