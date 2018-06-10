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
      var x = document.forms["change_users"]["name"].value;
      if(!(/^[A-Za-z0-9\_\-]+$/gi).test(x))
      {
        alert("username error");
        return false;
      }
      x = document.forms["change_users"]["email"].value;
      var atpos=x.indexOf("@");
      var dotpos=x.lastIndexOf(".");
      if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
      {
        alert("e-mail adress error");
        return false;
      }
      x = document.forms["change_users"]["phone"].value;
      if(!(/^[\d]+$/gi).test(x))
      {
        alert("phone number error");
        return false;
      }
     }
     function show_users_train()
     {
      document.getElementById("ticket_check").style.display = "inline";
      document.getElementById("change_users").style.display = "none";
      document.getElementById("required_ticket").style.display = "none";
      document.getElementById("log_out").style.display = "none";
     }
     function delete_users_train()
     {
      document.getElementById("ticket_check").style.display = "none";
      document.getElementById("change_users").style.display = "none";
      document.getElementById("required_ticket").style.display = "inline";
      document.getElementById("log_out").style.display = "none";
     }
     function change_user()
     {
      document.getElementById("ticket_check").style.display = "none";
      document.getElementById("change_users").style.display = "inline";
      document.getElementById("required_ticket").style.display = "none";
      document.getElementById("log_out").style.display = "none";
     }
     function Init()
     {
      document.getElementById("ticket_check").style.display = "none";
      document.getElementById("change_users").style.display = "none";
      document.getElementById("required_ticket").style.display = "none";
      document.getElementById("log_out").style.display = "none";
     }
     function logout()
     {
      document.getElementById("ticket_check").style.display = "none";
      document.getElementById("change_users").style.display = "none";
      document.getElementById("required_ticket").style.display = "none";
      document.getElementById("log_out").style.display = "inline";
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
          <li class="active"><a href="users.php" id = "userid">
            
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

<div class="col-md-offset-2">
<div class="radio">
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" onclick="show_users_train()">查询个人订票情况
  </label>
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onclick="change_user()">修改个人信息
  </label>
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" onclick="delete_users_train()">退票
  </label>
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" onclick="logout()">退出登录
  </label>
</div>
</div>
<div class="col-md-offset-2">
<form action="change_user.php" method="post" row = "form" onsubmit="return check()" name = "ticket_check" id = "ticket_check">
<div class="form-inline">
  <input type = "text" class = "form-control" placeholder="类别" required="required" name = "catalog">
  <input type = "password" class = "form-control" placeholder="日期" required="required" name = "date">
  <button type="submit" class="btn btn-default">
    提交
  </button>
</div>
</form>
</div>
<div class="col-md-offset-2">
<form action="change_user.php" method="post" row = "form" onsubmit="return check()" name = "change_users" id = "change_users">
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
<div class="col-md-offset-2">
<form action="change_user.php" method="post" row = "form" onsubmit="return check()" name = "required_ticket" id = "required_ticket">
<div class="form-inline">
  <input type = "text" class = "form-control" placeholder="车次" required="required" name = "train_id">
  <input type = "text" class = "form-control" placeholder="日期" required="required" name = "train_date">
  <input type = "text" class = "form-control" placeholder="出发地" required="required" name = "loc1">
  <input type = "text" class = "form-control" placeholder="目的地" required="required" name = "loc2">
  <input type = "text" class = "form-control" placeholder="数目" required="required" name = "num">
  <input type = "text" class = "form-control" placeholder="车票种类" required="required" name = "ticket_kind">
  <button type="submit" class="btn btn-default">
    提交
  </button>
</div>
</form>
</div>
<div name ="log_out" id = "log_out" class="col-md-offset-4">
  <a href="Logout.php"  class="btn btn-default">
    确认退出登录
  </a>
</div>
<script type="text/javascript">
  Init();
</script>
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