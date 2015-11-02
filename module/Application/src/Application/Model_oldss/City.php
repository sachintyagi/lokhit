<?php 
namespace Application\Model;

class City
{
    public $id;
    public $stateid;
    public $name;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : 0;
        $this->stateid     = (!empty($data['stateid'])) ? $data['stateid'] : 0;
        $this->name  = (!empty($data['name'])) ? $data['name'] : 0;    
	}
}