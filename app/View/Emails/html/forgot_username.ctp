<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <p>Hello <?=$user['User']['full_name']?></p>
        <p>This email was sent to recover your username. Your WhiteWhale account username is <?php echo $user['User']['username']?></p>
        
        <br />
        Regards,<br />
        Admin
    </body>
</html>