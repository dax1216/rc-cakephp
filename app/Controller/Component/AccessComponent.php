<?php

class AccessComponent extends Component {

    public $components = array('Acl', 'Auth');
    public $user;
    private $controller;

    public function initialize($controller) {
        $this->controller = $controller;
        //here I pass a variable to the view
        $this->controller->set('access', $this);

        $this->user = $this->Auth->user();
    }

    public function check($aco, $action='*') {
        if(!empty($this->user) && $this->Acl->check(array('model' => 'Role', 'foreign_key' => $this->user['role_id']), $aco, $action)){
            return true;
        } else {
            return false;
        }
    }

    public function isLoggedin() {
        return !empty($this->user);
    }
}

?>
