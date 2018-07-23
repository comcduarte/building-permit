<?php 
namespace Permit\Model;

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
    public $DEMOLITION_PERMIT;
    
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
    public $NUMBER_OF_DWELLING_UNITS;
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
    }
}