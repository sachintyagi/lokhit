<?php 
namespace Application\Model;

class MemberInstallments
{
    public $id;
	public $investment_id;
    public $ammount;
    public $created_at;
    public $created_by;    
	public $updated_at;
    public $updated_by;
    
	public $status;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : 0;
        $this->investment_id    = (!empty($data['investment_id'])) ? $data['investment_id'] : 0;
        $this->ammount  = (!empty($data['ammount'])) ? $data['ammount'] : '0.00';
        $this->created_at  = (!empty($data['created_at'])) ? $data['created_at'] : null;
        $this->created_by  = (!empty($data['created_by'])) ? $data['created_by'] : 0;
        $this->updated_at  = (!empty($data['updated_at'])) ? $data['updated_at'] : null;
        $this->updated_by  = (!empty($data['updated_by'])) ? $data['updated_by'] : 0;
        $this->status  = (!empty($data['status'])) ? $data['status'] : 0;
    }
}