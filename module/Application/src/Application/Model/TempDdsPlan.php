<?php 
namespace Application\Model;

class TempDdsPlan
{
    public $id;
    public $amount;
    public $plan_amount;
    public $maturity_amount;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : 0;
        $this->amount     = (!empty($data['amount'])) ? $data['amount'] : 0;
        $this->plan_amount     = (!empty($data['plan_amount'])) ? $data['plan_amount'] : 0;
        $this->maturity_amount  = (!empty($data['maturity_amount'])) ? $data['maturity_amount'] : 0;    }
}