<?php
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class HomeController extends AppController {

    public function beforeFilter() {
        //parent::beforeFilter();

        $this->Auth->allow();
    }

    public function index() {
      
    }
}