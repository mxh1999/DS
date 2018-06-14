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
   <link href="https://cdn.bootcss.com/bootstrap-table/1.11.1/bootstrap-table.min.css" rel="stylesheet">
   <script src="https://cdn.bootcss.com/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
   <script src="https://cdn.bootcss.com/bootstrap-table/1.11.1/locale/bootstrap-table-zh-CN.min.js"></script>
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
  function refund_ticket(train_num, ticket_case)
  {
    var x;
    var y0 = new Array();
    y0[0]=<?php echo $straight['num']?>;
    y0[1]=new Array();
    <?php $j=0;
  foreach ($straight['ticket'] as $value) {
    echo "y0[1][$j]=new Array();";
      echo "y0[1][$j][0]=\"",$value['train_id'],"\";";
      echo "y0[1][$j][1]=\"",$value['loc1'],"\";";
      echo "y0[1][$j][2]=\"",$value['date_from'],"\";";
      echo "y0[1][$j][3]=\"",$value['time_from'],"\";";
      echo "y0[1][$j][4]=\"",$value['loc2'],"\";";
      echo "y0[1][$j][5]=\"",$value['date_to'],"\";";
      echo "y0[1][$j][6]=\"",$value['time_to'],"\";";
      echo "y0[1][$j][7]=",$value['num_price'],";";
      echo "y0[1][$j][8]=new Array();";
      for ($i=0;$i<$value['num_price'];$i++)
      {
        echo "y0[1][$j][8][$i]=new Array();";
        echo "y0[1][$j][8][$i][0]=\"",$value['Price'][$i]['kind'],"\";";
        echo "y0[1][$j][8][$i][1]=",$value['Price'][$i]['num_left'],";";
        echo "y0[1][$j][8][$i][2]=\"",$value['Price'][$i]['num_price'],"\";";
      }
    $j++;
    
    } ?>
    x = y0[1][train_num][0];
    document.getElementById("refund_id").value = x;
    x = y0[1][train_num][1];
    document.getElementById("refund_loc1").value = x;
    x = y0[1][train_num][4];
    document.getElementById("refund_loc2").value = x;
    x = y0[1][train_num][8][ticket_case][0];
    document.getElementById("refund_ticket_kind").value = x;
    x = y0[1][train_num][2];
    document.getElementById("refund_date").value = x;
    return true;
  }
  function show_train()
  {
    var x = "<?php echo $ans['num'] ?>";
    var y0 = new Array();
    y0[0]=<?php echo $straight['num']?>;
    y0[1]=new Array();
    <?php $j=0;
  foreach ($straight['ticket'] as $value) {
    echo "y0[1][$j]=new Array();";
      echo "y0[1][$j][0]=\"",$value['train_id'],"\";";
      echo "y0[1][$j][1]=\"",$value['loc1'],"\";";
      echo "y0[1][$j][2]=\"",$value['date_from'],"\";";
      echo "y0[1][$j][3]=\"",$value['time_from'],"\";";
      echo "y0[1][$j][4]=\"",$value['loc2'],"\";";
      echo "y0[1][$j][5]=\"",$value['date_to'],"\";";
      echo "y0[1][$j][6]=\"",$value['time_to'],"\";";
      echo "y0[1][$j][7]=",$value['num_price'],";";
      echo "y0[1][$j][8]=new Array();";
      for ($i=0;$i<$value['num_price'];$i++)
      {
        echo "y0[1][$j][8][$i]=new Array();";
        echo "y0[1][$j][8][$i][0]=\"",$value['Price'][$i]['kind'],"\";";
        echo "y0[1][$j][8][$i][1]=",$value['Price'][$i]['num_left'],";";
        echo "y0[1][$j][8][$i][2]=\"",$value['Price'][$i]['num_price'],"\";";
      }
    $j++;
    
    } ?>
    for (var i = 0; i < Number(x); i++)
    {
      var A = document.createElement("tr");
      var B = document.createElement("td");
      B.innerHTML = y0[1][i][0];
      A.appendChild(B);
      B = document.createElement("td");
      B.innerHTML = y0[1][i][1];
      A.appendChild(B);
      B = document.createElement("td");
      B.innerHTML = y0[1][i][2];
      A.appendChild(B);
      B = document.createElement("td");
      B.innerHTML = y0[1][i][3];
      A.appendChild(B);
      B = document.createElement("td");
      B.innerHTML = y0[1][i][4];
      A.appendChild(B);
      B = document.createElement("td");
      B.innerHTML = y0[1][i][5];
      A.appendChild(B);
      B = document.createElement("td");
      B.innerHTML = y0[1][i][6];
      A.appendChild(B);
      document.getElementById("book_train").appendChild(A);
      for (var j = 0; j < y0[1][i][7]; j++)
      {
        A = document.createElement("tr");
        B = document.createElement("td");
        B.innerHTML = y0[1][i][8][0];
        A.appendChild(B);
        B = document.createElement("td");
        B.innerHTML = y0[1][i][8][1];
        A.appendChild(B);
        B = document.createElement("td");
        B.innerHTML = y0[1][i][8][2];
        A.appendChild(B);
        B = document.createElement("td");
        var C = document.createElement("input");
        C.setAttribute("type","text");
        C.setAttribute("class","form-control");
        C.setAttribute("required", "required");
        C.setAttribute("name", "num");
        C.setAttribute("placeholder", "购买票数");
        B.appendChild(C);
        A.appendChild(B);
        B = document.createElement("td");
        C = document.createElement("button");
        C.setAttribute("type", "submit");
        C.setAttribute("class", "btn btn-default");
        C.setAttribute("onclick", "book_ticket(" + i + ")");
        C.innerHTML = "购票";
        B.appendChild(C);
        A.appendChild(B);
        document.getElementById("book_train").appendChild(A);
        A = document.createElement("tr");
      }
    }
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
<div>
  查询结果:
</div>
<form action="<?php echo This_URL ?>/Ticket/Refund" method="post" row = "form">
  <input type = "hidden" class = "form-control" placeholder="车次" required="required" name = "id" id = "refund_id">
  <input type = "hidden" class = "form-control" placeholder="出发地" required="required" name = "loc1" id = "refund_loc1">
  <input type = "hidden" class = "form-control" placeholder="目的地" required="required" name = "loc2" id = "refund_loc2">
  <input type = "hidden" class = "form-control" placeholder="时间" required="required" name = "date" id = "refund_date">
  <input type = "hidden" class = "form-control" placeholder="类型" required="required" name = "catalog" id = "refund_catalog">
  <input type = "hidden" class = "form-control" placeholder="车次" required="required" name = "ticket_kind" id = "refund_ticket_kind">
  <table id = "refund_ticket" class="table">
  </table>
</form>
<a href="<?php echo This_URL ?>/Profile" class="btn btn-default">
  返回
</a>
<script type="text/javascript">
  check_cookie();
  show_train();
</script>
<footer class="footer navbar-fixed-bottom">
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