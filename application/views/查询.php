<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"> 
   <title>查票</title>
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
            <li><a href="订票.php">订票</a></li>
            <li class="active"><a href="查票.php">查询</a></li>
        </ul>
    </div>
   <form class="navbar-form navbar-right" role="search">
    <div class="form-group" style="color: white;">
      <script type="text/javascript">
        document.write(Date());
      </script>
      <div class="form-group">
                <input type="text" class="form-control" placeholder="User">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">
                登陆
            </button>
            <button class="btn btn-default">
                <a href="#" style="color: black;">注册</a>
            </button>
        </form>
   </div>
</nav>
<div class="col-sm-8">
<div class="col-md-offset-2">
<div class="radio">
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">有中转站
  </label>
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">无中转站
  </label>
</div>
</div>
</div>
<div class="col-sm-8">
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