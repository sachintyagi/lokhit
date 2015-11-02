<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class PlanFormulaTestTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll() {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function fetchAllAsArray() {
        $palns = array();
        $resultSet = $this->tableGateway->select();
        foreach ($resultSet as $paln) {
            $palns[$paln->id] = $paln->name;
        }
        return $palns;
    }

    public function find($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function planAmmountByPlanDetailsId($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(function($select) use ($id) {
            $select->where(array('plan_details_id' => $id))->order('amount asc');
            //echo $select->getSqlString(); exit;
        });
        return $rowset;
    }

    public function planAmmountById($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(function($select) use ($id) {
            $select->where(array('plan_formula_test.id' => $id));
            $select->join('plans_details', 'plan_formula_test.plan_details_id = plans_details.id', array('duration', 'duration_type', 'installment_type', 'interest_rate'));
            //echo $select->getSqlString(); exit;
        });
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

}
