<?php
session_start();
$_SESSION['error'] = "none";
?>
<script type="text/javascript">
	<?
	if($_SESSION['error'] != "none")
	{
		echo "window.location.href=\"../defualt.php\"";
	}
	?>
</script>
<head>
<meta charset="utf-8">
	<title>web</title>
	<link rel="stylesheet" type="text/css" href="..\style\css\main_style.css">
	<link rel="shortcut icon" href="..\style\ico\main_icon.ico">
</head>
<style type="text/css">

</style>
<body>
	<header>
		<nav>
			<ul>
  				<li><a class="active" href="">关于About</a></li>
  				<li><a href=""></a></li>
  				<?php
  				if(isset($_SESSION['name']))
  				{
  					echo "<li style=\"float:right!important\"><a href=\"\">",$_SESSION['name'],"</a></li>";
  				}
  				else
  				{
  					echo "<li style=\"float:right!important\"><a href=\"..\user\signin.php\">登录Sign in</a></li>
  				<li style=\"float:right!important\"><a href=\"..\user\signup.php\">注册Sign up</a></li>";
  				}
  				?>
  			</ul>
		</nav>
		<h1>web name</h1>
	</header>
	<main>
		<div>
			<img src="..\picture\main_page\main_top.png" style="width:100%">
		</div>
		
		
		
	</main>
</body>