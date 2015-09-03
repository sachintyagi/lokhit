<?php
namespace Application\Model;

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
			'user_id'		=> $data['user_id'],
			'password'		=> $data['password'],
			'first_name'	=> ucfirst($data['first_name']),
			'last_name'		=> ucfirst($data['last_name']),
			'blood_group'	=> $data['blood_group'],
			'phone_no'		=> $data['phone_no'],
			'mobile_no'		=> $data['mobile_no'],
			'father_name'	=> $data['father_name'],
			'mother_name'	=> $data['mother_name'],
			'email'			=> $data['email'],
			'spouse_name'	=> $data['spouse_name'],
			'company_id'	=> $data['company_id'],
			'branch_id'		=> $data['branch_id'],
			'role_id'		=> $data['role_id'],
			
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
			'updated_by'		=> $data['updated_by'],	
					
			'status'			=> $data['status']
		);
		$id = ($employeeid)?$employeeid:0;		
		if($id == 0) {
			$newdata['created_at'] = $data['created_at'];
			$newdata['created_by'] = $data['created_by'];
			$this->tableGateway->insert($newdata);
			return $this->tableGateway->lastInsertValue; 
        } else {
            if($this->find($id)) {
				unset($newdata['user_id']);
				unset($newdata['password']);
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