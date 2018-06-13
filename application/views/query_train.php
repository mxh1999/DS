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
  function check_cookie ()
  {
    var x = getSession().getAttribute("id");
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
  function show_train()
  {
    var A = document.createElement("p");
    A.innerHTML = "车次" + <?php echo $train_id; ?> + " 类型" + <?php echo $catalog; ?>;
    document.getElementById("train").appendChild(A);
    A = document.createElement("table");
    var B = document.createElement("tr");
    var C = document.createElement("th");
    C.innerHTML = "车站名";
    B.appendChild(C);
    C = document.createElement("th");
    C.innerHTML = "出发时间";
    B.appendChild(C);
    C = document.createElement("th");
    C.innerHTML = "到达时间";
    B.appendChild(C);
    C = document.createElement("th");
    C.innerHTML = "停留时间";
    B.appendChild(C);
    for (var x = 0; x < <?php echo $num_price; ?>; x++)
    {
      C = document.createElement("th");
      C.innerHTML = <?php echo $price[x]; ?> + "类票票价";
      B.appendChild(C);
    }
    A.appendChild(B);
    for (var i = 0; i < <?php echo $num_station; ?>; i++)
    {
      B = document.createElement("tr");
      C = document.createElement("tb");
      C.innerHTML = <?php echo $Station['name'][i]; ?>;
      B.appendChild(C);
      C = document.createElement("tb");
      C.innerHTML = <?php echo $Station['arr'][i]; ?>;
      B.appendChild(C);
      C = document.createElement("tb");
      C.innerHTML = <?php echo $Station['sta'][i]; ?>;
      B.appendChild(C);
      C = document.createElement("tb");
      C.innerHTML = <?php echo $Station['sto'][i]; ?>;
      B.appendChild(C);
      for (var j = 0; j < <?php echo $num_price ?>; j++)
      {
        C = document.createElement("tb");
        C.innerHTML = <?php echo $Price['num'][i][j]; ?>;
        B.appendChild(C);
      }
      A.document.getElementById(B);
    }
    document.getElementById("train").appendChild(A);
  }
</script>
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
        <ul class="nav navbar-nav">
            <li><a href="<?php echo This_URL ?>/Ticket">购票</a></li>
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
            <a href="<?php echo This_URL ?>/Register" class="btn btn-default">注册</a></li>
          </form>
        </ul>
        </li>
      </div>
  </div>
</nav>
<div id = "train">
  
</div>
<script type="text/javascript">
  check_cookie();
  show_train();
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