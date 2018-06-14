<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <title>购票</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
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
  function transnum_1()
  {
    document.getElementById("transnum").value = 1;
  }
  function transnum_0()
  {
    document.getElementById("transnum").value = 0;
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
<div class="col-md-4 col-md-offset-4" style="background-color: white; background-color: rgba(248,248,255, 0.2);padding-top: 50px; border-width: 0px; top: 50px; height: 350px; text-align: center;">
  <form action="<?php echo This_URL ?>/Ticket/query" method="get" row = "form" onsubmit = "get_catalog()">
    <div >
    <p class="col-md-4" style="color: white;">出发地:</p>
    <div class="col-md-6">
    <input type = "text" placeholder="出发地" required="required" name = "loc1">
    </div>
    <br>
    <br>
    <br>
      <p class="col-md-4" style="color: white;">目的地:</p>
    <div class="col-md-6">
    <input type = "text" required="required" name = "loc2">
    </div>
    <br>
    <br>
    <br>
    <p class="col-md-4" style="color: white;">日期:</p>
    <div class="col-md-6">
    <input type = "text" placeholder="时间" required="required" name = "date">
    </div>
    <input type = "hidden" class = "form-control" placeholder="时间" required="required" name = "catalog" id = "catalog">
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
  <button type="submit" class="btn btn-default">
    提交
  </button>
  </div>
  </form>
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
  </div>
</footer>
</body>
</html>