<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class PlansTable
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
}