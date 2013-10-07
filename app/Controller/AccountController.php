<?php
App::uses('AppController', 'Controller');


class AccountController extends AppController {
    public $uses = array('User');
    public $components = array('Recaptcha.Recaptcha', 'Email');

    public function beforeFilter() {
        //parent::beforeFilter();

        $this->Auth->allow();
    }

    /**
     * User registration
     */
    public function register() {
        if($this->request->is('post')) {
            
            if ($this->Recaptcha->verify()) {
                $this->User->create();

                $this->request->data['User']['role_id'] = Configure::read('site_config.role_user'); //temporary assignment
                $this->request->data['User']['is_active'] = true; //temporary assignment
                $this->request->data['User']['confirmation_key'] = md5(serialize($this->request->data));

                if($this->User->save($this->request->data)) {
                    //$this->Email->send();

                    //$this->Session->setFlash('Registration successful. Please check your email and confirm your registration to activate your account.', 'default', array('class' =>'alert alert-success'));
                    $this->Session->setFlash('Registration successful. Welcome!', 'default', array('class' =>'alert alert-success'));
                    $this->redirect('/');
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
            $this->redirect('/account/login');
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
        if(!$this->Access->check($this->params['controller'] . '/'. $this->params['action'])) {
            $this->Session->setFlash('Access denied.', 'default', array('class' => 'alert alert-error'));
            $this->redirect('/');
        }
        
        $this->User->id = $user_id = $this->Auth->user('user_id');
        
        if ($this->request->is('post') || $this->request->is('put')){            
            if($this->request->data('change_password') == '1') {
                $this->_change_password();
                
            } else {
                if ($this->User->save($this->request->data)) {
                    $this->Session->write('Auth', $this->User->read(null, $user_id));

                    $this->Session->setFlash(__('Account details saved'), 'default', array('class' => 'alert alert-success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('Error in saving account details. Please, try again.'), 'default', array('class' => 'alert alert-error'));                    
                }
            }
        } else {
            $this->request->data = $user_data = $this->User->find('first', array('conditions' => array('User.user_id' => $user_id), 'recursive' => -1));
        }        
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
    private function _change_password() {
        $user_id = $this->Auth->user('user_id');
        
        $current_password = AuthComponent::password($this->request->data['User']['current_password']);

        $user = $this->User->find('first', array('conditions' => array('User.user_id' => $user_id), 'recursive' => -1));

        if($user['User']['password'] == AuthComponent::password($this->request->data['User']['password'])) {
            $this->Session->setFlash(__('The new password you entered is the same with the current password'), 'default', array('class' => 'alert alert-error'));
            $this->redirect('/account/index#change-password');
        }

        if($user['User']['password'] != $current_password) {
            $this->Session->setFlash(__('The current password you entered is not valid'), 'default', array('class' => 'alert alert-error'));
            $this->redirect('/account/index#change-password');
        }

        $this->request->data['User']['updated'] = date('Y-m-d H:i:s');
        unset($this->request->data['User']['current_password']);

        $this->User->set($this->request->data);

        if ($this->User->validates(array('fieldList' => array('password', 'password_confirm')))) {

            $this->User->save();

            $this->Session->setFlash(__('The user password successfully updated'), 'default', array('class' => 'alert alert-success'));

            $this->redirect('/account/index#change-password');
        } else {
            $this->Session->setFlash(__('The new password could not be saved. Please try again.'), 'default', array('class' => 'alert alert-error'));

            $this->request->data = $user;
        }
    }

    public function logout() {            
        $this->Session->destroy();

        $this->redirect($this->Auth->logout());
    }

    public function forgot_password() {
        if($this->request->is('post') || $this->request->is('put')) {
            //Bypass email confirm field
            $this->request->data['User']['email_address_confirm'] = $this->request->data['User']['email_address'];

            $this->User->set($this->request->data);

            if($this->User->validates(array('first_name', 'last_name', 'email_address'))) {
                $user_email = $this->request->data['User']['email_address'];

                $user = $this->User->find('first', array('conditions' => array('User.email_address' => $user_email,
                                                                               'User.first_name' => $this->request->data['User']['first_name'],
                                                                               'User.last_name' => $this->request->data['User']['last_name']),
                                                         'recursive' => -1
                                                        ));
                if(!empty($user)) {
                    $reply_to_address = Configure::read('WhaleDefaults.reply_to_address');
                    $reply_to_name = Configure::read('WhaleDefaults.reply_to_name');

                    $email = new CakeEmail();
                    $email->from(array($reply_to_address => $reply_to_name));
                    $email->to($user['User']['email_address']);
                    $email->helpers(array('Html'));

                    $email->subject('Site.com Account Recovery');

                    if($this->request->data['access_problem'] == 'forgot_password') {
                        $email->template('forgot_password')
                              ->emailFormat('both');

                        $temp_password = $this->_generateRandomString(8);

                        $this->User->id = $user['User']['user_id'];

                        $this->User->set('password', $temp_password);

                        $this->User->save();
                        $email->viewVars(array('user' => $user, 'temp_password' => $temp_password));
                    } else {
                        $email->template('forgot_username')
                              ->emailFormat('both');

                        $email->viewVars(array('user' => $user));
                    }

                    $email->send();

                    $this->Session->setFlash('Account recovery email sent.', 'default', array('class' => 'alert alert-success'));
                    $this->redirect('/users/login');
                } else {
                    $this->Session->setFlash(__('The account data you entered does not exist in our records.'), 'default', array('class' => 'alert alert-error'));
                    $this->redirect('forgot_password');
                }
            }
        }
    }

    private function _generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}
?>
