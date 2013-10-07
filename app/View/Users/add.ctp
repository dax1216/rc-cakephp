<h2><?php echo __('Users');?></h2>
<div class="groups form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
        echo $this->Form->input('last_name');
        echo $this->Form->input('email_address');
        echo $this->Form->input('password');
        echo $this->Form->input('role_id', array('label' => 'Role', 'options' => $roles, 'empty' => 'Select Role'));
        echo $this->Form->input('is_active');
        echo $this->Form->input('phone', array('error' => array( 'attributes' => array( 'class' => 'label label-important' ) )));
        echo $this->Form->input('address', array('error' => array( 'attributes' => array( 'class' => 'label label-important' ) )));
        echo $this->Form->input('city', array('error' => array( 'attributes' => array( 'class' => 'label label-important' ) )));
        echo $this->Form->input('state', array('options' => $this->Geography->stateList(array('outside' => 'Outside US')), 'empty' => 'Select State', 'error' => array( 'attributes' => array( 'class' => 'label label-important' ) )));
        echo $this->Form->input('zip', array('error' => array( 'attributes' => array( 'class' => 'label label-important' ) )));
        echo $this->Form->input('country', array('options' => $this->Geography->countryList(), 'empty' => 'Select Country', 'default' => 'US', 'error' => array( 'attributes' => array( 'class' => 'label label-important' ) )));
	?>
	</fieldset>
<?php   echo $this->Form->submit( __('Submit'), array('class' => 'btn btn-primary')) ?>
<?php   echo $this->Form->end();?>
</div>
