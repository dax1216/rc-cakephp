<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <p>Hello <?=$user['User']['full_name']?></p>
        <p>This email was sent to recover your password. We created a temporary password for your account. Please <a href="http://whitewhalecards.com/login">log-in</a> and change this as soon as possible.</p>

        <p>New Password: <?php echo $temp_password?></p>
        <br />
        Regards,<br />
        Admin
    </body>
</html>