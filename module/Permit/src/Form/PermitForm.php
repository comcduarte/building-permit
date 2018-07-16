<?php
namespace Permit\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Uuid\Model\Uuid;

class PermitForm extends Form
{
    public function __construct($name = null)
    {
        $uuid = new Uuid();
        parent::__construct('permit');
        
        $this->add([
            'name' => 'UUID',
            'type' => Element\Hidden::class,
            'attributes' => [
                'value' => $uuid->value,
            ],
        ]);
        
        $this->add([
            'name' => 'PERMIT_NUMBER',
            'type' => Element\Hidden::class,
            'attributes' => [
                'value' => 0,
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANT_FNAME',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'First Name',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANT_LNAME',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Last Name',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANT_ADDR1',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Address 1',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANT_ADDR2',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Address 2',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANT_CITY',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'City',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANT_STATE',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'State',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANT_ZIP',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Postal Code',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANT_PHONE',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Phone',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANT_FAX',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Fax',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANT_EMAIL',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Email Address',
            ],
        ]);
        
        
        $this->add(new Element\Csrf('Security'));
        
        $this->add([
            'name' => 'SUBMIT',
            'type' => element\Submit::class,
            'attributes' => [
                'value' => 'Submit',
            ],
        ]);
    }
}