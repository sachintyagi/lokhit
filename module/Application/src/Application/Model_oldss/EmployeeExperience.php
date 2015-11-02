<?php 
namespace Application\Model;

class EmployeeExperience
{
    public $id;
    public $employee_id;
    public $previous_employer;
    public $designation;
    public $employee_from;
    public $employee_to;


    public function exchangeArray($data)
    {
        $this->id     				= (!empty($data['id'])) ? $data['id'] : 0;
        $this->employee_id  		= (!empty($data['employee_id'])) ? $data['employee_id'] : 0;
        $this->previous_employer  	= (!empty($data['previous_employer'])) ? $data['previous_employer'] : null;
        $this->designation  		= (!empty($data['designation'])) ? $data['designation'] : null;
        $this->employee_from  		= (!empty($data['employee_from'])) ? $data['employee_from'] : null;
        $this->employee_to  		= (!empty($data['employee_to'])) ? $data['employee_to'] : null;
	}
}