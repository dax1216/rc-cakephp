<?php
App::uses('AppHelper', 'View/Helper');
App::uses('AuthComponent', 'Controller/Component');
App::uses('AccessComponent', 'Controller/Component');

class AccessHelper extends AppHelper{
    var $helpers = array("Session");
    var $Access;
    var $Auth;
    var $user;

    public function beforeRender(){
        $this->Access = new AccessComponent();

        $this->Auth = new AuthComponent();
        $this->Auth->Session = $this->Session;

        $this->user = $this->Auth->user();
    }

    public function check($aco, $action='*'){
        if(empty($this->user)) return false;
        return $this->Access->check($this->user['User']['id'], $aco, $action);
    }

    public function isLoggedin(){
        return !empty($this->user);
    }
}
?>