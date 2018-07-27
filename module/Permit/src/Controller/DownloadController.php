<?php 
namespace Permit\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Permit\Traits\AdapterTrait;

class DownloadController extends AbstractActionController
{
    use AdapterTrait;
    
    public function indexAction()
    {
        return new \Zend\View\Model\ViewModel();
    }
}