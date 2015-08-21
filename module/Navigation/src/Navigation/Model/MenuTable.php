<?php
namespace Navigation\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Expression;

class MenuTable
{
    protected $tableGateway;
	protected $_serviceLocator;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

	public function fetchAll($status = null)
    {
		// 1 => Active , 0 => InActive
        $resultSet = $this->tableGateway->select(function(Select $select) use ($status){
            if($status) {
				$select->where(array('status'=>$status));				
			}
			$select->join(
				array('m'=>'menus'),
				'm.id=menus.parent_id',
				array('parent_menu'=>'name'),
				$select::JOIN_LEFT
			);
        });		
        return $resultSet;
    }
	
	public function fetchByParentId($parentid = 0)
    {
		$resultSet = $this->tableGateway->select(function(Select $select) use ($parentid){            
			$select->join(
				array('m'=>'menus'),
				'm.id=menus.parent_id',
				array('parent_menu'=>'name'),
				$select::JOIN_LEFT
			);
			$select->where(array('menus.parent_id'=>$parentid));
        });		
        return $resultSet;
    }
	
    public function find($id)
    {
		$id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
		if(!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
	
    public function save($menu)
    {
		$data = array(
            'name' 		   	=> $menu->name,
            'iconurl' 	   	=> $menu->iconurl,
            'description'  	=> $menu->description,
            'parent_id' 	=> $menu->parent_id,
            'active' 	   	=> $menu->active,
            'is_navigation' => $menu->is_navigation
        );		
		$id = (int) $menu->id;
        if($id == 0) {
			$data['created_at']	= $menu->created_at;
			$data['created_by'] = ($menu->created_by)?$menu->created_by:0;			
			$result = $this->tableGateway->insert($data);
			$id = $this->tableGateway->lastInsertValue;
			return $id;
        } else {
            if ($this->find($id)) {
				$data['updated_at']	= $menu->updated_at;
				$data['updated_by'] = $menu->updated_by;
				echo '<pre>'; print_r($data); echo '</pre>';
                $result = $this->tableGateway->update($data, array('id' => $id));
				return $id;
            } else {
				return '0';
            }
        }
    }

    public function delete($id)
    {
		$result = $this->tableGateway->delete($id);
		return $result;
    }
}