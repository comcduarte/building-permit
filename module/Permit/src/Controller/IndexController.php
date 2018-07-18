<?php 
namespace Permit\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Permit\Traits\AdapterTrait;
use Permit\Model\Permit;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Exception;
use Permit\Form\PermitForm;

class IndexController extends AbstractActionController
{
    use AdapterTrait;
    
    public function indexAction()
    {
        $permit = new Permit($this->adapter);
        
        $sql = new Sql($this->adapter);
        
        $select = new Select();
        $select->from($permit->getTableName());
        
        $statement = $sql->prepareStatementForSqlObject($select);
        
        try {
            $permits = $statement->execute();
        } catch (Exception $e) {
            return $e;
        }
        
        return [
            'permits' => $permits,
        ];
    }
    
    public function createAction()
    {
        $form = new PermitForm();
        $form->get('SUBMIT')->setAttribute('value', 'Create');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $permit = new Permit($this->adapter);
            
            $form->setInputFilter($permit->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $permit->exchangeArray($form->getData());
                
                $permit->create();
                return $this->redirect()->toRoute('permit');
            }
        }
        
        return [
            'form' => $form,
        ];
    }
    
    public function readAction()
    {
        return $this->redirect()->toRoute('permit');
    }
    
    public function updateAction()
    {
        $params = $this->params()->fromRoute();
        $uuid = $this->params()->fromRoute('uuid',0);
        if (!$uuid) {
            return $this->redirect()->toRoute('permit');
        }
        
        $permit = new Permit($this->adapter);
        $permit->read(['UUID'=>$uuid]);
        
        $form = new PermitForm();
        $form->bind($permit);
        $form->get('SUBMIT')->setAttribute('value', 'Update');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($permit->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $permit->update();
                return $this->redirect()->toRoute('permit');
            }
            
        }
        
        return [
            'uuid' => $uuid,
            'form' => $form,
        ];
    }
    
    public function deleteAction()
    {
        $uuid = $this->params()->fromRoute('uuid', 0);
        if (!$uuid) {
            return $this->redirect()->toRoute('permit');
        }
        
        $permit = new Permit($this->adapter);
        $permit->read(['UUID' => $uuid]);
        $permit->delete();
        
        return $this->redirect()->toRoute('permit');
    }
}