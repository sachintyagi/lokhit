<?php 
namespace Application\Model;

class Branchs
{
    public $id;
	public $code;
    public $name;
    public $branch_type_id;
	public $address;
	public $status;
    public $created_at;
    public $created_by;    
	public $updated_at;
    public $updated_by;
    
    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : 0;
        $this->code    = (!empty($data['code'])) ? $data['code'] : 0;
        $this->name  = (!empty($data['name'])) ? $data['name'] : null;
        $this->branch_type_id = (!empty($data['branch_type_id'])) ? $data['branch_type_id'] : null;
		$this->address = (!empty($data['address'])) ? $data['address'] : null;
        $this->status  = (!empty($data['status'])) ? $data['status'] : 0;
		$this->created_at  = (!empty($data['created_at'])) ? $data['created_at'] : null;
        $this->created_by  = (!empty($data['created_by'])) ? $data['created_by'] : 0;
        $this->updated_at  = (!empty($data['updated_at'])) ? $data['updated_at'] : null;
        $this->updated_by  = (!empty($data['updated_by'])) ? $data['updated_by'] : 0;
        
    }
}