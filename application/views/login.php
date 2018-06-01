<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <title>登陆</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
   <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
   <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
   <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
  function get_time()
  {
    document.getElementById ().innerHTML = Date();
  }
</script>
<script type="text/javascript">
  function check_name()
  {
    var x = document.forms["login"]["loc1"].value;
    if(!(/^[A-Za-z0-9\_\-]+$/gi).test(x))
    {
      alert("username error");
      return false;
    }
    document.getElementById("test").innerHTML = x;
    return false;
  }
  function test()
  {

  }
</script>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
   <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="test.html">火车票订票系统</a>
    </div>
    <div>
        <ul class="nav navbar-nav">
            <li><a href="订票.php">订票</a></li>
            <li><a href="查询.php">查询</a></li>
        </ul>
    </div>
   <form class="navbar-form navbar-right" role="search" action="Login.php" method="post">
    <div class="form-group" style="color: white;">
      <script type="text/javascript">
        document.write(Date());
      </script>
    </div>
    </form>
</nav>
<div class="col-sm-8">
        <div class="col-md-offset-2">
<form action="index.php/login/check" method="post" row = "form" onsubmit="return check_name()" name = "login">
  <div class="form-inline">
          <input type = "text" class = "form-control" placeholder="账号" name = "loc1" required="required">
          <input type = "password" class = "form-control" placeholder="密码" name = "loc2" required="required">
          <button type="submit" class="btn btn-default">
            登陆
          </button>
   </div>	
</div>
</div>
<p id = "test">
  调试
</p>
<script>
test();
</script>
</body>
</html>
