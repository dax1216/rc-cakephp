<?php
App::uses('AppController', 'Controller');

class ContactController extends AppController {

    public $uses = array('Contact');
    
    public $components = array('Recaptcha.Recaptcha', 'Email');

    public function beforeFilter() {
        //parent::beforeFilter();

        $this->Auth->allow();
    }

    public function index() {
        if($this->request->is('post')) {

            $this->Contact->set($this->request->data);

            if($this->Contact->validates()) {
                //Email function here

                $this->Session->setFlash('Message successfully sent.', 'default', array('class' =>'alert alert-success'));

                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error in submitting message.', 'default', array('class' =>'alert alert-error'));
            }
        }
    }
}
?>