<?php

namespace Application\Model;

class MemberInstallments {

    public $id;
    public $investment_id;
    public $ammount;
    public $receipt_number;
    public $installment_number;
    public $created_at;
    public $created_by;
    public $updated_at;
    public $updated_by;
    public $status;
	
	public $member_id;
	public $cf_number;
	public $code;
	public $total_installment;
	public $installment_type;
	public $end_date;
	
	public $employee_code;
    public $firstname;
    public $lastname;
    public $emailid;
    public $gardian_name;
    public $address;
    public $nominee_name;
    public $nominee_relation;
    public $dob;
    public $introducer_code;
    
    public $max_id;

    public function exchangeArray($data) {
        $this->id                   = (!empty($data['id'])) ? $data['id'] : 0;
        $this->investment_id        = (!empty($data['investment_id'])) ? $data['investment_id'] : 0;
        $this->receipt_number       = (!empty($data['receipt_number'])) ? $data['receipt_number'] : null;
        $this->installment_number   = (!empty($data['installment_number'])) ? $data['installment_number'] : 0;
        $this->ammount              = (!empty($data['ammount'])) ? $data['ammount'] : '0.00';
        $this->created_at           = (!empty($data['created_at'])) ? $data['created_at'] : null;
        $this->created_by           = (!empty($data['created_by'])) ? $data['created_by'] : 0;
        $this->updated_at           = (!empty($data['updated_at'])) ? $data['updated_at'] : null;
        $this->updated_by           = (!empty($data['updated_by'])) ? $data['updated_by'] : 0;
        $this->status               = (!empty($data['status'])) ? $data['status'] : 0;
        
        $this->max_id               = (!empty($data['max_id'])) ? $data['max_id'] : 0;
		
		$this->member_id = (!empty($data['member_id'])) ? $data['member_id'] : null;
		$this->cf_number = (!empty($data['cf_number'])) ? $data['cf_number'] : null;
		$this->code = (!empty($data['code'])) ? $data['code'] : null;
		$this->total_installment = (!empty($data['total_installment'])) ? $data['total_installment'] : null;
		$this->installment_type = (!empty($data['installment_type'])) ? $data['installment_type'] : null;
		$this->end_date = (!empty($data['end_date'])) ? $data['end_date'] : null;
		
		$this->employee_code = (!empty($data['employee_code'])) ? $data['employee_code'] : null;
		$this->firstname = (!empty($data['firstname'])) ? $data['firstname'] : null;
        $this->lastname = (!empty($data['lastname'])) ? $data['lastname'] : null;
        $this->emailid = (!empty($data['emailid'])) ? $data['emailid'] : null;
        $this->gardian_name = (!empty($data['gardian_name'])) ? $data['gardian_name'] : null;
        $this->address = (!empty($data['address'])) ? $data['address'] : null;
        $this->nominee_name = (!empty($data['nominee_name'])) ? $data['nominee_name'] : null;
        $this->nominee_relation = (!empty($data['nominee_relation'])) ? $data['nominee_relation'] : null;
        $this->dob = (!empty($data['dob'])) ? $data['dob'] : null;
    }

}
