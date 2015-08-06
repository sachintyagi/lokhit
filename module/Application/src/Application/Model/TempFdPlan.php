<?php 
namespace Application\Model;

class TempFdPlan
{
    public $id;
    public $amount;
    public $mat_amt_year1;
    public $mat_amt_year2;
    public $mat_amt_year3;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : 0;
        $this->amount     = (!empty($data['amount'])) ? $data['amount'] : 0;
        $this->mat_amt_year1  = (!empty($data['mat_amt_year1'])) ? $data['mat_amt_year1'] : 0;    }
        $this->mat_amt_year2  = (!empty($data['mat_amt_year2'])) ? $data['mat_amt_year2'] : 0;    }
        $this->mat_amt_year3  = (!empty($data['mat_amt_year3'])) ? $data['mat_amt_year3'] : 0;    }
}