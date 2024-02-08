<?php 
namespace Permit\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Permit\Traits\AdapterTrait;
use Permit\Model\Permit;
use Permit\Form\PermitForm;
use Laminas\View\Model\ViewModel;
use Laminas\Log\LoggerAwareTrait;

class IndexController extends AbstractActionController
{
    use AdapterTrait;
    use LoggerAwareTrait;
    
    public function indexAction()
    {
        $permit = new Permit($this->adapter);
        $permits = $permit->fetchAll();
        $this->logger->info("Permits Listed");
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
                $this->logger->info("Permit Created", [$permit]);
                return $this->redirect()->toRoute('permit/receipt', ['uuid' => $permit->UUID] );
            } else {
                $this->logger->err("Create Form Invalid", [$permit]);
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
                $this->logger->info("Permit Updated", [$permit]);
                return $this->redirect()->toRoute('permit');
            } else {
                $this->logger->err("Update Form Invalid", [$permit]);
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
        $this->logger->info("Permit Deleted", [$permit]);
        
        return $this->redirect()->toRoute('permit');
    }
    
    
    public function receiptAction()
    {
        $uuid = $this->params()->fromRoute('uuid',0);
        $permit = new Permit($this->adapter);
        $permit->read(['UUID'=>$uuid]);
        $this->logger->info("Permit Read", [$permit]);
        
        return new ViewModel([
            'permit' => $permit,
        ]);
    }
}