<?php 
namespace Permit\Model;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Validator\Digits;
use Zend\Validator\EmailAddress;
use Zend\Validator\Uuid;

class Permit extends PermitObject
{
    public $UUID;
    public $PERMIT_NUMBER;
    
    /**
     * Residential or Commercial
     */
    public $RESIDENTIAL_OR_COMMERCIAL;
    
    /**
     * Building, Electric, Plumbing, HVAC, Demolition
     */
    public $BUILDING_PERMIT;
    public $ELECTRIC_PERMIT;
    public $PLUMBING_PERMIT;
    public $HVAC_PERMIT;
//     public $DEMOLITION_PERMIT;
    
    public $LOCATION_OF_PROPOSED_WORK;
    
    /**
     * Applicant Information 
     */
    public $PERMIT_APPLICANT_NAME;
    public $APPLICANTS_ADDRESS;
    public $APPLICANTS_CITY;
    public $APPLICANTS_STATE;
    public $APPLICANTS_ZIP;
    public $APPLICANTS_PHONE;
    public $APPLICANTS_FAX;
    public $APPLICANTS_EMAIL;
    
    /**
     * Owner Information
     */
    public $OWNER_OF_PROPERTY_NAME;
    public $OWNERS_ADDRESS;
    public $OWNERS_CITY;
    public $OWNERS_STATE;
    public $OWNERS_ZIP;
    
    /**
     * Permit Information
     */
    public $PERMIT_DESCRIPTION;
//     public $NUMBER_OF_DWELLING_UNITS;
    public $CONTRACTORS_LICENSE_NUMBER;
    public $ESTIMATED_COSTS;
    public $PERMIT_FEE;
    
    public $CHECK_NUMBER;
    public $STATE_FEE;
    public $CITY_FEE;
    public $TOTAL_FEE;
    public $PAYMENT_DATE;
    public $APPLICATION_DATE;
    public $CREATION_DATE;
    public $MODIFIED_DATE;

    public function __construct($dbAdapter = null)
    {
        parent::__construct($dbAdapter);
        $this->setTableName('permits');
        
        $this->primary_key = 'UUID';
        $this->required = TRUE;
    }
    
    public function getInputFilter()
    {
        /**
         * Parent function set all fields to default required state
         * @var \Zend\InputFilter\InputFilter $inputFilter
         */
        $inputFilter = parent::getInputFilter();
        
        /**
         * Following array is to quickly set certain fields to alternate
         * required.
         */
        $aryOptional = [
            'CHECK_NUMBER',
            'CONTRACTORS_LICENSE_NUMBER',
        ];
        
        foreach ($aryOptional as $var) {
            $inputFilter->add([
                'name' => $var,
                'required' => FALSE,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
            ]);
        }
        
        /**
         * Further customization required for indiviual validators.
         */
        $inputFilter->add([
            'name' => 'UUID',
            'validators' => [
                [
                    'name' => Uuid::class,
                ],
            ],
        ]);
        
        $inputFilter->add([
            'name' => 'APPLICANTS_PHONE',
            'validators' => [
                ['name' => Digits::class,],
            ],
        ]);
        
        $inputFilter->add([
            'name' => 'APPLICANTS_FAX',
            'required' => FALSE,
            'validators' => [
                ['name' => Digits::class,],
            ],
        ]);
        
        $inputFilter->add([
            'name' => 'APPLICANTS_EMAIL',
            'validators' => [
                ['name' => EmailAddress::class,],
            ],
        ]);
        
        $inputFilter->add([
            'name' => 'NUMBER_OF_DWELLING_UNITS',
            'validators' => [
                ['name' => Digits::class,],
            ],
        ]);
        
        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }
}