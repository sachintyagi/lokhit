<?php 
namespace Application\Model;

class TempMisPlan
{
    public $id;
    public $return_ofinvst_per_month_12;
    public $invst_amt_for_5year;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : 0;
        $this->return_ofinvst_per_month_12     = (!empty($data['return_ofinvst_per_month_12'])) ? $data['return_ofinvst_per_month_12'] : 0;
        $this->invst_amt_for_5year  = (!empty($data['invst_amt_for_5year'])) ? $data['invst_amt_for_5year'] : 0;    }
}