<?php 
namespace Permit\Model;

class Permit extends PermitObject
{
    public $UUID;
    public $PERMIT_NUMBER;
    
    /**
     * Residential or Commercial
     */
//     public $PERMIT_DOMAIN;
    
    /**
     * Building, Electric, Plumbing, HVAC, Demolition
     */
//     public $PERMIT_TYPE;
//     public $LOCATION;
    
    /**
     * Applicant Information 
     */
    public $APPLICANT_FNAME;
    public $APPLICANT_LNAME;
    public $APPLICANT_ADDR1;
    public $APPLICANT_ADDR2;
    public $APPLICANT_CITY;
    public $APPLICANT_STATE;
    public $APPLICANT_ZIP;
    public $APPLICANT_PHONE;
    public $APPLICANT_FAX;
    public $APPLICANT_EMAIL;
    
    /**
     * Owner Information
     */
//     public $OWNER_NAME;
//     public $OWNER_ADDR;
//     public $OWNER_CITY;
//     public $OWNER_STATE;
//     public $OWNER_ZIP;
//     public $OWNER_PHONE;
//     public $OWNER_FAX;
//     public $OWNER_EMAIL;
    
    /**
     * Permit Information
     */
//     public $PERMIT_DESC;
//     public $PERMIT_NUM_UNITS;
//     public $PERMIT_CONTRACT_LIC_NUM;
//     public $PERMIT_EST_COSTS;
//     public $PERMIT_FEES;
    
//     public $CHECK_NUM;
//     public $STATE_FEE;
//     public $CITY_FEE;
//     public $TOTAL_FEE;
//     public $PAYMENT_DATE;
//     public $APPLICATION_DATE;
//     public $CREATION_DATE;
//     public $MODIFIED_DATE;

    public function __construct($dbAdapter = null)
    {
        parent::__construct($dbAdapter);
        $this->setTableName('permits');
//         $this->public_attributes = [
//             'UUID',
//             'PERMIT_NUMBER',
//             'APPLICANT_FNAME',
//             'APPLICANT_LNAME',
//             'APPLICANT_ADDR1',
//             'APPLICANT_ADDR2',
//             'APPLICANT_CITY',
//             'APPLICANT_STATE',
//             'APPLICANT_ZIP',
//             'APPLICANT_PHONE',
//             'APPLICANT_FAX',
//             'APPLICANT_EMAIL',
//         ];
        
        $this->primary_key = 'UUID';
    }
}