<h4><?php echo $aco ?></h4>
<hr />
<table class="table table-striped">
    <thead>
        <tr>
            <th>Role</th>
            <th>Allow</th>
        </tr>
    </thead>
    <tbody>
<?php   foreach($roles as $role) { ?>
        <tr>
            <td><?php echo $role['Role']['name']?></td>
            <td onclick="updatePermission(this, <?php echo $role['Role']['role_id']?>, '<?php echo $aco?>')">
            <?php
                if($role['Role']['allowed'])
                    echo $this->Html->image('approve.png');
                else
                    echo $this->Html->image('deny.png');
            ?>
            </td>
        </tr>
<?php   } ?>
    </tbody>
</table>