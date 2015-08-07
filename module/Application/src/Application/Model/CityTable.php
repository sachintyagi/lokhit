<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class CityTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
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

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
	
	public function findByState($stateid)
	{
        $resultSet = $this->tableGateway->select(function(Select $select) use ($stateid){
            if($stateid) {
                $select->where(array('stateid'=>$stateid));
            }
        });
        return $resultSet;
    }
	
	public function fetchAllAsArray($stateid = null)
    {
		$cities = array();
        $resultSet = $this->tableGateway->select(function($select) use ($stateid){
			if($stateid) {
                $select->where(array('stateid'=>$stateid));
            }
			$select->order('name');
		});
		foreach($resultSet as $city) {	
			$cities[$city->id] = $city->name;
		}
        return $cities;
    }
}