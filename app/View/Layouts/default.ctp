<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<?php
		echo $this->Html->meta('icon');
        echo $this->fetch('meta');

		echo $this->Html->css(array('bootstrap.min', 'bootstrap-responsive.min', 'style'));
		
		echo $this->fetch('css');

        echo $this->Html->script(array('jquery-1.10.2', 'bootstrap.min'));
        
		echo $this->fetch('script');
	?>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src=".js/html5shiv.js"></script>
    <![endif]-->
</head>
<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Project name</a>
<?php   echo $this->element('menu') ?>
        </div>
      </div>
    </div>

    <div class="container">
    <?php
        echo $this->Session->flash('auth');
        echo $this->Session->flash();
    ?>
	<?php echo $content_for_layout ?>

      <hr>
      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div>
</body>
</html>
