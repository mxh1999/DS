<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"> 
   <title>用户</title>
   <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
   <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
   <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type="text/javascript">
     function get_id()
     {
      var x = '<%=session("id")>';
      document.getElementById("userid").innerHTML = x;
     }
     function check()
     {
      var x = document.forms["users"]["name"].value;
      if(!(/^[A-Za-z0-9\_\-]+$/gi).test(x))
      {
        alert("username error");
        return false;
      }
      x = document.forms["users"]["email"].value;
      var atpos=x.indexOf("@");
      var dotpos=x.lastIndexOf(".");
      if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
      {
        alert("e-mail adress error");
        return false;
      }
      x = document.forms["users"]["phone"].value;
      if(!(/^[\d]+$/gi).test(x))
      {
        alert("phone number error");
        return false;
      }
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
            <li><a href="订票.php">订票</a></li>
            <li><a href="查询.php">查询</a></li>
        </ul>
        <ul class="nav navbar-nav pull-right">
          <li><a href="users.php" style="color: white;" id = "userid">
            
          </a>
          </li>
        </ul>
    </div>
    </div>
   </div>
</nav>
<script type="text/javascript">
  get_id();
</script>
<div class="col-sm-8">
<div class="col-md-offset-2">
<p>
  修改个人信息
</p>
<form action="change_user.php" method="post" row = "form" onsubmit="return check()" name = "users">
<div class="form-inline">
          <input type = "text" class = "form-control" placeholder="姓名" required="required" name = "name">
          <input type = "password" class = "form-control" placeholder="密码" required="required" name = "password">
          <input type = "text" class = "form-control" placeholder="邮箱" required="required" name = "email">
          <input type = "text" class = "form-control" placeholder="电话" required="required" name = "phone">
          <button type="submit" class="btn btn-default">
            提交
          </button>
</div>
</form>
</div>
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