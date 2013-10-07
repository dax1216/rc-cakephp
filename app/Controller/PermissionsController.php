<?php
App::uses('AppController', 'Controller');
App::uses('ShellDispatcher', 'Console');

class PermissionsController extends AppController {    
    public $uses = array('Role');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {

    }

    public function show_aco_tree() {        
        $this->RequestHandler->setContent('json', 'text/x-json');
        $this->layout = false;
        $permissions = $this->Acl->Aco->find('threaded', array('fields' => array('id', 'alias', 'parent_id')));
        
        $response = array();

        foreach($permissions as $perm) {
            $response[] = $this->_get_aco_tree($perm);
        }

        echo json_encode($response);
        exit();
    }

    private function _get_aco_tree($permission, $path = '') {
        if($path == '') {
            $path = $permission['Aco']['alias'];
        } else {
            $path = $path . '/' . $permission['Aco']['alias'];
        }

        $temp = array('text' => $permission['Aco']['alias'], 'id' => $path, 'classes' => 'action-item');

        if($permission['Aco']['parent_id'] == null) {
            $temp['expanded'] = true;
        }

        if($permission['Aco']['parent_id'] == 1) {
            $temp['expanded'] = false;
        }

        if(count($permission['children']) > 0) {
            foreach($permission['children'] as $children) {
                $temp['children'][]= $this->_get_aco_tree($children, $path);
            }
        } 

        return $temp;
    }

    public function add() {
        $role_id = $this->request->data['role_id'];        
        $role = $this->Role->find('first',  array('recursive' => -1, 'conditions' => array('role_id' => $role_id)));

        $this->Acl->allow($role, $this->request->data['aco']);
        echo 'Access allowed';
        exit();
    }

    public function delete() {
        $role_id = $this->request->data['role_id'];
        $role = $this->Role->find('first',  array('recursive' => -1, 'conditions' => array('role_id' => $role_id)));

        $this->Acl->deny($role, $this->request->data['aco']);
        echo 'Access deleted';
        exit();
    }

    public function show_aro() {
        if($this->RequestHandler->isAjax()) {
            $aco = $this->request->data['aco'];
            
            $roles = $this->Role->find('all', array('recursive' => -1));            

            foreach($roles as &$role) {
                $role['Role']['allowed'] = $this->Acl->check($role, $aco);
            }

            $this->set(compact('roles', 'aco'));
        }
    }

    public function aco_sync() {
        $command = '-app '.APP.' AclExtras.AclExtras aco_sync';
        $args = explode(' ', $command);
        $dispatcher = new ShellDispatcher($args, false);
        
        $dispatcher->dispatch();
        
        $this->redirect(array('action' => 'index'));
    }    
}