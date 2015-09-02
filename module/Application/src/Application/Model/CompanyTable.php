<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class CompanyTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll($status=null)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use($status){
			if($status) {
				$select->where("status=".$status);
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
	
	public function save($data,$companyid=null)
    {
		$newdata = array(
			'name'		=> ucfirst($data['name']),
			'phone_no'	=> $data['phone_no'],
			'mobile_no'	=> $data['mobile_no'],
			'address'	=> $data['address'],
			'city'		=> ucfirst($data['city']),
			'state_id'	=> $data['state_id'],
			'country_id'=> $data['country_id'],
			'pincode'	=> $data['pincode'],
			'status'	=> $data['status']
		);
		if(isset($data['logo'])) {
			$newdata['logo'] = $data['logo'];
		}
		$id = ($companyid)?$companyid:0;
		if($id == 0) {
            $this->tableGateway->insert($newdata);
			return $this->tableGateway->lastInsertValue; 
        } else {
            if ($this->find($id)) {
				$this->tableGateway->update($newdata, array('id' => $id));
				return $id;
            } else {
                throw new \Exception('Company does not exist');
            }
        }
    }

    public function delete($id)
    {
        return $this->tableGateway->delete(array('id' => (int) $id));
    }
	
}