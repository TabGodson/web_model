<?php
session_start();
$_SESSION['sign'] = "in";
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
<body style="background-image: url(sign_bg.jpg);">
	<header>
		<nav>
			<ul>
  				<li><a class="active" href="..\main.php">主页main</a></li>
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
		<div class="edge2" style="width: 30%;height: 50%;">
			<h2 style="height: 20%;">登录Sign in</h2>
			<form action="confirm.php" method="post">
				<p style="height: 7%;">名字name:</p>
				<input type="text" name="name" value="" style="height: 15%;">
				<p style="height: 7%;">密码password:</p>
				<input type="password" name="pw" value="" style="height: 15%;">
				<input type="submit" value="提交submit" style="height: 15%;">
			</form>
		</div>
	</main>
</body>