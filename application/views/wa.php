<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"> 
   <title>WA</title>
   <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
   <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
   <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type="text/javascript">
     function check_cookie()
     {
      var x = '<seession%=>';
      if (x == '')
      {
        alert("未登录");
        return false;
      }
      alert("..");
      return false;
     }
   </script>
</head>
<body>
   

<nav class="navbar navbar-inverse" role="navigation">
   <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="test.php">火车票订票系统</a>
    </div>
    <div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="订票.php">订票</a></li>
            <li><a href="查询.php">查询</a></li>
        </ul>
    </div>
   </div>
</nav>
<div style="text-align: center">
  <h1>
  your username or password is wrong
</h1>
  <br>
  <a href="login.php" role ="button" class="btn btn-default">
  重新登陆
  </a>
  <a href="test.php" role ="button" class="btn btn-default">
  返回首页
  </a>
</div>
<footer class="footer navbar-fixed-bottom ">
    <div class="container">
    <div style = "text-align: center">
    <p>当前时间
    <script type="text/javascript">
        document.write(Date());
      </script>
      </p>
    </div>
</footer>
</body>
</html>