<?php
namespace Navigation\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Navigation\Form\MenuForm;
use Navigation\Form\Filter\MenuFilter;

class MenuController extends AbstractActionController {

    protected $menuTable;

    public function indexAction() {
        $errors = array();
		$menus = array();
		$data = array();
		$menus = $this->getTable($this->menuTable, 'Navigation\Model\MenuTable')->fetchAll();
		//$this->getMenu(0, $data);
		//echo 'AAAAAAA<pre>'; print_r($data); echo '</pre>'; die;
		
        return new ViewModel(array(
            'menus' => $menus,
            'errors' => $errors
        ));
    }
	
	public function addAction() {
        $errors = array();
		$menus = array();
		$menuArr = array();
		$menuForm = new MenuForm();
		$menuForm->get('parent_id')->setDisableInArrayValidator(true);
		$allmenus = $this->getTable($this->menuTable, 'Navigation\Model\MenuTable')->fetchAll();
		foreach($allmenus as $m) {
			$menuArr[$m->id] = $m->name;
		}
		$menuForm->get('parent_id')->setValueOptions($menuArr);		
		$menuId = $this->params()->fromRoute('id',null);
		if($menuId) {
			$menuData = $this->getTable($this->menuTable, 'Navigation\Model\MenuTable')->find($menuId);			
			$menuForm->get('name')->setValue($menuData->name);
			$menuForm->get('parent_id')->setValue($menuData->parent_id);
			$menuForm->get('description')->setValue($menuData->description);
			$menuForm->get('is_navigation')->setValue($menuData->is_navigation);
			$menuForm->get('active')->setValue($menuData->active);
		}		
		$request = $this->getRequest();
		if($request->isPost()) {
			$formdata = $request->getPost();
			$menuForm->setData($formdata);
			$menuForm->setInputFilter(new MenuFilter);
			if($menuForm->isValid()) {
				$formdata->id = $menuId;
				$menus = $this->getTable($this->menuTable, 'Navigation\Model\MenuTable')->save($formdata);
				if($menus>0){
					$this->redirect()->toRoute('menu-list');
				}
			} else {
				$errors = $menuForm->getMessages();
			}
		}
		
		//$menus = $this->getMenu(0, $data);
		
        return new ViewModel(array(
            'menus' 	=> $menus,
			'menuForm'	=> $menuForm,
            'errors' 	=> $errors
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
	
    function getTable($table, $name) {
        if (!$table) {
            $sm = $this->getServiceLocator();
            $table = $sm->get($name);
        }
        return $table;
    }

}
