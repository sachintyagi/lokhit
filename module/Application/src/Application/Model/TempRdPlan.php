<?php 
namespace Application\Model;

class TempRdPlan
{
    public $id;
    public $mnly;
    public $qly;
    public $hly;
    public $ylyly;
    public $dep_amt_year3;
    public $mat_amt_year3;
    public $dep_amt_year5;
    public $mat_amt_year5;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : 0;
        $this->mnly     = (!empty($data['mnly'])) ? $data['mnly'] : 0;
        $this->qly  = (!empty($data['qly'])) ? $data['qly'] : 0;    }
        $this->hly  = (!empty($data['hly'])) ? $data['hly'] : 0;    }
        $this->ylyly  = (!empty($data['ylyly'])) ? $data['ylyly'] : 0;    }
        $this->dep_amt_year3  = (!empty($data['dep_amt_year3'])) ? $data['dep_amt_year3'] : 0;    }
        $this->mat_amt_year3  = (!empty($data['mat_amt_year3'])) ? $data['mat_amt_year3'] : 0;    }
        $this->dep_amt_year5  = (!empty($data['dep_amt_year5'])) ? $data['dep_amt_year5'] : 0;    }
        $this->mat_amt_year5  = (!empty($data['mat_amt_year5'])) ? $data['mat_amt_year5'] : 0;    }
}