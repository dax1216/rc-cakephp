<h2><?php echo __('Roles');?></h2>
<div class="groups form">
<?php echo $this->Form->create('Role');?>
	<fieldset>
		<legend><?php echo __('Edit Role'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php   echo $this->Form->submit( __('Update'), array('class' => 'btn btn-primary')) ?>
<?php   echo $this->Form->end();?>
</div>

