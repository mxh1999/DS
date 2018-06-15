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
    function check_cookie ()
    {
    var x = "<?php if (isset($_COOKIE['user'])) {echo $_COOKIE['user'];}?>";
      if (x != '')
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
      x = document.forms["change_users"]["new_psword"].value;
      var y = document.forms["change_users"]["re_new_psword"].value;
      if (x != y)
      {
        alert("重复密码错误");
        return false;
      }
      return true;
     }
     function show_users_train()
     {
      document.getElementById("ticket_check").style.display = "inline";
      document.getElementById("change_users").style.display = "none";
      document.getElementById("users_data").style.display = "none";
     }
     function change_user()
     {
      document.getElementById("ticket_check").style.display = "none";
      document.getElementById("change_users").style.display = "inline";
      document.getElementById("users_data").style.display = "none";
     }
     function show_users_data()
     {
      document.getElementById("ticket_check").style.display = "none";
      document.getElementById("change_users").style.display = "none";
      document.getElementById("users_data").style.display = "inline";
     }
     function Init()
     {
      document.getElementById("ticket_check").style.display = "none";
      document.getElementById("change_users").style.display = "none";
      document.getElementById("users_data").style.display = "none";
      var x = "<?php echo $privilege; ?>";
      if (x == 1)
      {
        document.getElementById("go_to_admin").style.display = "none";
      }
      else
      {
        document.getElementById("go_to_admin").style.display = "inline";
      }
     }
  function get_catalog()
  {
    var ans = '';
    var find = document.getElementsByName("catalog_");
    for (var i = 0; i < 8; i++)
    {
      if (find[i].checked)
        ans = ans + find[i].value;
    }
    document.getElementById("catalog").value = ans;
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
      <div id = "qqq" class="navbar-right navbar-nav nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" name = "user_name" id = "user_name">
        </a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo This_URL ?>/Profile">用户</a></li>
          <li><a href="<?php echo This_URL ?>/Logout">登出</a></li>
        </ul>
        </li>
      </div>
      <div class="navbar-right navbar-nav nav" id = "un_login">
        <li>
        <a href="<?php echo This_URL ?>/Login">
          登录/注册
        </a>
        </li>
      </div>
    <div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo This_URL ?>/Ticket">购票</a></li>
        </ul>
    </div>
  </div>
</nav>
<script type="text/javascript">
  check_cookie();
</script>
<div class="col-md-8 col-md-offset-2" style="background-color: white; background-color: rgba(248,248,255, 0.2);padding: 20px; border-width: 0px; top: 50px; height: 450px;">
<div style="text-align: center;">
    <button type="button" class="btn btn-default" onclick = "show_users_data()">
      个人信息
    </button>
    <button type="button" class="btn btn-default" onclick = "show_users_train()">
      查询个人订票情况
    </button>
    <button type="button" class="btn btn-default" onclick = "change_user()">
      修改个人信息
    </button>
    <a href="<?php echo This_URL ?>/Admin" class = "btn-default btn" type = "button" id = "go_to_admin">
      管理员页面
    </a>
</div>
<div class="col-md-offset-3" style="color: white; font-size: 20px; margin-top: 70px;">
  <div id = "users_data" style="margin-top: 70px;">
    <p>
      姓名：<?php echo $name;?>
    </p>
    <br>
    <p>
      邮箱：<?php echo $email;?>
    </p>
    <br>
    <p>
      电话：<?php echo $phone;?>
    </p>
  </div>
</div>
    <div style="text-align: center; padding-top: 50px;" id = "ticket_check" >
<form action="<?php echo This_URL ?>/Profile/query_order" method="get" row = "form" name = "ticket_check" onsubmit = "get_catalog()" style = "margin-top: 40px;">
<div class="form-inline">
  <p class="col-md-4" style="color: white;">日期:</p>
    <div class="col-md-6">
    <input type = "text" class = "form-control" required="required" name = "date">
    </div>
    <input type = "hidden"  required="required" name = "catalog" id = "catalog">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <p class="col-md-4" style="color: white;">车次类型:</p>
    <div class="col-md-6">
    <input type = "checkbox" name = "catalog_" value = "C" checked="checked">C
    <input type = "checkbox" name = "catalog_" value = "D" checked="checked">D
    <input type = "checkbox" name = "catalog_" value = "G" checked="checked">G
    <input type = "checkbox" name = "catalog_" value = "Z" checked="checked">Z
    <input type = "checkbox" name = "catalog_" value = "T" checked="checked">T
    <input type = "checkbox" name = "catalog_" value = "K" checked="checked">K
    <input type = "checkbox" name = "catalog_" value = "L" checked="checked">L
    <input type = "checkbox" name = "catalog_" value = "O" checked="checked">O
    <input type = "hidden" class = "form-control" required="required" name = "transnum" id = "transnum">
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  <button type="submit" class="btn btn-default">
    提交
  </button>
</div>
</form>
</div>
<div style = "text-align: center; padding-top: 70px;" id = "change_users">
<form action="<?php echo This_URL ?>/Profile/change" method="post" row = "form" name = "change_users" onsubmit = "check()" style = " margin-top: 40px;">
  <div class="col-md-4" style="color: white;">
  <p>姓名:</p>
</div>
  <div class="col-md-6">
  <input type = "text" class = "form-control" required="required" name = "name">
  </div>
  <br>
  <br>
  <div class="col-md-4" style="color: white;">
  <p>原密码:</p>
</div>
  <div class="col-md-6">
  <input type = "password" class = "form-control" required="required" name = "psword">
</div>
  <br>
  <br>
  <div class="col-md-4" style="color: white;">
  <p>新密码:</p>
</div>
  <div class="col-md-6">
  <input type = "password" class = "form-control" required="required" name = "new_psword">
</div>
  <br>
  <br>
  <div class="col-md-4" style="color: white;">
  <p>重复新密码:</p>
</div>
  <div class="col-md-6">
  <input type = "password" class = "form-control" required="required" name = "re_new_psword">
</div>
  <br>
  <br>
  <div class="col-md-4" style="color: white;">
  <p>邮箱:</p>
</div>
  <div class="col-md-6">
  <input type = "text" class = "form-control" required="required" name = "email">
</div>
  <br>
  <br>
  <div class="col-md-4" style="color: white;">
  <p>电话号码:</p>
</div>
  <div class="col-md-6">
  <input type = "text" class = "form-control" required="required" name = "phone">
  <br>
  <br>
</div>
<br>
<br>
<br>
<br>
  <button type="submit" class="btn btn-default">
    提交
  </button>
</form>
</div>
</div>
<script type="text/javascript">
  Init();
  check_cookie();
</script>
<footer class="footer navbar-fixed-bottom ">
    <div class="container">
    <div style = "text-align: center ;color:white;">
    <p>当前时间
    <script type="text/javascript">
        document.write(Date());
      </script>
      </p>
    </div>
</footer>
</body>
</html>