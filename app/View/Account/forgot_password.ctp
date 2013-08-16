 <form class="form-forgot-password">
    <h2 class="form-signin-heading">Account Recovery</h2>
    <?php echo $this->Form->create('User');?>
    <table class="table table-striped">
        <tr>
            <td><input type="radio" value="forgot_password" name="access_problem" checked="checked" /> I forgot my password</td>
            <td><input type="radio" value="forgot_username" name="access_problem" /> I can't remember my username</td>
        </tr>
        <tr>
            <td><?php echo $this->Form->input('first_name') ?></td>
            <td><?php echo $this->Form->input('last_name') ?></td>
        </tr>
        <tr>
            <td colspan="2"><?php echo $this->Form->input('email_address', array('label' => 'Your E-mail Address'))?></td>
        </tr>
    </table>    
    <button class="btn btn-large btn-primary" type="submit">Submit</button>
    <?php   echo $this->Form->end() ?>
  </form>
