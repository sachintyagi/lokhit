<?php
namespace Company\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class BranchTable
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
	
	public function findByCompany($companyid)
	{
        $resultSet = $this->tableGateway->select(function(Select $select) use ($companyid){
			$select->columns(array('id','name'));
            if($companyid) {
                $select->where(array('company_id'=>$companyid));
            }
        });
        return $resultSet;
    }
	
    public function save($data,$branchid=null)
    {
		$newdata = array(
			'parent_id'	=> $data['parent_id'],
			'company_id'=> $data['company_id'],
			'name'		=> ucfirst($data['name']),
			'code'		=> ucfirst($data['code']),
			'phone_no'	=> $data['phone_no'],
			'mobile_no'	=> $data['mobile_no'],
			'address'	=> $data['address'],
			'city'		=> ucfirst($data['city']),
			'state_id'	=> $data['state_id'],
			'country_id'=> $data['country_id'],
			'pincode'	=> $data['pincode'],
			'status'	=> $data['status']
		);
		$id = ($branchid)?$branchid:0;
		if($id == 0) {
            $this->tableGateway->insert($newdata);
			return $this->tableGateway->lastInsertValue; 
        } else {
            if ($this->find($id)) {
				$this->tableGateway->update($newdata, array('id' => $id));
				return $id;
            } else {
                throw new \Exception('Branch does not exist');
            }
        }
    }

    public function delete($id)
    {
        return $this->tableGateway->delete(array('id' => (int) $id));
    }
}