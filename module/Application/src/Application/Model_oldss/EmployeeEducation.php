<?php 
namespace Application\Model;

class EmployeeEducation
{
    public $id;
    public $employee_id;
    public $certificate;
    public $university;
    public $year;
    public $percentage;


    public function exchangeArray($data)
    {
        $this->id     		= (!empty($data['id'])) ? $data['id'] : 0;
        $this->employee_id  = (!empty($data['employee_id'])) ? $data['employee_id'] : 0;
        $this->certificate  = (!empty($data['certificate'])) ? $data['certificate'] : null;
        $this->university  	= (!empty($data['university'])) ? $data['university'] : null;
        $this->year  		= (!empty($data['year'])) ? $data['year'] : null;
        $this->percentage  	= (!empty($data['percentage'])) ? $data['percentage'] : null;
	}
}