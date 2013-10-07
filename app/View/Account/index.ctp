
<section id="user_information" class="well">
    <?php echo $this->Form->create('User');?>
    <input type="hidden" name="change_password" value="0" />
    <h2>Account Information</h2>   
    
    <ul class="nav nav-tabs" id="myTab">
      <li><a href="#edit-profile" data-toggle="tab">Edit Profile</a></li>
      <li><a href="#change-password" data-toggle="tab">Change Password</a></li>
    </ul>
   
    <div class="tab-content">
        <div class="tab-pane active" id="edit-profile">
            <div class="row-fluid">
                <fieldset>
                    <?php
                        echo $this->Form->input('user_id');
                        echo $this->Form->input('first_name', array('label' => 'First Name'));
                        echo $this->Form->input('last_name', array('label' => 'Last Name'));
                        echo $this->Form->input('email_address', array('label' => 'Email Address'));
                        echo $this->Form->input('email_address_confirm', array('type' => 'hidden'));
                    ?>
                </fieldset>

            </div>
            <hr class="main" />
            <div class="row-fluid">
                <h3>Contact Details</h3>
                <fieldset>
                    <?php
                        echo $this->Form->input('phone', array('error' => array( 'attributes' => array( 'class' => 'label label-important' ) )));
                        echo $this->Form->input('address', array('error' => array( 'attributes' => array( 'class' => 'label label-important' ) )));
                        echo $this->Form->input('city', array('error' => array( 'attributes' => array( 'class' => 'label label-important' ) )));
                        echo $this->Form->input('state', array('options' => $this->Geography->stateList(array('outside' => 'Outside US')), 'empty' => 'Select State', 'error' => array( 'attributes' => array( 'class' => 'label label-important' ) )));
                        echo $this->Form->input('zip', array('error' => array( 'attributes' => array( 'class' => 'label label-important' ) )));
                        echo $this->Form->input('country', array('options' => $this->Geography->countryList(), 'empty' => 'Select Country', 'default' => 'US', 'error' => array( 'attributes' => array( 'class' => 'label label-important' ) )));
                    ?>
                </fieldset>

            </div>

        <?php echo $this->Form->end(array('class' => 'btn btn-primary', 'label' => 'Update My Account'));?>
        </div>
        <div class="tab-pane" id="change-password">
            <div class="row-fluid">
                <?php echo $this->Form->create('User', array('url' => '/account/index#change-password', 'autocomplete' => 'off'));?>
                    <fieldset>
                    <input type="hidden" name="change_password" value="1" />
                    <?php
                        echo $this->Form->input('current_password',array('label' => 'Current Password','type' => 'password'));
                        echo $this->Form->input('password', array('value' => '', 'label' => 'New Password','type' => 'password'));
                        echo $this->Form->input('password_confirm',array('label' => 'Confirm New Password','type' => 'password'));
                    ?>
                    </fieldset>
                <?php echo $this->Form->end(array('class'=>'btn btn-primary', 'label' => 'Change Password')); ?>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        $('i[rel=tooltip]').tooltip();

        if(window.location.href.indexOf('change-password') >= 0) {
            $('#myTab a:last').tab('show');
        } else {
            $('#myTab a:first').tab('show');
        }
    });
</script>
