<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class BranchsTable
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
            $select->join(
                    'companies',
                    'companies.id=branches.company_id',
                    array('companyname'=>'name'),
                    $select::JOIN_INNER
            );
        });
        
        return $resultSet;
    }

	public function fetchAllAsArray($country=null)
    {
		$branches = array();
                $resultSet = $this->tableGateway->select(function(Select $select) use ($country){
                    if($country) {
                        $select->where(array('company_id'=>$country));
                    }
                });
		foreach($resultSet as $branch) {
			$branches[$branch->id] = $branch->name;
		}
        return $branches;
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
    
    function getBranchCode($companyid) {
		$resultSet = $this->tableGateway->select(function(Select $select) {
            $select->columns(array('code'));
			$select->order('id desc');
			$select->limit(1);
        });
		$row = $resultSet->current();
        return $row;
	}
    
    public function findWithCompany($id){
        $id  = (int) $id;
        $resultSet = $this->tableGateway->select(function(Select $select) use ($id){
            //$select->join('members', 'member_investments.member_id = members.member_id', array('firstname', 'lastname', 'member_id', 'emailid', 'gardian_name','address','nominee_name','nominee_relation','dob'));
            
            if($id) {
                $select->where(array('branches.id'=>$id));
            }		
        });
        if($resultSet) {
            $resultSet = $resultSet->current();
        }
        return $resultSet;
    }
	
    public function save($data)
    {
        if(isset($data['save'])) {
                unset($data['save']);
        }
        
        $newdata = array(
            'parent_id'	=> $data['parent_id'],
            'company_id'=> $data['company_id'],
            'name'      => ucfirst($data['name']),
            'code'	=> ucfirst($data['code']),
            'phone_no'	=> $data['phone_no'],
            'mobile_no'	=> $data['mobile_no'],
            'address'	=> $data['address'],
            'city'	=> ucfirst($data['city']),
            'state_id'	=> $data['state_id'],
            'country_id'=> $data['country_id'],
            'pincode'	=> $data['pincode'],
            'status'	=> $data['status'],            
            'updated_by'	=> $data['updated_by'],
        );
        
        $id = (isset($data['id']))?(int) $data['id']:0;
        if($id == 0) {
            if(isset($data['updated_by'])) {
                $newdata['created_by']	= $data['updated_by'];
                $newdata['created_at']	= date('Y-m-d H:i:s');
            }
            $this->tableGateway->insert($newdata);
            return $this->tableGateway->lastInsertValue;
        } else {
            if ($this->find($id)) {
                unset($data['id']);
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