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
    var x = document.forms["register"]["name"].value;
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
    x = document.forms["register"]["psword"].value;
    var y = document.forms["register"]["re_psword"].value;
    if (x != y)
    {
      alert("重复密码错误");
      return false;
    }
    return true;
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
    background-attachment: fixed;
  }
</style>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
   <div class="container-fluid">
    <div class="navbar-header">
        <ul class="nav navbar-nav">
        <li class="active"><a class="navbar-brand" href="<?php echo This_URL ?>">火车票订票系统</a></li>
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
  <a href="<?php echo This_URL ?>/Login"><p style="color: white; padding: 10px;background-color: rgba(248,248,255,0); text-align: center;font-size: 20px;" class="col-md-6">
    登录
  </p></a>
  <p style="color: white; padding: 10px;background-color: rgba(248,248,255,0.4);text-align: center;font-size: 20px;" class="col-md-6">
    注册
  </p>
  <div style="background-color: rgba(248,248,255,0.4);height: 302px;margin-top: 48px; padding-top: 30px; text-align: center;">
    <form action = "<?php echo This_URL ?>/Register/check" method = "post">
    <p class="col-md-3 col-md-offset-1">
      用户名:
    </p>
    <input type="text" name="name">
    <br>
    <br>
    <p class="col-md-3 col-md-offset-1">
      密码:
    </p>
    <input type="password" name="psword">
    <br>
    <br>
    <p class="col-md-3 col-md-offset-1">
      重复输入密码:
    </p>
    <input type="password" name="newpsword">
    <br>
    <br>
    <p class="col-md-3 col-md-offset-1">
      邮箱:
    </p>
    <input type="text" name="email">
    <br>
    <br>
    <p class="col-md-3 col-md-offset-1">
      手机号:
    </p>
    <input type="text" name="phone">
    <br>
    <br>
    <div style="text-align: center; margin-right: auto; margin-left: auto;">
    <button type="submit" class="btn btn-default">
      注册
    </button>
    </div>
    </form>
  </div>
</div>
<script type="text/javascript">
  check_cookie();
</script>
<footer class="footer navbar-fixed-bottom ">
    <div class="container">
    <div style = "text-align: center ; color: white;">
    <p>当前时间
    <script type="text/javascript">
        document.write(Date());
      </script>
      </p>
    </div>
</footer>
</body>
</html>
