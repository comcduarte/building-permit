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
        
        /**
         * Residential/Commercial
         */
        $this->add([
            'name' => 'RESIDENTIAL_OR_COMMERCIAL',
            'type' => Element\Select::class,
            'options' => [
                'label' => 'Residential or Commercial',
                'value_options' => [
                    'Residential' => 'Residential',
                    'Commercial' => 'Commercial',
                ],
            ],
        ]);
        
        /**
         * Permits
         */
        $this->add([
            'name' => 'BUILDING_PERMIT',
            'type' => Element\Checkbox::class,
            'options' => [
                'label' => 'Building Permit',
                'checked_value' => 1,
                'unchecked_value' => 0,
            ],
        ]);
        
        $this->add([
            'name' => 'ELECTRIC_PERMIT',
            'type' => Element\Checkbox::class,
            'options' => [
                'label' => 'Electric Permit',
                'checked_value' => 1,
                'unchecked_value' => 0,
            ],
        ]);
        
        $this->add([
            'name' => 'PLUMBING_PERMIT',
            'type' => Element\Checkbox::class,
            'options' => [
                'label' => 'Plumbing Permit',
                'checked_value' => 1,
                'unchecked_value' => 0,
            ],
        ]);
        
        $this->add([
            'name' => 'DEMOLITION_PERMIT',
            'type' => Element\Checkbox::class,
            'options' => [
                'label' => 'Demolition Permit',
                'checked_value' => 1,
                'unchecked_value' => 0,
            ],
        ]);
        
        $this->add([
            'name' => 'HVAC_PERMIT',
            'type' => Element\Checkbox::class,
            'options' => [
                'label' => 'HVAC Permit',
                'checked_value' => 1,
                'unchecked_value' => 0,
            ],
        ]);
        
        /**
         * Permit Information
         */
        $this->add([
            'name' => 'LOCATION_OF_PROPOSED_WORK',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Location of Proposed Work',
            ],
        ]);
        
        $this->add([
            'name' => 'PERMIT_DESCRIPTION',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Permit Description',
            ],
        ]);
        
        $this->add([
            'name' => 'NUMBER_OF_DWELLING_UNITS',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Number of Dwelling Units',
            ],
        ]);
        
        
        /**
         * Applicant Information
         */
        $this->add([
            'name' => 'PERMIT_APPLICANT_NAME',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Permit Applicant Name',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_ADDRESS',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Applicants Address',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_CITY',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'City',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_STATE',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'State',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_ZIP',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Zip',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_PHONE',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Applicants Phone Number',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_FAX',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Applicants Fax Number',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_EMAIL',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Applicants Email Address',
            ],
        ]);
        
        /**
         * Owners Information
         */
        $this->add([
            'name' => 'OWNER_OF_PROPERTY_NAME',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Owner of Property Name',
            ],
        ]);
        
        $this->add([
            'name' => 'OWNERS_ADDRESS',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Owners Address',
            ],
        ]);
        
        $this->add([
            'name' => 'OWNERS_CITY',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'City',
            ],
        ]);
        
        $this->add([
            'name' => 'OWNERS_STATE',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'State',
            ],
        ]);
        
        $this->add([
            'name' => 'OWNERS_ZIP',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Zip',
            ],
        ]);
        
        /**
         * Costs
         */
        $this->add([
            'name' => 'ESTIMATED_COSTS',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Estimated Costs',
            ],
        ]);
        
        $this->add([
            'name' => 'PERMIT_FEE',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Permit Fee',
            ],
        ]);
        
        $this->add([
            'name' => 'CHECK_NUMBER',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Check Number',
            ],
        ]);
        
        $this->add([
            'name' => 'CONTRACTORS_LICENSE_NUMBER',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Contractors License Number',
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