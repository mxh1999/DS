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
    for (var i = 0; i < 8; i++)
    {
      if (document.getElementById("catalog_" + i).value != '')
        ans = ans + document.getElementById("catalog_" + i).value;
    }
    document.getElementById("catalog").value = ans;
    alert(ans);
    return true;
  }
</script>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
   <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo This_URL ?>">火车票订票系统</a>
    </div>
    <div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo This_URL ?>/Ticket">购票</a></li>
        </ul>
    </div>
      <div id = "qqq" class="navbar-right navbar-nav nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" name = "user_name" id = "user_name">
        </a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo This_URL ?>/Profile">profile</a></li>
          <li><a href="<?php echo This_URL ?>/Logout">logout</a></li>
        </ul>
        </li>
      </div>
      <div class="navbar-right navbar-nav nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" name = "user_name" id = "un_login">
          登录
        </a>
        <ul class="dropdown-menu">
          <form action = "<?php echo This_URL ?>/Login" method="post" row = "form">
          <li><input type = "text" class = "form-control" placeholder="账号" name = "id" required="required"></li>
          <li><input type = "password" class = "form-control" placeholder="密码" name = "psword" required="required"></li>
          <li>
            <button type="submit" class="btn btn-default">登录</button>
            <a href="<?php echo This_URL ?>/Register" class="btn btn-default">注册</a>
          </li>
          </form>
        </ul>
        </li>
      </div>
  </div>
</nav>
<script type="text/javascript">
  check_cookie();
</script>
<div class="col-md-offset-4">
<div class="form-inline">
  <form action="<?php echo This_URL ?>/Ticket/query" method="get" row = "form" onsubmit = "get_catalog()">
    <input type = "text" class = "form-control" placeholder="出发地" required="required" name = "loc1">
    <input type = "text" class = "form-control" placeholder="目的地" required="required" name = "loc2">
    <br>
    <input type = "text" class = "form-control" placeholder="时间" required="required" name = "date">
    <input type = "hidden" class = "form-control" placeholder="时间" required="required" name = "catalog" id = "catalog">
    <input type = "checkbox" id = "catalog_0" value="C">C
    <input type = "checkbox" id = "catalog_1" value="D">D
    <input type = "checkbox" id = "catalog_2" value="G">G
    <input type = "checkbox" id = "catalog_3" value="Z">Z
    <input type = "checkbox" id = "catalog_4" value="T">T
    <input type = "checkbox" id = "catalog_5" value="K">K
    <input type = "checkbox" id = "catalog_6" value="L">L
    <input type = "checkbox" id = "catalog_7" value="O">O
    <input type = "hidden" class = "form-control" required="required" name = "transnum" id = "transnum">
    <div class="radio">
    <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" onclick="transnum_1()">有中转站
    </label>
    <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onclick="transnum_0()">无中转站
    </label>
    </div>
  <button type="submit" class="btn btn-default">
    提交
  </button>
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
  </div>
</footer>
</body>
</html>