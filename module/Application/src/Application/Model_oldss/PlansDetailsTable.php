<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class PlansDetailsTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
	
	public function fetchAllAsArray()
    {
		$palns = array();
        $resultSet = $this->tableGateway->select();
		foreach($resultSet as $paln) {
			$palns[$paln->id] = $paln->name;
		}
        return $palns;
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
	
	public function planDurationByPlanId($id) {
		$id  = (int) $id;
        $rowset = $this->tableGateway->select(function($select) use ($id){
			$select->where(array('plan_id' => $id))->group('duration');
			//echo $select->getSqlString(); exit;
		});
        return $rowset;
	}
	
	public function planInstallmentByPlanId($id, $duration) {
		$id  = (int) $id;
        $rowset = $this->tableGateway->select(function($select) use ($id, $duration){
			$select->where(array('plan_id' => $id))->where(array('duration' => $duration));
			//echo $select->getSqlString(); exit;
		});
        return $rowset;
	}
	
	public function findByPlanId($id)
	{
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(function($select) use ($id){
			$select->where(array('plan_id' => $id));
			//echo $select->getSqlString(); exit;
		});
        return $rowset;
    }
}