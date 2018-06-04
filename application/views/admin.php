<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"> 
   <title>管理员</title>
   <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
   <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
   <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type="text/javascript">
     function get_id()
     {
      var x = '<%=session("id")>';
      document.getElementById("userid").innerHTML = x;
      document.getElementById("add_admin").style.display = "none";
      document.getElementById("open_train").style.display = "none";
      document.getElementById("add_train").style.display = "none";
      document.getElementById("delete_train").style.display = "none";
     }
     function check_id()
     {
      var x = document.forms["users"]["name"].value;
      if(!(/^[A-Za-z0-9\_\-]+$/gi).test(x))
      {
        alert("username error");
        return false;
      }
     }
     function check_train()
     {
      var x = document.forms["users"]["name"].value;
      if(!(/^[\d]+$/gi).test(x))
      {
        alert("username error");
        return false;
      }
     }
     function show_add_train()
     {
      document.getElementById("add_admin").style.display = "none";
      document.getElementById("open_train").style.display = "none";
      document.getElementById("add_train").style.display = "inline";
      document.getElementById("delete_train").style.display = "none";
     }
     function show_open_train()
     {
      document.getElementById("add_admin").style.display = "none";
      document.getElementById("add_train").style.display = "none";
      document.getElementById("open_train").style.display = "inline";
      document.getElementById("delete_train").style.display = "none";
     }
     function show_add_admin()
     {
      document.getElementById("open_train").style.display = "none";
      document.getElementById("add_train").style.display = "none";
      document.getElementById("add_admin").style.display = "inline";
      document.getElementById("delete_train").style.display = "none";
     }
     function show_delete_train()
     {
      document.getElementById("open_train").style.display = "none";
      document.getElementById("add_train").style.display = "none";
      document.getElementById("add_admin").style.display = "none";
      document.getElementById("delete_train").style.display = "inline";
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
            <li class="active"><a href="admin.php">管理</a></li>
          <li><a href="users.php" id = "userid">
            
          </a>
          </li>
        </ul>
    </div>
    </div>
   </div>
</nav>
<div class="col-md-offset-2">
<div class="radio">
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" onclick="show_add_train()">添加车次
  </label>
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onclick="show_open_train()">公开车次
  </label>
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" onclick="show_delete_train()">删除车次
  </label>
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios4" value="option4" onclick="show_add_admin()">增加管理员
  </label>
</div>
</div>
<br>
<div id = "add_admin">
<div class="col-md-offset-2">
<form action="change_user.php" method="post" row = "form" onsubmit="return check_id()" name = "users">
<div class="form-inline">
          <input type = "text" class = "form-control" placeholder="姓名" required="required" name = "name">
          <button type="submit" class="btn btn-default">
            提交
          </button>
</div>
</form>
</div>
</div>
<div id = "add_train">
<div class="col-md-offset-2">
<form action="add_train.php" method="post" row = "form" onsubmit="return check_train()" name = "users">
<div class="form-inline">
          <input type = "text" class = "form-control" placeholder="车号" required="required" name = "name">
          <input type = "text" class = "form-control" placeholder="车名" required="required" name = "name">
          <input type = "text" class = "form-control" placeholder="类型" required="required" name = "name">
          <input type = "text" class = "form-control" placeholder="车站数目" required="required" name = "name">
          <input type = "text" class = "form-control" placeholder="车票种数" required="required" name = "name">
          <button type="submit" class="btn btn-default">
            提交
          </button>
</div>
</form>
</div>
</div>
<div id = "open_train">
<div class="col-md-offset-2">
<form action="public_train.php" method="post" row = "form" onsubmit="return check_train()" name = "users">
<div class="form-inline">
          <input type = "text" class = "form-control" placeholder="车次编号" required="required" name = "train_id">
          <button type="submit" class="btn btn-default">
            公开
          </button>
</div>
</form>
</div>
</div>
<div id = "delete_train">
<div class="col-md-offset-2">
<form action="delete_train.php" method="post" row = "form" onsubmit="return check_train()" name = "users">
<div class="form-inline">
          <input type = "text" class = "form-control" placeholder="车次编号" required="required" name = "train_id">
          <button type="submit" class="btn btn-default">
            删除
          </button>
</div>
</form>
</div>
</div>
<script type="text/javascript">
  get_id();
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