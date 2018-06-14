<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <title>登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
   <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
   <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
   <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
  function check_cookie ()
  {
    var x = "<?php if (isset($_COOKIE['user'])) {echo $_COOKIE['user'];}?>";
    if (x != "")
    {
      document.getElementById("user_name").innerHTML = x;
      var A = document.createElement('b');
      A.setAttribute("class","caret");
      document.getElementById("user_name").appendChild(A);
      document.getElementById("qqq").style.display = "visible";
      document.getElementById("un_login").style.display = "none";
    }
    else
    {
      var A = document.createElement('b');
      A.setAttribute("class","caret");
      document.getElementById("un_login").appendChild(A);
      document.getElementById("qqq").style.display = "none";
      document.getElementById("un_login").style.display = "visible";
    }
  }
  function go_to_login()
  {
    document.getElementById("Login").setAttribute("style", "rgba(248,248,255, 0.6)")
  }
</script>
<style type="text/css">
  body 
  {
    background: no-repeat;
    background-image:url("http://chuantu.biz/t6/328/1528999320x-1404793154.jpg");
    background-color:#cccccc;
    background-size:100%;
    width: 100%;
  }
</style>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
   <div class="container-fluid">
    <div class="navbar-header">
        <ul class="nav navbar-nav">
        <li><a class="navbar-brand" href="<?php echo This_URL ?>">火车票订票系统</a></li>
        </ul>
    </div>
    <div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo This_URL ?>/Ticket">购票</a></li>
        </ul>
    </div>
  </div>
</nav>
<div class="col-md-4 col-md-offset-4" style="background-color: white; background-color: rgba(248,248,255, 0.2);padding: 0px; border-width: 0px; top: 50px; height: 350px;">
  <p style="color: white; padding: 10px;background-color: rgba(248,248,255,0.4); text-align: center;font-size: 20px;" class="col-md-6">
    登录
  </p>
  <a href = "<?php echo This_URL ?>Register"><p style="color: white; padding: 10px;background-color: rgba(248,248,255,0);text-align: center;font-size: 20px;" class="col-md-6">
    注册
  </p></a>
  <div style="background-color: rgba(248,248,255,0.4);height: 301px;margin-top: 49px; padding-top: 70px;text-align: center;">
    <form action = "<?php echo This_URL ?>Login/check">
    <p class="col-md-3 col-md-offset-1">
      用户ID:
    </p>
    <input type="text" name="id">
    <br>
    <br>
    <br>
    <br>
    <p class="col-md-3 col-md-offset-1">
      密码:
    </p>
    <input type="password" name="psword">
    <br>
    <br>
    <br>
    <br>
    <div style="text-align: center; margin-right: auto; margin-left: auto;">
    <button type="submit" class="btn btn-default">
      登录
    </button>
    </div>
    </form>
  </div>
</div>
<footer class="footer navbar-fixed-bottom ">
    <div class="container">
    <div style = "text-align: center; color: white;">
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