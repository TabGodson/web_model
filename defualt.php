<?php
session_start();
?>
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
		<h1>Error Code</h1>
		<h3>You have received an error code</h3>
		<h1>错误代码</h1>
		<h3>您收到了错误代码</h3>
		<?php
		echo "error code:",$_SESSION['error'];
		$_SESSION['error'] = "none";
		?>
	</main>
</body>