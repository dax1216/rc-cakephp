<div class="groups index">
	<h2><?php echo __('Users');?></h2>
    <a href="/users/add" class="btn">Add User</a>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('name');?></th>
                <th><?php echo $this->Paginator->sort('email_address');?></th>
                <th>Role</th>
                <th><?php echo $this->Paginator->sort('created');?></th>
                <th><?php echo $this->Paginator->sort('modified');?></th>
                <th>Is Active</th>
                <th class="actions"><?php echo __('Actions');?></th>
            </tr>
        </thead>
	<?php
        if(!empty($users)) :
            foreach ($users as $user):
    ?>
    <tbody>
	<tr>		
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
        <td><?php echo h($user['User']['email_address']); ?>&nbsp;</td>
        <td><?php echo h($user['Role']['name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['updated']); ?>&nbsp;</td>
        <td><?php echo ($user['User']['is_active']) ? 'Yes' : 'No' ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['user_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['user_id'])); ?>
		</td>
	</tr>
<?php   
        endforeach;
    endif;
?>
    </tbody>
	</table>
<?php   echo $this->element('paginate') ?>
</div>

