<?php 
namespace Application\Model;

class PlanInstallments
{
    public $id;
	public $plan_id;
    public $name;
    public $value;	
	public $status;
    public $created_at;
    public $created_by;    
	public $updated_at;
    public $updated_by;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : 0;
        $this->plan_id     = (!empty($data['plan_id'])) ? $data['plan_id'] : 0;
        $this->name  = (!empty($data['name'])) ? $data['name'] : null;  
        $this->value  = (!empty($data['value'])) ? $data['value'] : null;  
		$this->status  = (!empty($data['status'])) ? $data['status'] : 0;
		$this->created_at  = (!empty($data['created_at'])) ? $data['created_at'] : null;
        $this->created_by  = (!empty($data['created_by'])) ? $data['created_by'] : 0;
        $this->updated_at  = (!empty($data['updated_at'])) ? $data['updated_at'] : null;
        $this->updated_by  = (!empty($data['updated_by'])) ? $data['updated_by'] : 0;		
	}
}