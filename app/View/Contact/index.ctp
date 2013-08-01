<h2>Contact Us</h2>
<hr>
<?php
    echo $this->Form->create(array('novalidate' => true));
    echo $this->Form->input('name', array('label' => 'Name'));
    echo $this->Form->input('email_address', array('label' => 'Email Address'));
    echo $this->Form->input('subject', array('label' => 'Subject'));
    echo $this->Form->input('message', array('type' => 'textarea', 'label' => 'Message'));
    echo $this->Recaptcha->display();    
    echo $this->Form->submit('Send', array('class' => 'btn btn-primary'));
    echo $this->Form->end();
?>