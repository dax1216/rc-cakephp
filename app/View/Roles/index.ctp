<div class="groups index">
	<h2><?php echo __('Roles');?></h2>
    <a href="/roles/add" class="btn">Add Role</a>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('name');?></th>
                <th><?php echo $this->Paginator->sort('created');?></th>
                <th><?php echo $this->Paginator->sort('modified');?></th>
                <th class="actions"><?php echo __('Actions');?></th>
            </tr>
        </thead>
	<?php
        if(!empty($roles)) :
            foreach ($roles as $role):
    ?>
    <tbody>
	<tr>		
		<td><?php echo h($role['Role']['name']); ?>&nbsp;</td>
		<td><?php echo h($role['Role']['created']); ?>&nbsp;</td>
		<td><?php echo h($role['Role']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $role['Role']['role_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $role['Role']['role_id'])); ?>
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

