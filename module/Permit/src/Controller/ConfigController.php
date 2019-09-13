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
            
            ->addColumn(new Column\Varchar('RESIDENTIAL_OR_COMMERCIAL', 11, TRUE))
            
            ->addColumn(new Column\Integer('BUILDING_PERMIT', TRUE))
            ->addColumn(new Column\Integer('ELECTRIC_PERMIT', TRUE))
            ->addColumn(new Column\Integer('PLUMBING_PERMIT', TRUE))
            ->addColumn(new Column\Integer('HVAC_PERMIT', TRUE))
            ->addColumn(new Column\Integer('DEMOLITION_PERMIT', TRUE))
            
            ->addColumn(new Column\Varchar('LOCATION_OF_PROPOSED_WORK', 50, TRUE))
            
            ->addColumn(new Column\Varchar('PERMIT_APPLICANT_NAME', 50, TRUE))
            ->addColumn(new Column\Varchar('APPLICANTS_ADDRESS', 50, TRUE))
            ->addColumn(new Column\Varchar('APPLICANTS_CITY', 50, TRUE))
            ->addColumn(new Column\Varchar('APPLICANTS_STATE', 2, TRUE))
            ->addColumn(new Column\Varchar('APPLICANTS_ZIP', 10, TRUE))
            ->addColumn(new Column\Varchar('APPLICANTS_PHONE', 14, TRUE))
            ->addColumn(new Column\Varchar('APPLICANTS_FAX', 14, TRUE))
            ->addColumn(new Column\Varchar('APPLICANTS_EMAIL', 50, TRUE))
            
            ->addColumn(new Column\Text('PERMIT_DESCRIPTION', NULL, TRUE))
            ->addColumn(new Column\Decimal('NUMBER_OF_DWELLING_UNITS', 16, 2, TRUE))
            
            ->addColumn(new Column\Varchar('CONTRACTORS_LICENSE_NUMBER', 50, TRUE))
            
            ->addColumn(new Column\Varchar('OWNER_OF_PROPERTY_NAME', 50, TRUE))
            ->addColumn(new Column\Varchar('OWNERS_ADDRESS', 50, TRUE))
            ->addColumn(new Column\Varchar('OWNERS_CITY', 50, TRUE))
            ->addColumn(new Column\Varchar('OWNERS_STATE', 2, TRUE))
            ->addColumn(new Column\Varchar('OWNERS_ZIP', 10, TRUE))
            
            ->addColumn(new Column\Decimal('ESTIMATED_COSTS', 16, 2, TRUE))
            ->addColumn(new Column\Decimal('PERMIT_FEE', 16, 2, TRUE))
            
            ->addColumn(new Column\Varchar('CHECK_NUMBER', 20, TRUE))
            
            ->addColumn(new Column\Decimal('TOTAL_FEE', 16, 2, TRUE))
            ->addColumn(new Column\Decimal('STATE_FEE', 16, 2, TRUE))
            ->addColumn(new Column\Decimal('CITY_FEE', 16, 2, TRUE))
            
            ->addColumn(new Column\Date('PAYMENT_DATE', TRUE))
            ->addColumn(new Column\Date('APPLICATION_DATE', TRUE))
            ->addColumn(new Column\Date('CREATION_DATE', TRUE))
            ->addColumn(new Column\Date('MODIFIED_DATE', TRUE))
        
            ->addColumn(new Column\Integer('CITY_PROJECT', TRUE))
            ->addColumn(new Column\Decimal('CHARGEABLE_AMOUNT', 16, 2, TRUE))
            ->addColumn(new Column\Integer('_OLDID', TRUE))
            ->addColumn(new Column\Decimal('QPERMIT', 16, 2, TRUE))
            ->addColumn(new Column\Decimal('Q', 16, 2, TRUE));

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