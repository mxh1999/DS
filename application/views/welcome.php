<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <title>火车票订票系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
   <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
   <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
   <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
  function check_cookie ()
  {
    var x = "<?php if (isset($_COOKIE['user'])) {echo $_COOKIE['user'];}?>";
    if (x != "")
    {
      document.getElementById("user_name").innerHTML = x;
      var A = document.createElement('b');
      A.setAttribute("class","caret");
      document.getElementById("user_name").appendChild(A);
      document.getElementById("qqq").style.display = "visible";
      document.getElementById("un_login").style.display = "none";
    }
    else
    {
      var A = document.createElement('b');
      A.setAttribute("class","caret");
      document.getElementById("un_login").appendChild(A);
      document.getElementById("qqq").style.display = "none";
      document.getElementById("un_login").style.display = "visible";
    }
  }
</script>
<style type="text/css">
  body 
  {
    background: no-repeat;
    background-image:url("http://chuantu.biz/t6/328/1528979692x-1566661301.jpg");
    background-color:#cccccc;
    background-size:100%;
    width: 100%;
    background-attachment: fixed;
  }
</style>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
   <div class="container-fluid">
    <div class="navbar-header">
        <ul class="nav navbar-nav">
        <li class="active"><a class="navbar-brand" href="<?php echo This_URL ?>">火车票订票系统</a></li>
        </ul>
    </div>
      <div id = "qqq" class="navbar-right navbar-nav nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" name = "user_name" id = "user_name">
        </a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo This_URL ?>/Profile">用户</a></li>
          <li><a href="<?php echo This_URL ?>/Logout">登出</a></li>
        </ul>
        </li>
      </div>
      <div class="navbar-right navbar-nav nav" id = "un_login">
        <li>
        <a href="<?php echo This_URL ?>/Login">
          登录/注册
        </a>
        </li>
      </div>
    <div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo This_URL ?>/Ticket">购票</a></li>
        </ul>
    </div>
  </div>
</nav>
<script type="text/javascript">
  check_cookie();
</script>
<footer class="footer navbar-fixed-bottom ">
    <div class="container">
    <div style = "text-align: center; color: white;">
    <p>当前时间
    <script type="text/javascript">
        document.write(Date());
      </script>
      </p>
    </div>
  </div>
</footer>
</body>
</html>