<?php 
namespace Application\Model;

class MemberInvestments
{
    public $id;
	public $branch_id;
    public $member_id;
    public $plan_id;
	public $plan_details_id;
	public $cf_number;
	public $period;
	public $repayable_to;
	public $interest_rate;
	public $installment_type_id;
	public $installment_no;
	public $installment_date;
	public $total_installment;
    public $final_ammount;
    public $start_ammount;
    public $deposit_amount;
    public $start_date;
    public $end_date;
	public $created_at;
    public $created_by;    
	public $updated_at;
    public $updated_by;
	public $status;
	public $max_id;
	
	
	public $firstname;
	public $lastname;
	public $emailid;
	public $gardian_name;
	public $address;
	public $nominee_name;
	public $nominee_relation;


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : 0;
        $this->branch_id    = (!empty($data['branch_id'])) ? $data['branch_id'] : 0;
        $this->member_id  = (!empty($data['member_id'])) ? $data['member_id'] : 0;
        $this->plan_id = (!empty($data['plan_id'])) ? $data['plan_id'] : 0;
		$this->plan_details_id = (!empty($data['plan_details_id'])) ? $data['plan_details_id'] : 0;
		$this->cf_number = (!empty($data['cf_number'])) ? $data['cf_number'] : null;
		$this->period = (!empty($data['period'])) ? $data['period'] : null;
		$this->interest_rate = (!empty($data['interest_rate'])) ? $data['interest_rate'] : null;
		$this->repayable_to = (!empty($data['repayable_to'])) ? $data['repayable_to'] : null;
		$this->installment_type_id = (!empty($data['installment_type_id'])) ? $data['installment_type_id'] : 0;
		$this->installment_no = (!empty($data['installment_no'])) ? $data['installment_no'] : 0;
		$this->installment_date = (!empty($data['installment_date'])) ? $data['installment_date'] : null;
		$this->total_installment = (!empty($data['total_installment'])) ? $data['total_installment'] : null;
		
        $this->final_ammount  = (!empty($data['final_ammount'])) ? $data['final_ammount'] : '0.00';
        $this->start_ammount  = (!empty($data['start_ammount'])) ? $data['start_ammount'] : '0.00';
        $this->deposit_amount  = (!empty($data['deposit_amount'])) ? $data['deposit_amount'] : '0.00';
        $this->start_date  = (!empty($data['start_date'])) ? $data['start_date'] : null;
        $this->end_date  = (!empty($data['end_date'])) ? $data['end_date'] : null;
		$this->created_at  = (!empty($data['created_at'])) ? $data['created_at'] : 0;
        $this->created_by  = (!empty($data['created_by'])) ? $data['created_by'] : 0;
        $this->updated_at  = (!empty($data['updated_at'])) ? $data['updated_at'] : 0;
        $this->updated_by  = (!empty($data['updated_by'])) ? $data['updated_by'] : 0;
		
        $this->status  = (!empty($data['status'])) ? $data['status'] : 0;
        $this->max_id  = (!empty($data['max_id'])) ? $data['max_id']+1 : 1;
		
        $this->firstname  = (!empty($data['firstname'])) ? $data['firstname'] : null;
        $this->lastname  = (!empty($data['lastname'])) ? $data['lastname'] : null;
        $this->emailid  = (!empty($data['emailid'])) ? $data['emailid'] : null;
        $this->gardian_name  = (!empty($data['gardian_name'])) ? $data['gardian_name'] : null;
        $this->address  = (!empty($data['address'])) ? $data['address'] : null;
        $this->nominee_name  = (!empty($data['nominee_name'])) ? $data['nominee_name'] : null;
        $this->nominee_relation  = (!empty($data['nominee_relation'])) ? $data['nominee_relation'] : null;
    }
}