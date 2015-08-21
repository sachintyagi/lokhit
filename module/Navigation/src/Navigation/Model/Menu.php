<?php 
namespace Navigation\Model;

class Menu
{
    public $id; 
    public $name;
	public $iconurl;
	public $description;
	public $parent_id;
	public $parent_menu;
    public $active;
    public $is_navigation;
	public $created_at;
    public $created_by;
    public $updated_at;
	public $updated_by;
	
    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : 0;
        $this->name      = (!empty($data['name'])) ? $data['name'] : null;
        $this->iconurl   = (!empty($data['iconurl'])) ? $data['iconurl'] : null;
        $this->description  = (!empty($data['description'])) ? $data['description'] : null;
        $this->parent_id  = (!empty($data['parent_id'])) ? $data['parent_id'] : 0;
        $this->parent_menu  = (!empty($data['parent_menu'])) ? $data['parent_menu'] : null;
        $this->active    = (!empty($data['active'])) ? $data['active'] : 0;
        $this->is_navigation    = (!empty($data['is_navigation'])) ? $data['is_navigation'] : 0;
		$this->created_at = (!empty($data['created_at'])) ? $data['created_at'] : null;
		$this->created_by = (!empty($data['created_by'])) ? $data['created_by'] : 1;
        $this->updated_at = (!empty($data['updated_at'])) ? $data['updated_at'] : null;
        $this->updated_by = (!empty($data['updated_by'])) ? $data['updated_by'] : 1;
    }
}