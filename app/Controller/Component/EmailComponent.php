<?php
App::uses('CakeEmail', 'Network/Email');

class EmailComponent extends Component {
	public $name = 'Email';
	public $domain = '';
	public $sandbox = true;
	public $current_controller = NULL;

	 /**
	 * Class Constructor
	 */
	public function startup(&$controller)
	{
		$this->current_controller = $controller;
		//$this->sandbox = $this->current_controller->getIsSandbox();
		//$this->domain = $this->current_controller->getDomainUrl();
    }

    public function send($to, $from, $subject, $template, $vars) {
        $email = new CakeEmail();
        $email->from($from);

        $email->template($template)
              ->emailFormat('html');
        $email->helpers(array('Html'));

        $email->to($to);

        $email->subject($subject);

        $email->viewVars(array('vars' => $vars));

        $email->send();
    }
}
?>
