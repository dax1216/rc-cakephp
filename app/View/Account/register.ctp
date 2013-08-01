
    
<?php echo $this->Form->create(array('url' => '/account/register', 'autocomplete' => 'off', 'class' => 'form-signup', 'novalidate' => true)); ?>
    <h2 class="form-signup-heading">Register</h2>
    <table class="table table-striped">

        <tr>
            <td><?php echo $this->Form->input('first_name', array('label' => '*First Name')); ?></td>
            <td><?php echo $this->Form->input('last_name', array('label' => '*Last Name')); ?></td>
        </tr>
        <tr>
            <td><?php echo $this->Form->input('email_address', array('label' => '*Email Address')); ?></td>
            <td><?php echo $this->Form->input('email_address_confirm', array('label' => '*Email Address Confirm')); ?></td>
        </tr>
        <tr>
            <td><?php echo $this->Form->input('password', array('label' => '*Password', 'type' => 'password')); ?></td>
            <td><?php echo $this->Form->input('password_confirm', array('label' => '*Password Confirm', 'type' => 'password')); ?></td>
        </tr>
    </table>
<?php   echo $this->Recaptcha->display();?>    
<?php   echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
<?php   echo $this->Form->end() ?>