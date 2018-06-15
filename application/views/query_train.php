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
  function show_train()
  {
    var y0 = new Array();
    y0[0] = <?php echo $train_id?>;
    y0[1] = <?php echo $catalog?>;
    y0[2] =<?php echo $num_station?>;
    y0[3] = <?php echo $num_price?>;
    y0[4] = new Array();
    y0[5] = new Array();
    <? php
      $j= 0;
      foreach ($Price as $value) {
       echo "y0[4][$j][0]=\"",$value['name'],"\";";
       echo "y0[4][$j][1] = new Array();";
       for ($i = 0; $i < $num_preice; $i++)
       echo "y0[4][$j][1][$i]=\"",$value['name']['num'],"\";";
      }
      $j++;
    ?>
    <? php
      $j= 0;
      foreach ($Station as $value) {
       echo "y0[5][$j][0]=\"",$value['name'],"\";";
       echo "y0[5][$j][1]=\"",$value['arr'],"\";";
       echo "y0[5][$j][2]=\"",$value['sta'],"\";";
       echo "y0[5][$j][3]=\"",$value['sto'],"\";";
      }
      $j++;
    ?>
    var A = document.createElement("p");
    A.innerHTML = "车次:" + y0[0] + " 类型:" + y0[1];
    document.getElementById("train").appendChild(A);
    A = document.createElement("table");
    A.setAttribute("class", "table");
    var D = document.createElement("thead");
    A.appendChild(D);
    D = document.createElement("tbody");
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
    for (var x = 0; x < y0[3]; x++)
    {
      C = document.createElement("th");
      C.innerHTML = y0[4][x][0] + "类票票价";
      B.appendChild(C);
    }
    D.appendChild(B);
    for (var i = 0; i < y0[2]; i++)
    {
      B = document.createElement("tr");
      C = document.createElement("td");
      C.innerHTML = y0[5][i][0];
      B.appendChild(C);
      C = document.createElement("td");
      C.innerHTML = y0[5][i][1];
      B.appendChild(C);
      C = document.createElement("td");
      C.innerHTML = y0[5][i][2];
      B.appendChild(C);
      C = document.createElement("td");
      C.innerHTML = y0[5][i][3];
      B.appendChild(C);
      for (var j = 0; j < y0[3]; j++)
      {
        C = document.createElement("td");
        C.innerHTML = y0[4][i][1][j];
        B.appendChild(C);
      }
      D.appendChild(B);
    }
    A.appendChild(D);
    document.getElementById("train").appendChild(A);
    if($(window).height()==$(document).height())
    {
      $("#time_footer").addClass("navbar-fixed-bottom");
    }
    else
    {
      $("#time_footer").removeClass(" navbar-fixed-bottom");
    }
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
<div id = "train"  class="col-md-8 col-md-offset-2"style="background-color: rgba(248,248,255,0.3);padding: 15px; padding-top: 30px; height: 500px; overflow-y: auto;">
  
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