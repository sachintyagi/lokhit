<?php 
namespace Application\Model;

class State
{
    public $id;
    public $name;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : 0;
        $this->name  = (!empty($data['name'])) ? $data['name'] : 0;    }
}