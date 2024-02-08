<?php 
namespace Permit\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Permit\Traits\AdapterTrait;

class DownloadController extends AbstractActionController
{
    use AdapterTrait;
    
    public function indexAction()
    {
        return new \Laminas\View\Model\ViewModel();
    }
    
    public function pdfAction()
    {
        $filename = $this->params()->fromRoute('filename', FALSE);
        
        if (!$filename) {
            return new \Laminas\View\Model\ViewModel();
        }
        
        if (FALSE === file_exists("./data/$filename.pdf")) {
            return new \Laminas\View\Model\ViewModel();
        }
        
        header('Content-Type: application/pdf');
        header("Content-Disposition: attachment; filename='$filename.pdf'");
        readfile("data/$filename.pdf");
        
        $view = new \Laminas\View\Model\ViewModel();
        $view->setTerminal(TRUE);
        return $view;
    }
}