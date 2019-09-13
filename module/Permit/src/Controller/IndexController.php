<?php 
namespace Permit\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Permit\Traits\AdapterTrait;
use Permit\Model\Permit;
use Permit\Form\PermitForm;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    use AdapterTrait;
    
    public function indexAction()
    {
        $permit = new Permit($this->adapter);
        $permits = $permit->fetchAll();
        
        return [
            'permits' => $permits,
        ];
    }
    
    public function createAction()
    {
        $form = new PermitForm();
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $permit = new Permit($this->adapter);
            
            $form->setInputFilter($permit->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $permit->exchangeArray($form->getData());
                
                $permit->create();
                return $this->redirect()->toRoute('permit/default', ['action' => 'receipt', 'uuid' => $permit->UUID] );
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
    
    public function receiptAction()
    {
        $uuid = $this->params()->fromRoute('uuid',0);
        $permit = new Permit($this->adapter);
        $permit->read(['UUID'=>$uuid]);
        
        return new ViewModel([
            'permit' => $permit,
        ]);
    }
}