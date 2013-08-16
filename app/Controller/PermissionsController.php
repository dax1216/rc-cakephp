<?php
App::uses('AppController', 'Controller');
App::uses('ShellDispatcher', 'Console');

class PermissionsController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {

    }

    public function show_aco_tree() {

    }

    public function add() {

    }

    public function delete() {
        
    }

    public function aco_sync() {
        $command = '-app '.APP.' AclExtras.AclExtras aco_sync';
        $args = explode(' ', $command);
        $dispatcher = new ShellDispatcher($args, false);
        if($dispatcher->dispatch()) {
            $this->Session->flash('Actions resynced!', 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->flash('Error syncing actions.', 'default', array('class' => 'alert alert-error'));
        }
        
        $this->redirect(array('action' => 'index'));
    }    
}