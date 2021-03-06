<?php 
namespace Company\Model;

class Branch
{
    public $id;
    public $parent_id;
    public $company_id;
    public $companyname;
    public $name;
    public $code;
    public $phone_no;
    public $mobile_no;
    public $address;
    public $city;
    public $state_id;
    public $country_id;
    public $pincode;
    public $status;
    public $created_by;
    public $created_at;
    public $updated_by;
    public $updated_at;


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : 0;
        $this->parent_id     = (!empty($data['parent_id'])) ? $data['parent_id'] : 0;
        $this->companyname     = (!empty($data['companyname'])) ? $data['companyname'] : null;
        $this->company_id     = (!empty($data['company_id'])) ? $data['company_id'] : 0;
        $this->name  = (!empty($data['name'])) ? $data['name'] : null;
        $this->code  = (!empty($data['code'])) ? $data['code'] : null;
        $this->phone_no  = (!empty($data['phone_no'])) ? $data['phone_no'] : null;
        $this->mobile_no  = (!empty($data['mobile_no'])) ? $data['mobile_no'] : null;
        $this->address  = (!empty($data['address'])) ? $data['address'] : null;
        $this->city  = (!empty($data['city'])) ? $data['city'] : null;
        $this->state_id  = (!empty($data['state_id'])) ? $data['state_id'] : 0;
        $this->country_id  = (!empty($data['country_id'])) ? $data['country_id'] : 0;
        $this->pincode  = (!empty($data['pincode'])) ? $data['pincode'] : null;
        $this->status  = (!empty($data['status'])) ? $data['status'] : 0;
        $this->created_by  = (!empty($data['created_by'])) ? $data['created_by'] : 0;
        $this->created_at  = (!empty($data['created_at'])) ? $data['created_at'] : null;
        $this->updated_by  = (!empty($data['updated_by'])) ? $data['updated_by'] : 0;
        $this->updated_at  = (!empty($data['updated_at'])) ? $data['updated_at'] : null;    
	}
}