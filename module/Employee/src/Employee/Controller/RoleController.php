<?php
namespace Employee\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class RoleController extends AbstractActionController {

	protected $menuTable;
	
	public function __construct() {
		
	}
	
	function indexAction()
	{
		return new ViewModel();
	}
	
	function addAction()
	{
		$errors = array();
		$menus = array();
		$data = array();
		$this->getMenu(0, $data);
		//echo 'AAAAAAA<pre>'; print_r($data); echo '</pre>'; die;
		$request = $this->getRequest();
		if($request->isPost()) {
			$data = $request->getPost();
			//echo '<pre>'; print_r($data); die;;
		}
		return new ViewModel(array(
			'errors'	=> $errors,
			'menus'	=> $data
		));
	}
	
	function getMenu($parentid, &$data) {
		$menus = $this->getTable($this->menuTable, 'Navigation\Model\MenuTable')->fetchByParentId($parentid);
		if($menus->count()) {				
			foreach ($menus as $index => $menu) {
				$data[$menu->id] =  array(
						'id' => $menu->id,
						'name'=> $menu->name,
						'iconUrl' => $menu->iconurl,
						'parent_id' => $menu->parent_id,
						'parent_menu' => $menu->parent_menu,
						'description' => $menu->description,
						'is_navigation' => $menu->is_navigation,
						'active' => $menu->active,
						'subMenuList' => array(),
				);
				$this->getMenu($menu->id, $data[$menu->id]['subMenuList']);
			}
		}
	}
	
	public function getTable($table, $name) {
        if(!$table) {
            $sm = $this->getServiceLocator();
            $table = $sm->get($name);
        }
        return $table;
    }
}
?>