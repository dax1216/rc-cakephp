<div class="groups index">
	<h2><?php echo __('Roles');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($groups as $group): ?>
	<tr>
		<td><?php echo h($group['Role']['id']); ?>&nbsp;</td>
		<td><?php echo h($group['Role']['name']); ?>&nbsp;</td>
		<td><?php echo h($group['Role']['created']); ?>&nbsp;</td>
		<td><?php echo h($group['Role']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $group['Role']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $group['Role']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
<?php   echo $this->element('paginate') ?>
</div>

