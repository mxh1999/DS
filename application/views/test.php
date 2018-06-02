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
  function get_time()
  {
    document.getElementById ().innerHTML = Date();
  }
  function check_cookie ()
  {
    var x = '<%=session("id")%>';
    x = document.cookie;
    if (x != "")
    {
      document.getElementById("id").innerHTML = "当前登陆用户" + x;
      document.getElementById("qqq").style.display = "visible";
      document.getElementById("un_login").style.display = "none";
      alert("已登陆");
      document.cookie = "";
    }
    else
    {
      alert("未登录");
      document.getElementById("qqq").style.display = "none";
      document.getElementById("un_login").style.display = "visible";
      document.cookie = "1111";
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
    </div>
   <form class="navbar-form navbar-right" role="search" action="Login.php" method="post">
    <div class="form-group" style="color: white;">
      <div id = "qqq">
        <ul class="nav navbar-nav">
            <li id = "id"></li>
        </ul>
      </div>
    </div>
    </form>
  </div>
</nav>
<div class="contener">
  <div class="row">
      <div class="col-md-8 col-md-offset-2" style="background-color: white; box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
        <h1>
         火车票订票系统了解一下
        </h1>
        <div id = "un_login">
              <a href="login.php" style="color: black;" role = "button" class="btn btn-default">登陆</a>
              <a href="register.php" style="color: black;" role = "button" class="btn btn-default">注册</a>
          <br>
          <br>
        </div>
      </div>
  </div>
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
  </div>
</footer>
</body>
</html>