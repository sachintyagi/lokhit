<?php 
namespace Application\Model;

class PlansDetails
{
    public $id;
    public $paln_id;
    public $duration;
    public $duration_type;
    public $installment_type;
    public $interest_rate;
	public $status;
    public $created_at;
    public $created_by;    
	public $updated_at;
    public $updated_by;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : 0;
        $this->plan_id     = (!empty($data['plan_id'])) ? $data['plan_id'] : 0;
        $this->duration  = (!empty($data['duration'])) ? $data['duration'] : null;  
        $this->duration_type  = (!empty($data['duration_type'])) ? $data['duration_type'] : null;  
        $this->installment_type  = (!empty($data['installment_type'])) ? $data['installment_type'] : null;  
        $this->interest_rate  = (!empty($data['interest_rate'])) ? $data['interest_rate'] : null;  
		$this->status  = (!empty($data['status'])) ? $data['status'] : 0;
		$this->created_at  = (!empty($data['created_at'])) ? $data['created_at'] : null;
        $this->created_by  = (!empty($data['created_by'])) ? $data['created_by'] : 0;
        $this->updated_at  = (!empty($data['updated_at'])) ? $data['updated_at'] : null;
        $this->updated_by  = (!empty($data['updated_by'])) ? $data['updated_by'] : 0;		
	}
}