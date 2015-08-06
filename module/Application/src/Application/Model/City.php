<?php 
namespace Application\Model;

class City
{
    public $id;
    public $state_id;
    public $name;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : 0;
        $this->state_id     = (!empty($data['state_id'])) ? $data['state_id'] : 0;
        $this->name  = (!empty($data['name'])) ? $data['name'] : 0;    }
}