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
                'checked_value' => 1,
                'unchecked_value' => 0,
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
                'checked_value' => 1,
                'unchecked_value' => 0,
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
                'checked_value' => 1,
                'unchecked_value' => 0,
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'PLUMBING_PERMIT',
            ],
        ]);
        
//         $this->add([
//             'name' => 'DEMOLITION_PERMIT',
//             'type' => Element\Checkbox::class,
//             'options' => [
//                 'label' => 'Demolition Permit',
//                 'checked_value' => 1,
//                 'unchecked_value' => 0,
//             ],
//             'attributes' => [
//                 'class' => 'form-control',
//                 'id' => 'DEMOLITION_PERMIT',
//             ],
//         ]);
        
        $this->add([
            'name' => 'HVAC_PERMIT',
            'type' => Element\Checkbox::class,
            'options' => [
                'label' => 'HVAC Permit',
                'checked_value' => 1,
                'unchecked_value' => 0,
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
            ],
        ]);
        
//         $this->add([
//             'name' => 'NUMBER_OF_DWELLING_UNITS',
//             'type' => Element\Text::class,
//             'options' => [
//                 'label' => 'Number of Dwelling Units',
//             ],
//             'attributes' => [
//                 'class' => 'form-control',
//                 'id' => 'NUMBER_OF_DWELLING_UNITS',
//             ],
//         ]);
        
        
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
                'class' => 'form-control',
                'id' => 'PERMIT_APPLICANT_NAME',
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
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_STATE',
            'type' => Element\Select::class,
            'options' => [
                'label' => 'State',
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
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_PHONE',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Applicants Phone Number',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'APPLICANTS_PHONE',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_FAX',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Applicants Fax Number',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'APPLICANTS_FAX',
            ],
        ]);
        
        $this->add([
            'name' => 'APPLICANTS_EMAIL',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Applicants Email Address',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'APPLICANTS_EMAIL',
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
            ],
        ]);
        
        $this->add([
            'name' => 'OWNERS_STATE',
            'type' => Element\Select::class,
            'options' => [
                'label' => 'State',
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
        
        
        $this->add(new Element\Csrf('SECURITY'));
        
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