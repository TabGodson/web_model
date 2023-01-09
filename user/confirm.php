<?php
session_start();
$error = false;
$e_c = "无错误None";
$b_v = "返回主页Return to Main Page";
$b_a = "../main.php";
$fileH = fopen("num.data","r");
$handle;
$fname;
$i;
$num = fread($fileH,filesize("num.data"));
fclose($fileH);
if(isset($_SESSION['sign']))
{
	if($_POST['name'] != "" or $_POST['pw'] != "")
	{
		if($_SESSION['sign'] == "in")
		{
			for($i = 1;$i < $num + 1;$i++)
			{
				$fname = $i."/name.data";
				$handle=fopen($fname,"r");
				if(fread($handle, filesize($fname))==$_POST['name'])
				{
					$fname = $i."/pw.data";
					$handle=fopen($fname,"r");
					if(fread($handle, filesize($fname))==$_POST['pw'])
					{
						$e_c = "成功登录 successfully sign in";
						$_SESSION['name'] = $_POST['name'];
					}
					else
					{
						$e_c = "密码不正确 password incorrect";
						$b_a = "signin.php";
						$b_v = "返回登录Return to Sign In";
					}
					$i = $num;
				}
			}
			if($i == $num + 1)
			{
				$e_c = "账号不存在 account not exist";
				$b_a = "signin.php";
				$b_v = "返回登录Return to Sign In";
			}
			else
			{
				$_SESSION['error'] = "sign in find error";
			}
		}
		else if($_SESSION['sign'] == "up")
		{
			for($i = 1;$i < $num + 1;$i++)
			{
				$fname = $i."/name.data";
				$handle=fopen($fname,"r");
				if(fread($handle, filesize($fname))==$_POST['name'])
				{
					$e_c = "名字已存在 name has exist";
					$i = $num;
				}
			}
			if($e_c == "无错误None")
			{
				$num++;
				$fileH = fopen("num.data","w");
				fwrite($fileH, $num);
				fclose($fileH);
				mkdir($num);
				$fname = $num."/name.data";
				$handle = fopen($fname,"w");
				fwrite($handle, $_POST['name']);
				fclose($handle);
				$fname = $num."/pw.data";
				$handle = fopen($fname,"w");
				fwrite($handle, $_POST['pw']);
				fclose($handle);
				$e_c = "账号创建成功 successfully sign up";
			}
			else if($e_c == "名字已存在 name has exist")
			{
				$b_a = "signup.php";
				$b_v = "返回注册Return to Sign Up";
			}
			else
			{
				$_SESSION['error'] = "sign up find error";
			}
		}
	}
	else
	{
		$e_c = "名字或密码为空 name or password is empty";
		if($_SESSION['sign'] == "up")
		{
			$b_a = "signup.php";
			$b_v = "返回注册Return to Sign Up";
		}
		else
		{
			$b_a = "signin.php";
			$b_v = "返回登录Return to Sign In";
		}
	}
}
else
{
	$_SESSION['error'] = "sign confirm error";
}
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
			<h1 style="height: 20%;"><?php echo $e_c;?></h1>
			<form action="<?php echo $b_a;?>">
				<input type="submit" value="<?php echo $b_v;?>" style="height: 15%;margin-top: 45%;">
			</form>
		</div>
	</main>
</body>