<h2><?php echo __('Users');?></h2>
<div class="groups form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
        echo $this->Form->input('last_name');
        echo $this->Form->input('email_address');
        echo $this->Form->input('role_id', array('label' => 'Role', 'options' => $roles, 'empty' => 'Select Role'));
	?>
	</fieldset>
<?php   echo $this->Form->submit( __('Update'), array('class' => 'btn btn-primary')) ?>
<?php   echo $this->Form->end();?>
</div>
