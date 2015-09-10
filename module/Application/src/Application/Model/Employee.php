<?php 
namespace Application\Model;

class Employee
{
    public $id;
    public $user_id;
    public $password;
    public $employee_name;
    public $employee_code;    
    public $blood_group;
    public $mobile_no;
    public $father_name;
    public $mother_name;
    public $email;
    public $pan_number;
    public $introducer_code;
    public $nominee_name;
    public $nominee_relation;
    public $nominee_address;
    public $company_id;
    public $branch_id;
    public $role_id;
	
    public $address;
    public $city;
    public $state_id;
    public $country_id;
    public $pincode;
	
    public $per_address;
    public $per_city;
    public $per_state_id;
    public $per_country_id;
    public $per_pincode;    
    public $per_mobile_no;
	
    public $status;
    public $created_by;
    public $created_at;
    public $updated_by;
    public $updated_at;
    public $max_id;


    public function exchangeArray($data)
    {
        $this->id               = (!empty($data['id'])) ? $data['id'] : 0;
        $this->user_id          = (!empty($data['user_id'])) ? $data['user_id'] : 0;
        $this->password         = (!empty($data['password'])) ? $data['password'] : null;
        $this->employee_name    = (!empty($data['employee_name'])) ? $data['employee_name'] : null;
        $this->employee_code    = (!empty($data['employee_code'])) ? $data['employee_code'] : null;
        $this->blood_group      = (!empty($data['blood_group'])) ? $data['blood_group'] : null;
        $this->mobile_no        = (!empty($data['mobile_no'])) ? $data['mobile_no'] : null;
        $this->father_name      = (!empty($data['father_name'])) ? $data['father_name'] : null;
        $this->mother_name      = (!empty($data['mother_name'])) ? $data['mother_name'] : null;
        $this->email            = (!empty($data['email'])) ? $data['email'] : null;
        $this->pan_number       = (!empty($data['pan_number'])) ? $data['pan_number'] : null;
        $this->introducer_code  = (!empty($data['introducer_code'])) ? $data['introducer_code'] : null;
        $this->nominee_name     = (!empty($data['nominee_name'])) ? $data['nominee_name'] : null;
        $this->nominee_relation = (!empty($data['nominee_relation'])) ? $data['nominee_relation'] : null;
        $this->nominee_address  = (!empty($data['nominee_address'])) ? $data['nominee_address'] : null;
        $this->company_id       = (!empty($data['company_id'])) ? $data['company_id'] : null;
        $this->branch_id        = (!empty($data['branch_id'])) ? $data['branch_id'] : null;
        $this->role_id          = (!empty($data['role_id'])) ? $data['role_id'] : null;
        $this->address          = (!empty($data['address'])) ? $data['address'] : null;
        $this->city             = (!empty($data['city'])) ? $data['city'] : null;
        $this->state_id         = (!empty($data['state_id'])) ? $data['state_id'] : 0;
        $this->country_id       = (!empty($data['country_id'])) ? $data['country_id'] : 0;
        $this->pincode          = (!empty($data['pincode'])) ? $data['pincode'] : null;		
        $this->per_address      = (!empty($data['per_address'])) ? $data['per_address'] : null;
        $this->per_city         = (!empty($data['per_city'])) ? $data['per_city'] : null;
        $this->per_state_id     = (!empty($data['per_state_id'])) ? $data['per_state_id'] : 0;
        $this->per_country_id   = (!empty($data['per_country_id'])) ? $data['per_country_id'] : 0;
        $this->per_pincode      = (!empty($data['per_pincode'])) ? $data['per_pincode'] : null;
        $this->per_mobile_no    = (!empty($data['per_mobile_no'])) ? $data['per_mobile_no'] : null;
        $this->status           = (!empty($data['status'])) ? $data['status'] : 0;
        $this->created_by       = (!empty($data['created_by'])) ? $data['created_by'] : 0;
        $this->created_at       = (!empty($data['created_at'])) ? $data['created_at'] : null;
        $this->updated_by       = (!empty($data['updated_by'])) ? $data['updated_by'] : 0;
        $this->updated_at       = (!empty($data['updated_at'])) ? $data['updated_at'] : null;    
        $this->max_id           = (!empty($data['max_id'])) ? $data['max_id'] : 0;    
    }
}