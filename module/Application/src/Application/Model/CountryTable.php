<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class CountryTable
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
        $resultSet = $this->tableGateway->select(function($select){
                        $select->where('id=95');
			$select->order('name');
        });
        return $resultSet;
    }
	public function fetchAllAsArray()
    {
		$states = array();
        $resultSet = $this->tableGateway->select(function($select){
                        $select->where('id=95');
			$select->order('name');
		});
		foreach($resultSet as $state) {	
			$states[$state->id] = $state->name;
		}
        return $states;
    }
}