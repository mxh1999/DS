<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"> 
   <title>购票</title>
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
      }
      else
      {
        document.getElementById("qqq").style.display = "none";
        document.getElementById("un_login").style.display = "visible";
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
            <li class="active"><a href="订票.php">订票</a></li>
            <li><a href="查询.php">查询</a></li>
        </ul>
    </div>
      <div id = "qqq" class="navbar-right">
        <ul class="nav navbar-nav">
            <li><a href="admin.php">管理</a></li>
            <li id = "id"></li>
        </ul>
      </div>
   </div>
</nav>

<div class="col-md-offset-2">
<form action="index.php/book" method="post" row = "form">
  <div class="form-inline">
          <input type = "text" class = "form-control" placeholder="车次" required="required" name = "id">
          <input type = "text" class = "form-control" placeholder="出发地" required="required" name = "loc1">
          <input type = "text" class = "form-control" placeholder="目的地" required="required" name = "loc2">
          <input type = "text" class = "form-control" placeholder="时间" required="required" name = "date">
          <input type = "text" class = "form-control" placeholder="数量" required="required" name = "num">
          <input type = "text" class = "form-control" placeholder="车票种类" required="required" name = "ticket_kind">
          <button type="submit" class="btn btn-default">
            提交
          </button>
</div>
</form>
</div>
<script type="text/javascript">
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