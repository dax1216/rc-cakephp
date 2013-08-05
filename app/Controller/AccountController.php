<?php
App::uses('AppController', 'Controller');


class AccountController extends AppController {
    public $uses = array('User');
    public $components = array('Recaptcha.Recaptcha', 'Email');

    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow();
    }

    /**
     * User registration
     */
    public function register() {
        if($this->request->is('post')) {
            if ($this->Recaptcha->verify()) {
                $this->User->create();

                $this->request->data['User']['confirmation_key'] = md5(serialize($this->request->data));

                if($this->User->save($this->request->data)) {
                    //$this->Email->send();

                    $this->Session->setFlash('Registration successful. Please check your email and confirm your registration to activate your account.', 'default', array('class' =>'alert alert-success'));

                    $this->redirect('/account/register');
                } else {
                    $this->Session->setFlash('Error in registration process.', 'default', array('class' =>'alert alert-error'));
                }
            } else {
                // display the raw API error
                $this->Session->setFlash($this->Recaptcha->error, 'default', array('class' =>'alert alert-error'));
            }
        }
    }

    /**
     * User registration activation
     */
    public function activate() {
        $email = $this->request->query['e'];
        $key = $this->request->query['key'];

        $user = $this->User->find('first', array('conditions' => array("User.email_address" => $email, "User.confirmation_key" => $key), 'recursive' => -1));

        if(empty($user)) {
            $this->Session->setFlash('Invalid user and key entered.', 'default', array('class' => 'alert alert-error'));
            $this->redirect('/myaccount/login');
        } else {
            if($user['User']['is_email_confirmed'] == 1) {
                $this->Session->setFlash('User already activated. Please login to continue.', 'default', array('class' => 'alert alert-error'));

                $this->redirect('/account/login');
            } else {
                $this->User->id = $user['User']['user_id'];
                $this->User->set('is_email_confirmed', 1);
                $this->User->save();

                $this->Auth->login($user['User']);

                $this->Session->setFlash('You are now activated. Welcome!', 'default', array('class' => 'alert alert-success'));
                $this->redirect('/home');
            }
        }

    }
    /**
     * User profile page
     */
    public function index() {
        $this->User->id = $user_id = $this->Auth->user('user_id');

        if ($this->Auth->user() && $this->request->is('post')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->write('Auth', $this->User->read(null, $user_id));

                $this->Session->setFlash(__('Account details saved'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Error in saving account details. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                $user_data = $this->request->data;
            }
        } else {
            $this->request->data = $user_data = $this->User->find('first', array('conditions' => array('User.user_id' => $user_id), 'recursive' => -1));
        }

        $this->set('user_data', $user_data);
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash('Successfully logged in!', 'default', array('class' => 'alert alert-success'));
                $this->redirect($this->Auth->loginRedirect);
            } else {
                $this->Session->setFlash($this->Auth->authError, 'default', array('class' => 'alert alert-error'));
            }
        }
    }
    
    /**
     * Change user password
     */
    public function change_password() {
        $user_id = $this->Auth->user('user_id');

        $this->User->id = $user_id;

        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is('post')) {
            $current_password = AuthComponent::password($this->request->data['User']['current_password']);

            $user = $this->User->find('first', array('conditions' => array('User.user_id' => $user_id), 'recursive' => -1));

            if($user['User']['password'] == AuthComponent::password($this->request->data['User']['password'])) {
                $this->Session->setFlash(__('The new password you entered is the same with the current password'), 'default', array('class' => 'alert alert-error'));
                $this->redirect(array('action' => 'change_password'));
            }

            if($user['User']['password'] != $current_password) {
                $this->Session->setFlash(__('The current password you entered is not valid'), 'default', array('class' => 'alert alert-error'));
                $this->redirect(array('action' => 'change_password'));
            }

            $this->request->data['User']['updated'] = date('Y-m-d H:i:s');
            unset($this->request->data['User']['current_password']);

            $this->User->set($this->request->data);

            if ($this->User->validates(array('fieldList' => array('password', 'password_confirm')))) {

                $this->User->save();

                $this->Session->setFlash(__('The user password successfully updated'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The new password could not be saved. Please try again.'), 'default', array('class' => 'alert alert-error'));
            }
        }
    }

    public function logout() {            
        $this->Session->destroy();

        $this->redirect($this->Auth->logout());
    }
}
?>
