<?php 
namespace Application\Model;

class Employee
{
    public $id;
    public $company_id;
    public $branch_id;
    public $role_id;
    public $firstname;
    public $lastname;
    public $employee_code;
    public $emailid;
    public $dob;
    public $gender;
    public $userid;
    public $password;
    public $gardian_name;
    public $mobile_number;
    public $nominee_name;
    public $nominee_relation;
    public $nominee_address;
    public $country_id;
    public $state_id;
    public $city_id;
    public $address;
    public $member_id;
    public $status;
    public $created_at;
    public $created_by;
    public $updated_at;
    public $updated_by;
    public $is_deleted;
    
    public $max_id;
    
    public function exchangeArray($data)
    {
        $this->id               = (!empty($data['id'])) ? $data['id'] : 0;
        $this->company_id       = (!empty($data['company_id'])) ? $data['company_id'] : 0;
        $this->branch_id        = (!empty($data['branch_id'])) ? $data['branch_id'] : 0;
        $this->role_id          = (!empty($data['role_id'])) ? $data['role_id'] : 0;
        $this->firstname        = (!empty($data['firstname'])) ? $data['firstname'] : null;
        $this->lastname         = (!empty($data['lastname'])) ? $data['lastname'] : null;
        $this->employee_code    = (!empty($data['employee_code'])) ? $data['employee_code'] : null;
        $this->emailid          = (!empty($data['emailid'])) ? $data['emailid'] : null;
        $this->dob              = (!empty($data['dob'])) ? $data['dob'] : null;
        $this->gender           = (!empty($data['gender'])) ? $data['gender'] : null;
        $this->userid           = (!empty($data['userid'])) ? $data['userid'] : null;
        $this->password         = (!empty($data['password'])) ? $data['password'] : null;
        $this->gardian_name     = (!empty($data['gardian_name'])) ? $data['gardian_name'] : null;
        $this->mobile_number    = (!empty($data['mobile_number'])) ? $data['mobile_number'] : null;
        $this->nominee_name     = (!empty($data['nominee_name'])) ? $data['nominee_name'] : null;
        $this->nominee_relation = (!empty($data['nominee_relation'])) ? $data['nominee_relation'] : null;
        $this->nominee_address  = (!empty($data['nominee_address'])) ? $data['nominee_address'] : null;
        $this->country_id       = (!empty($data['country_id'])) ? $data['country_id'] : 0;
        $this->state_id         = (!empty($data['state_id'])) ? $data['state_id'] : 0;
        $this->city_id          = (!empty($data['city_id'])) ? $data['city_id'] : null;
        $this->address          = (!empty($data['address'])) ? $data['address'] : null;
        $this->member_id        = (!empty($data['member_id'])) ? $data['member_id'] : null;
        $this->status           = (!empty($data['status'])) ? $data['status'] : null;
        $this->created_at       = (!empty($data['created_at'])) ? $data['created_at'] : null;
        $this->created_by       = (!empty($data['created_by'])) ? $data['created_by'] : 0;
        $this->updated_at       = (!empty($data['updated_at'])) ? $data['updated_at'] : null;
        $this->updated_by       = (!empty($data['updated_by'])) ? $data['updated_by'] : 0;
        $this->is_deleted       = (!empty($data['is_deleted'])) ? $data['is_deleted'] : 0;
        
        $this->max_id           = (!empty($data['max_id'])) ? $data['max_id'] : 0;    
    }
}