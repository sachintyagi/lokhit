<?php
namespace Employee\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class EmployeeExperienceTable
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
	
	public function save($data)
    {
		$newdata = array(
			'employee_id'		=> $data['employee_id'],
			'previous_employer'	=> ucfirst($data['previous_employer']),
			'designation'		=> ucfirst($data['designation']),
			'employee_from'		=> $data['employee_from'],
			'employee_to'		=> $data['employee_to']
		);
		$this->tableGateway->insert($newdata);
		return $this->tableGateway->lastInsertValue;
    }

    public function delete($id)
    {
        return $this->tableGateway->delete(array('id' => (int) $id));
    }
	
}