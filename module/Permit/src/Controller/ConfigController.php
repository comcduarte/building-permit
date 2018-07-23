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
        
        $create->addColumn(new Column\Varchar('UUID', 36))
            ->addConstraint(new Constraint\PrimaryKey('UUID'))
            
            ->addColumn(new Column\Integer('PERMIT_NUMBER', FALSE, 0, ['AUTO_INCREMENT', TRUE]))
            ->addColumn(new Column\Varchar('RESIDENTIAL_OR_COMMERCIAL', 255))
            
            ->addColumn(new Column\Integer('BUILDING_PERMIT'))
            ->addColumn(new Column\Integer('ELECTRIC_PERMIT'))
            ->addColumn(new Column\Integer('PLUMBING_PERMIT'))
            ->addColumn(new Column\Integer('HVAC_PERMIT'))
            ->addColumn(new Column\Integer('DEMOLITION_PERMIT'))
            
            ->addColumn(new Column\Varchar('LOCATION_OF_PROPOSED_WORK', 255))
            
            ->addColumn(new Column\Varchar('PERMIT_APPLICANT_NAME', 255))
            ->addColumn(new Column\Varchar('APPLICANTS_ADDRESS', 255))
            ->addColumn(new Column\Varchar('APPLICANTS_CITY', 255))
            ->addColumn(new Column\Varchar('APPLICANTS_STATE', 255))
            ->addColumn(new Column\Varchar('APPLICANTS_ZIP', 255))
            ->addColumn(new Column\Varchar('APPLICANTS_PHONE', 255))
            ->addColumn(new Column\Varchar('APPLICANTS_FAX', 255))
            ->addColumn(new Column\Varchar('APPLICANTS_EMAIL', 255))
            
            ->addColumn(new Column\Text('PERMIT_DESCRIPTION'))
            ->addColumn(new Column\Integer('NUMBER_OF_DWELLING_UNITS'))
            
            ->addColumn(new Column\Varchar('CONTRACTORS_LICENSE_NUMBER', 255))
            
            ->addColumn(new Column\Varchar('OWNER_OF_PROPERTY_NAME', 255))
            ->addColumn(new Column\Varchar('OWNERS_ADDRESS', 255))
            ->addColumn(new Column\Varchar('OWNERS_CITY', 255))
            ->addColumn(new Column\Varchar('OWNERS_STATE', 255))
            ->addColumn(new Column\Varchar('OWNERS_ZIP', 255))
            
            ->addColumn(new Column\Floating('ESTIMATED_COSTS'))
            ->addColumn(new Column\Floating('PERMIT_FEE'))
            
            ->addColumn(new Column\Varchar('CHECK_NUMBER', 255))
            
            ->addColumn(new Column\Floating('TOTAL_FEE'))
            ->addColumn(new Column\Floating('STATE_FEE'))
            ->addColumn(new Column\Floating('CITY_FEE'))
            
            ->addColumn(new Column\Datetime('PAYMENT_DATE'))
            ->addColumn(new Column\Datetime('APPLICATION_DATE'))
            ->addColumn(new Column\Datetime('CEATION_DATE'))
            ->addColumn(new Column\Datetime('MODIFIED_DATE'));

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