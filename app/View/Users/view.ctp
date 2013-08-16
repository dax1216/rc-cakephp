<h2><?php  echo __('User');?></h2>
<dl>
    <dt><?php echo __('First Name'); ?></dt>
    <dd>
        <?php echo h($user['User']['first_name']); ?>
        &nbsp;
    </dd>
    <dt><?php echo __('Last Name'); ?></dt>
    <dd>
        <?php echo h($user['User']['last_name']); ?>
        &nbsp;
    </dd>
    <dt><?php echo __('Email Address'); ?></dt>
    <dd>
        <?php echo h($user['User']['email_address']); ?>
        &nbsp;
    </dd>
    <dt><?php echo __('Role'); ?></dt>
    <dd>
        <?php echo h($user['Role']['name']); ?>
        &nbsp;
    </dd>
</dl>
