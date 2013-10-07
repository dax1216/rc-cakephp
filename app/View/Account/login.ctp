<?php echo $this->Form->create('User', array('class' => 'form-signin'));?>
    <h2 class="form-signin-heading">Please sign in</h2>
    <?php echo $this->Form->input('email_address', array('label' => false, 'class' => 'input-block-level', 'placeholder' => 'Email address')); ?>
    <?php echo $this->Form->input('password', array('label' => false, 'class' => 'input-block-level', 'placeholder' => 'Password')); ?>
    <button class="btn btn-large btn-primary" type="submit">Sign in</button>
    <br /><br />
    <p><a href="/account/forgot_password/">Forgot your password?</a></p>
<?php echo $this->Form->end();?>
