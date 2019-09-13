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
                'id' => 'UUID',
            ],
        ]);
        
        $this->add([
            'name' => 'Q',
            'type' => Element\Hidden::class,
            'attributes' => [
                'id' => 'Q',
            ],
        ]);
        
        $this->add([
            'name' => 'QPERMIT',
            'type' => Element\Hidden::class,
            'attributes' => [
                'id' => 'QPERMIT',
            ],
        ]);
        
        $this->add([
            'name' => 'STATE_FEE',
            'type' => Element\Hidden::class,
            'attributes' => [
                'id' => 'STATE_FEE',
            ],
        ]);
        
        $this->add([
            'name' => 'CITY_FEE',
            'type' => Element\Hidden::class,
            'attributes' => [
                'id' => 'CITY_FEE',
            ],
        ]);
        
        $this->add([
            'name' => 'TOTAL_FEE',
            'type' => Element\Hidden::class,
            'attributes' => [
                'id' => 'TOTAL_FEE',
            ],
        ]);
        
        $date = date('Y-m-d');
        $this->add([
            'name' => 'CREATION_DATE',
            'type' => Element\Hidden::class,
            'attributes' => [
                'value' => $date,
                'id' => 'CREATION_DATE',
            ],
        ]);
        
        $this->add([
            'name' => 'PAYMENT_DATE',
            'type' => Element\Hidden::class,
            'attributes' => [
                'value' => $date,
                'id' => 'PAYMENT_DATE',
            ],
        ]);
       
        $this->add([
            'name' => 'PERMIT_NUMBER',
            'type' => Element\Hidden::class,
            'attributes' => [
                'value' => 0,
                'id' => 'PERMIT_NUMBER',
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
            'attributes' => [
                'class' => 'form-control',
                'id' => 'RESIDENTIAL_OR_COMMERCIAL',
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
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'BUILDING_PERMIT',
            ],
        ]);
        
        $this->add([
            'name' => 'ELECTRIC_PERMIT',
            'type' => Element\Checkbox::class,
            'options' => [
                'label' => 'Electric Permit',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'ELECTRIC_PERMIT',
            ],
        ]);
        
        $this->add([
            'name' => 'PLUMBING_PERMIT',
            'type' => Element\Checkbox::class,
            'options' => [
                'label' => 'Plumbing Permit',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'PLUMBING_PERMIT',
            ],
        ]);
        
        $this->add([
            'name' => 'HVAC_PERMIT',
            'type' => Element\Checkbox::class,
            'options' => [
                'label' => 'HVAC Permit',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'HVAC_PERMIT',
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
            'attributes' => [
                'class' => 'form-control',
                'id' => 'LOCATION_OF_PROPOSED_WORK',
                'required' => 'true',
                'placeholder' => '100 Main Street, etc.',
            ],
        ]);
        
        $this->add([
            'name' => 'PERMIT_DESCRIPTION',
            'type' => Element\Textarea::class,
            'options' => [
                'label' => 'Permit Description',
            ],
            'attributes' => [
                'class' => 'form-control h-100',
                'id' => 'PERMIT_DESCRIPTION',
                'required' => 'true',
                'placeholder' => 'Please describe the work being performed.',
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
            'attributes' => [
                'class' => 'form-control required',
                'id' => 'PERMIT_APPLICANT_NAME',
                'required' => 'true',
                'placeholder' => 'Full Name',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_ADDRESS',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Applicants Address',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'APPLICANTS_ADDRESS',
                'required' => 'true',
                'placeholder' => 'Street Address',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_CITY',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'City',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'APPLICANTS_CITY',
                'required' => 'true',
                'placeholder' => 'City',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_STATE',
            'type' => Element\Select::class,
            'options' => [
                'label' => 'State',
                'empty_option' => 'Please select a state',
                'value_options' => [
                    'AL' => 'Alabama',
                    'AK' => 'Alaska',
                    'AZ' => 'Arizona',
                    'AR' => 'Arkansas',
                    'CA' => 'California',
                    'CO' => 'Colorado',
                    'CT' => 'Connecticut',
                    'DE' => 'Delaware',
                    'DC' => 'District Of Columbia',
                    'FL' => 'Florida',
                    'GA' => 'Georgia',
                    'HI' => 'Hawaii',
                    'ID' => 'Idaho',
                    'IL' => 'Illinois',
                    'IN' => 'Indiana',
                    'IA' => 'Iowa',
                    'KS' => 'Kansas',
                    'KY' => 'Kentucky',
                    'LA' => 'Louisiana',
                    'ME' => 'Maine',
                    'MD' => 'Maryland',
                    'MA' => 'Massachusetts',
                    'MI' => 'Michigan',
                    'MN' => 'Minnesota',
                    'MS' => 'Mississippi',
                    'MO' => 'Missouri',
                    'MT' => 'Montana',
                    'NE' => 'Nebraska',
                    'NV' => 'Nevada',
                    'NH' => 'New Hampshire',
                    'NJ' => 'New Jersey',
                    'NM' => 'New Mexico',
                    'NY' => 'New York',
                    'NC' => 'North Carolina',
                    'ND' => 'North Dakota',
                    'OH' => 'Ohio',
                    'OK' => 'Oklahoma',
                    'OR' => 'Oregon',
                    'PA' => 'Pennsylvania',
                    'RI' => 'Rhode Island',
                    'SC' => 'South Carolina',
                    'SD' => 'South Dakota',
                    'TN' => 'Tennessee',
                    'TX' => 'Texas',
                    'UT' => 'Utah',
                    'VT' => 'Vermont',
                    'VA' => 'Virginia',
                    'WA' => 'Washington',
                    'WV' => 'West Virginia',
                    'WI' => 'Wisconsin',
                    'WY' => 'Wyoming',
                ],
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'APPLICANTS_STATE',
                'required' => 'true',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_ZIP',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Zip',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'APPLICANTS_ZIP',
                'required' => 'true',
                'placeholder' => '#####',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_PHONE',
            'type' => Element\Tel::class,
            'options' => [
                'label' => 'Applicants Phone Number',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'APPLICANTS_PHONE',
                'required' => 'true',
                'placeholder' => '###-###-####',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_FAX',
            'type' => Element\Tel::class,
            'options' => [
                'label' => 'Applicants Fax Number',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'APPLICANTS_FAX',
                'placeholder' => '###-###-####',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_EMAIL',
            'type' => Element\Email::class,
            'options' => [
                'label' => 'Applicants Email Address',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'APPLICANTS_EMAIL',
                'required' => 'true',
                'placeholder' => 'name@domain.com',
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
            'attributes' => [
                'class' => 'form-control',
                'id' => 'OWNER_OF_PROPERTY_NAME',
                'required' => 'true',
                'placeholder' => 'Full Name',
            ],
        ]);
        
        $this->add([
            'name' => 'OWNERS_ADDRESS',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Owners Address',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'OWNERS_ADDRESS',
                'required' => 'true',
                'placeholder' => 'Street Address',
            ],
        ]);
        
        $this->add([
            'name' => 'OWNERS_CITY',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'City',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'OWNERS_CITY',
                'required' => 'true',
                'placeholder' => 'City',
            ],
        ]);
        
        $this->add([
            'name' => 'OWNERS_STATE',
            'type' => Element\Select::class,
            'options' => [
                'label' => 'State',
                'empty_option' => 'Please select a state',
                'value_options' => [
                    'AL' => 'Alabama',
                    'AK' => 'Alaska',
                    'AZ' => 'Arizona',
                    'AR' => 'Arkansas',
                    'CA' => 'California',
                    'CO' => 'Colorado',
                    'CT' => 'Connecticut',
                    'DE' => 'Delaware',
                    'DC' => 'District Of Columbia',
                    'FL' => 'Florida',
                    'GA' => 'Georgia',
                    'HI' => 'Hawaii',
                    'ID' => 'Idaho',
                    'IL' => 'Illinois',
                    'IN' => 'Indiana',
                    'IA' => 'Iowa',
                    'KS' => 'Kansas',
                    'KY' => 'Kentucky',
                    'LA' => 'Louisiana',
                    'ME' => 'Maine',
                    'MD' => 'Maryland',
                    'MA' => 'Massachusetts',
                    'MI' => 'Michigan',
                    'MN' => 'Minnesota',
                    'MS' => 'Mississippi',
                    'MO' => 'Missouri',
                    'MT' => 'Montana',
                    'NE' => 'Nebraska',
                    'NV' => 'Nevada',
                    'NH' => 'New Hampshire',
                    'NJ' => 'New Jersey',
                    'NM' => 'New Mexico',
                    'NY' => 'New York',
                    'NC' => 'North Carolina',
                    'ND' => 'North Dakota',
                    'OH' => 'Ohio',
                    'OK' => 'Oklahoma',
                    'OR' => 'Oregon',
                    'PA' => 'Pennsylvania',
                    'RI' => 'Rhode Island',
                    'SC' => 'South Carolina',
                    'SD' => 'South Dakota',
                    'TN' => 'Tennessee',
                    'TX' => 'Texas',
                    'UT' => 'Utah',
                    'VT' => 'Vermont',
                    'VA' => 'Virginia',
                    'WA' => 'Washington',
                    'WV' => 'West Virginia',
                    'WI' => 'Wisconsin',
                    'WY' => 'Wyoming',
                ],
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'OWNERS_STATE',
                'required' => 'true',
            ],
        ]);
        
        $this->add([
            'name' => 'OWNERS_ZIP',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Zip',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'OWNERS_ZIP',
                'required' => 'true',
                'placeholder' => '#####',
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
            'attributes' => [
                'class' => 'form-control',
                'id' => 'ESTIMATED_COSTS',
                'required' => 'true',
                'placeholder' => '####.##',
            ],
        ]);
        
        $this->add([
            'name' => 'PERMIT_FEE',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Permit Fee',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'PERMIT_FEE',
                'readonly' => TRUE,
            ],
        ]);
        
        $this->add([
            'name' => 'CHECK_NUMBER',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Check Number',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'CHECK_NUMBER',
                'placeholder' => '####',
            ],
        ]);
        
        $this->add([
            'name' => 'CONTRACTORS_LICENSE_NUMBER',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Contractors License Number',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'CONTRACTORS_LICENSE_NUMBER',
            ],
        ]);
        
        $this->add([
            'name' => 'SECURITY',
            'type' => element\Csrf::class,
            'options' => [
                'csrf_options' => [
                    'timeout' => 600,
                    'messages' => [
                        'notSame' => 'Testing',
                    ],
                ],
            ],
        ]);
        
        $this->add([
            'name' => 'SUBMIT',
            'type' => element\Submit::class,
            'attributes' => [
                'value' => 'Submit',
                'class' => 'btn btn-primary',
                'id' => 'SUBMIT',
            ],
        ]);
    }
}