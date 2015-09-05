<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class MemberTable
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

    public function fetchAllAsArray($status = false)
    {
		$customers = array();
        $resultSet = $this->tableGateway->select(function(Select $select) use ($status){
            if($status) {
                $select->where(array('status'=>'1'));
            }
        });
		foreach($resultSet as $customer) {
			$customers[$customer->id] = $customer->firstname.' '.$customer->lastname.' ('.$customer->mobile_number.')';
		}
        return $customers;
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
	
	public function findByMemberId($memberId)
	{
        $rowset = $this->tableGateway->select(function($select) use($memberId){
			$select->where(array('member_id' => $memberId));
		});
        $row = $rowset->current();
        if (!$row) {
            return array();
        }
        return $row;
    }
	
	public function findMaxId() {
		$select = $this->tableGateway->getSql()->select();
		$select->columns(array(
		'max_id' => new \Zend\Db\Sql\Expression('MAX(id)')
		));
		$rowset = $this->tableGateway->selectWith($select);
		$row = $rowset->current();
		return $row;
	}

    public function save($data)
    {
		if(isset($data['save'])) {
			unset($data['save']);
		}
		$id = (isset($data['id']))?(int) $data['id']:0;
		if($id == 0) {
            $this->tableGateway->insert($data);
			return $this->tableGateway->lastInsertValue; 
        } else {
            if ($this->find($id)) {
				unset($data['id']);
				$this->tableGateway->update($data, array('id' => $id));
				return $id;
            } else {
                throw new \Exception('Member does not exist');
            }
        }
    }

    public function delete($id)
    {
        return $this->tableGateway->delete(array('id' => (int) $id));
    }
}