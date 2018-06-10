<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <title>注册</title>
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
    var x = document.forms["register"]["username"].value;
    if(!(/^[A-Za-z0-9\_\-]+$/gi).test(x))
    {
      alert("username error");
      return false;
    }
    x = document.forms["register"]["email"].value;
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
      alert("e-mail adress error");
      return false;
    }
    x = document.forms["register"]["phone"].value;
    if(!(/^[\d]+$/gi).test(x))
    {
      alert("phone number error");
      return false;
    }
    return false;
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
</nav>
<div class="col-md-offset-3">
<form action="index.php/register" method="post" row = "form" onsubmit="return check_name()" name = "register">
  <div class="form-inline">
          <input type = "text" class = "form-control" placeholder="账号" name = "username" required="required">
          <input type = "password" class = "form-control" placeholder="密码" name = "password" required="required">
          <input type = "text" class = "form-control" placeholder="邮箱地址" name = "email" required="required">
          <input type = "text" class = "form-control" placeholder="电话号码" name = "phone" required="required">
          <button type="submit" class="btn btn-default">
            注册
          </button>
   </div>	
        </form> 
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
