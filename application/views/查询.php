<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"> 
   <title>查询</title>
   <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
   <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
   <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type="text/javascript">
    function check_cookie ()
    {
      var x = '<%=session("id")%>';
      var A = document.createElement('a');
      if (x != '')
      {
        A.href = "users.php";
        A.innerHTML = x;
        document.getElementById("id").appendChild(A);
        document.getElementById("qqq").style.display = "visible";
        document.getElementById("un_login").style.display = "none";
        alert("已登录");
      }
      else
      {
        alert("未登录");
        document.getElementById("qqq").style.display = "none";
        document.getElementById("un_login").style.display = "visible";
      }
    }
    function show_with_transfer()
    {
      document.getElementById("without_tansfer").style.display = "none";
      document.getElementById("user_id").style.display = "none";
      document.getElementById("with_tansfer").style.display = "inline";
    }
    function show_without_transfer()
    {
      document.getElementById("without_tansfer").style.display = "inline";
      document.getElementById("user_id").style.display = "none";
      document.getElementById("with_tansfer").style.display = "none";
    }
    function show_check_user()
    {
      document.getElementById("without_tansfer").style.display = "none";
      document.getElementById("user_id").style.display = "inline";
      document.getElementById("with_tansfer").style.display = "none";
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
            <li class="active"><a href="查票.php">查询</a></li>
        </ul>
    </div>
      <div id = "qqq" class="navbar-right">
        <ul class="nav navbar-nav">
            <li><a href="admin.php">管理</a></li>
            <li id = "id"></li>
        </ul>
      </div>
</nav>
<div class="col-sm-8">
<div class="col-md-offset-2">
<div class="radio">
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" onclick="show_with_transfer()">有中转站
  </label>
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onclick="show_without_transfer()">无中转站
  </label>
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" onclick="show_check_user()">查找用户
  </label>
</div>
</div>
</div>
<div class="col-sm-8" id = "with_tansfer">
<div class="col-md-offset-2">
<form action="check.php" method="post" row = "form" onsubmit="return check_cookie()">
<div class="form-inline">
  <input type = "text" class = "form-control" placeholder="出发地" required="required" name = "loc1">
  <input type = "text" class = "form-control" placeholder="目的地" required="required" name = "loc2">
  <input type = "text" class = "form-control" placeholder="类型" required="required" name = "loc2">
  <input type = "text" class = "form-control" placeholder="时间" required="required" name = "loc2">
  <button type="submit" class="btn btn-default">
            提交
  </button>
</div>
</form>
</div>
</div>
<div class="col-sm-8" id = "without_tansfer">
<div class="col-md-offset-2">
<form action="check.php" method="post" row = "form" onsubmit="return check_cookie()">
<div class="form-inline">
  <input type = "text" class = "form-control" placeholder="出发地" required="required" name = "loc1">
  <input type = "text" class = "form-control" placeholder="目的地" required="required" name = "loc2">
  <input type = "text" class = "form-control" placeholder="类型" required="required" name = "loc2">
  <input type = "text" class = "form-control" placeholder="时间" required="required" name = "loc2">
  <button type="submit" class="btn btn-default">
    提交
  </button>
</div>
</form>
</div>
</div>
<div class="col-sm-8" id = "user_id">
<div class="col-md-offset-2">
<form action="check.php" method="post" row = "form" onsubmit="return check_cookie()">
<div class="form-inline">
  <input type = "text" class = "form-control" placeholder="用户ID" required="required" name = "loc1">
  <button type="submit" class="btn btn-default">提交</button>
</div>
</form>
</div>
</div>
<script type="text/javascript">
  document.getElementById("without_tansfer").style.display = "none";
  document.getElementById("user_id").style.display = "none";
  document.getElementById("with_tansfer").style.display = "none";
  check_cookie();
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