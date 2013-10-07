<?php
App::uses('AppController', 'Controller');

class RolesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
    }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		//$this->Role->recursive = 0;
        
		$this->set('roles', $this->paginate('Role'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Role->id = $id;
		if (!$this->Role->exists()) {
			throw new NotFoundException(__('Invalid role'));
		}
		$this->set('role', $this->Role->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Role->create();
			if ($this->Role->save($this->request->data)) {
                $role = $this->Role;

                $this->Acl->deny($role, 'controllers');

                $this->Acl->allow($role, 'controllers/Account');
                $this->Acl->allow($role, 'controllers/Home');

				$this->Session->setFlash(__('The role has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The role could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Role->id = $id;
		if (!$this->Role->exists()) {
			throw new NotFoundException(__('Invalid role'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Role->save($this->request->data)) {
				$this->Session->setFlash(__('The role has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The role could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-success'));
			}
		} else {
			$this->request->data = $this->Role->read(null, $id);
		}				
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Team->id = $id;
		if (!$this->Team->exists()) {
			throw new NotFoundException(__('Invalid role'));
		}
		if ($this->Team->delete()) {
			$this->Session->setFlash(__('Role deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Role was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


}
