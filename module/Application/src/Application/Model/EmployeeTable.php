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

    public function fetchAll($status = false, $branch=null)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($status, $branch){
            if($status) {
                $select->where(array('status'=>'1'));
            }
            if($branch) {
                $select->where(array('branch_id'=>$branch));
            }
            $select->where('role_id != 1');
            $select->order('employee_code asc');
        });
        return $resultSet;
    }

    public function fetchAllAsArray($status = false, $branch=null)
    {
        $employees = array();
        $resultSet = $this->tableGateway->select(function(Select $select) use ($status, $branch){
            if($status) {
                $select->where(array('status'=>'1'));
            }
            if($branch) {
                $select->where(array('branch_id'=>$branch));
            }
            $select->where('role_id != 1');
        });
        foreach($resultSet as $employee) {
            $employees[$employee->employee_code] = $employee->employee_name.' ('.$employee->employee_code.')';
        }
        return $employees;
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
            'user_id'       => $data['user_id'],
            'password'      => md5($data['password']),
            'employee_name' => ucfirst($data['employee_name']),
            'blood_group'   => $data['blood_group'],
            'mobile_no'     => $data['mobile_no'],
            'employee_code' => $data['employee_code'],
            'father_name'   => $data['father_name'],
            'mother_name'   => $data['mother_name'],
            'email'         => $data['email'],
            'introducer_name'=> $data['introducer_name'],
            'company_id'    => $data['company_id'],
            'branch_id'     => $data['branch_id'],
            'role_id'       => $data['role_id'],
            'address'       => $data['address'],
            'city'          => ucfirst($data['city']),
            'state_id'      => $data['state_id'],
            'country_id'    => $data['country_id'],
            'pincode'       => $data['pincode'],
            'per_address'   => $data['per_address'],
            'per_city'      => ucfirst($data['per_city']),
            'per_state_id'  => $data['per_state_id'],
            'per_country_id'=> $data['per_country_id'],
            'per_pincode'   => $data['per_pincode'],
            'per_mobile_no' => $data['per_mobile_no'],		
            'updated_by'    => $data['updated_by'],	
            'status'        => $data['status']
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

    public function findMaxId() {
        $select = $this->tableGateway->getSql()->select();
        $select->columns(array(
            'max_id' => new \Zend\Db\Sql\Expression('MAX(id)')
        ));
        $rowset = $this->tableGateway->selectWith($select);
        $row = $rowset->current();
        //print_r($row); exit;
        return $row;
    }
    
    public function delete($id)
    {
        return $this->tableGateway->delete(array('id' => (int) $id));
    }
}