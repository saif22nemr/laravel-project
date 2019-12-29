
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $__env->yieldContent('title'); ?></title>
  <script type="text/javascript" src="../../js/app.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('main.css')); ?>">
	<style type="text/css">
    body{
      font-family: 'Arial';
    }
		.center{
			text-align:center !important;
		}
    .h2{
      padding:20px;
      margin:10px;
      background-color:#EEE;
      border:1px solid #CCC;
      border-radius:20px;
      text-shadow: all;
    }
    .container{
      max-width:1200px;
      margin:auto;
    }
    .subject{
      background-color:#fbfbfb;
      color:#525252;
      padding:0 0 10px 0px;
      font-size:16px;
      border:1px solid #CCC;
      border-radius:10px;
    }
    .subject .title{
      padding:15px 10px;
      margin: 0;
      background-color:#c1c1c1;
      text-align: center;
      text-transform: capitalize;
      font-family: 'Tahoma';
      font-size:30px;
      font-weight: bold;
      border:1px solid #CCC;
      border-radius:8px 8px 0px 0px;
    }
    .subject .content{
      padding:10px;
    }
    .subject .content ul li{
      margin:10px 5px;
    }
	</style>
</head>
<body>
	<h1 class="center">Welcome!</h1>
	<a class="center" href="<?php echo route('user.index');?>" alt="for redirect to route name">User With Admin Panel</a>
  <?php echo $__env->yieldContent('content'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\first-project\resources\views/layout/app.blade.php ENDPATH**/ ?>