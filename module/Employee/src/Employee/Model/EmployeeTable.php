<?php
namespace Employee\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class EmployeeTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll($status = false)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($status){
            if($status) {
                $select->where(array('status'=>'1'));
            }
        });
        return $resultSet;
    }

	public function find($id)
	{
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
	
    public function save($data,$employeeid=null)
    {
		$newdata = array(
			'first_name'	=> ucfirst($data['first_name']),
			'last_name'		=> ucfirst($data['last_name']),
			'blood_group'	=> $data['blood_group'],
			'phone_no'		=> $data['phone_no'],
			'mobile_no'		=> $data['mobile_no'],
			'father_name'	=> $data['father_name'],
			'mother_name'	=> $data['mother_name'],
			'email_id'		=> $data['email_id'],
			'spouse_name'	=> $data['spouse_name'],
			'company_id'	=> $data['company_id'],
			'branch_id'		=> $data['branch_id'],
			
			'address'		=> $data['address'],
			'city'			=> ucfirst($data['city']),
			'state_id'		=> $data['state_id'],
			'country_id'	=> $data['country_id'],
			'pincode'		=> $data['pincode'],
			
			'per_address'		=> $data['per_address'],
			'per_city'			=> ucfirst($data['per_city']),
			'per_state_id'		=> $data['per_state_id'],
			'per_country_id'	=> $data['per_country_id'],
			'per_pincode'		=> $data['per_pincode'],
			'per_phone_no'		=> $data['per_phone_no'],
			'per_mobile_no'		=> $data['per_mobile_no'],		
			
			'status'			=> $data['status']
		);
		$id = ($employeeid)?$employeeid:0;
		echo '<pre>'; print_r($newdata); echo '</pre>'; die;
		if($id == 0) {
            $this->tableGateway->insert($newdata);
			return $this->tableGateway->lastInsertValue; 
        } else {
            if ($this->find($id)) {
				$this->tableGateway->update($newdata, array('id' => $id));
				return $id;
            } else {
                throw new \Exception('Employee does not exist');
            }
        }
    }

    public function delete($id)
    {
        return $this->tableGateway->delete(array('id' => (int) $id));
    }
}