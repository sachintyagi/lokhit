<?php 
namespace Application\Model;

class Country
{
    public $id;
    public $name;
    public $code;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : 0;
        $this->name  = (!empty($data['name'])) ? $data['name'] : null;    
        $this->code  = (!empty($data['code'])) ? $data['code'] : null; 	
	}
}