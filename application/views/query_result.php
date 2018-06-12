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
    var x = '<%=session("id")%>';
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
  function book_ticket_0(train_num, ticket_case)
  {
    var x;
    x = <?php echo $ans['val']['train_num'][0]; ?>;
    document.getElementById("book_id").value = x;
    x = <?php echo $ans['val']['train_num'][1]; ?>;
    document.getElementById("book_loc1").value = x;
    x = <?php echo $ans['val']['train_num'][4]; ?>;
    document.getElementById("book_loc2").value = x;
    x = <?php echo $ans['val']['train_num']['ticket_case']; ?>;
    document.getElementById("book_ticket_kind").value = x;
    x = <?php echo $ans['val']['train_num'][2]; ?>;
    document.getElementById("book_date").value = x;
    return true;
  }
  function book_ticket_1(train_num, ticket_case)
  {
    var x;
    x = <?php echo $ans['val']['train_num'][0]; ?>;
    document.getElementById("book_id").value = x;
    x = <?php echo $ans['val']['train_num'][1]; ?>;
    document.getElementById("book_loc1").value = x;
    x = <?php echo $ans['val']['train_num'][4]; ?>;
    document.getElementById("book_loc2").value = x;
    x = <?php echo $ans['val']['train_num']['ticket_case']; ?>;
    document.getElementById("book_ticket_kind").value = x;
    x = <?php echo $ans['val']['train_num'][2]; ?>;
    document.getElementById("book_date").value = x;
    return true;
  }
  function show_train()
  {
    var x = <?php echo $transnum; ?>;
    if (x === 0)
    {
      x = <?php echo $ans['num']; ?>;
      for (var i = 0; i < Number(x); i++)
      {
        var A;
        A = document.createElement("tr");
        var B;
        for (var j = 0; j < 7; j++)
        {
          B = document.createElement("td");
          B.innerHTML = <?php echo $ans['val'][j]; ?>;
          A.appendChild(B);
        }
        document.getElementById("book_train").appendChild(A);
        A = document.createElement("tr");
        for (var j = 7; <?php echo $ans['val'][j] != ''; ?>)
        {
          B = document.createElement("td");
          B.innerHTML = <?php echo $ans['val'][j]; ?>;
          A.appendChild(B);
          j++;
          B = document.createElement("td");
          B.innerHTML = "票价：" + <?php echo $ans['val'][j]; ?>;
          A.appendChild(B);
          j++;
          B = document.createElement("td");
          B.innerHTML = "余票：" + <?php echo $ans['val'][j]; ?>;
          j++;
          A.appendChild(B);
          B = document.createElement("td");
          var C = document.createElement("input");
          C.setAttribute("type","text");
          C.setAttribute("class","form-control");
          C.setAttribute("required", "required");
          C.setAttribute("name", "num");
          C.setAttribute("placeholder", "购买票数");
          B.appendChild(C);
          C = document.createElement("button");
          C.setAttribute("type", "submit");
          C.setAttribute("class", "btn btn-default");
          C.setAttribute("onclick", "book_ticket_0(" + i + "," + (j - 3) + ")");
          C.innerHTML = "购票";
          B.appendChild(C);
          A.appendChild(B);
          document.getElementById("book_train").appendChild(A);
          A = document.createElement("tr");
        }
      }
    }
    else
    {
      for (var i = 0; i < 2; i++)
      {
        var A;
        A = document.createElement("tr");
        var B;
        for (var j = 0; j < 7; j++)
        {
          B = document.createElement("td");
          B.innerHTML = <?php echo $ans1[i][j]; ?>;
          A.appendChild(B);
        }
        document.getElementById("book_train").appendChild(A);
        A = document.createElement("tr");
        for (var j = 7; <?php echo $ans1[i][j] != ''; ?>)
        {
          B = document.createElement("td");
          B.innerHTML = <?php echo $ans1[i][j]; ?>;
          A.appendChild(B);
          j++;
          B = document.createElement("td");
          B.innerHTML = "票价：" + <?php echo $ans1[i][j]; ?>;
          A.appendChild(B);
          j++;
          B = document.createElement("td");
          B.innerHTML = "余票：" + <?php echo $ans1[i][j]; ?>;
          j++;
          A.appendChild(B);
          B = document.createElement("td");
          var C = document.createElement("input");
          C.setAttribute("type","text");
          C.setAttribute("class","form-control");
          C.setAttribute("required", "required");
          C.setAttribute("name", "num");
          C.setAttribute("placeholder", "购买票数");
          B.appendChild(C);
          C = document.createElement("button");
          C.setAttribute("type", "submit");
          C.setAttribute("class", "btn btn-default");
          C.setAttribute("onclick", "book_ticket_1(" + i + "," + (j - 3) + ")");
          C.innerHTML = "购票";
          B.appendChild(C);
          A.appendChild(B);
          document.getElementById("book_train").appendChild(A);
          A = document.createElement("tr");
        }
      }
    }
  }
</script>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
   <div class="container-fluid">
    <div class="navbar-header">
        <ul class="nav navbar-nav">
        <li class="active"><a class="navbar-brand" href="index.php">火车票订票系统</a></li>
        </ul>
    </div>
    <div>
        <ul class="nav navbar-nav">
            <li><a href="index.php/Ticket">购票</a></li>
        </ul>
    </div>
      <div id = "qqq" class="navbar-right navbar-nav nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" name = "user_name" id = "user_name">
        </a>
        <ul class="dropdown-menu">
          <li><a href="index.php/Profile">profile</a></li>
          <li><a href="index.php/Logout">logout</a></li>
        </ul>
        </li>
      </div>
      <div class="navbar-right navbar-nav nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" name = "user_name" id = "un_login">
          登录
        </a>
        <ul class="dropdown-menu">
          <form action = "index.php/Login" method="post" row = "form">
          <li><input type = "text" class = "form-control" placeholder="账号" name = "username" required="required"></li>
          <li><input type = "password" class = "form-control" placeholder="密码" name = "password" required="required"></li>
          <li>
            <button type="submit" class="btn btn-default">登录</button>
            <a href="index.php/Register" class="btn btn-default">注册</a></li>
          </form>
        </ul>
        </li>
      </div>
  </div>
</nav>
<div>
  查询结果:
</div>
<form action="index.php/Ticket/book" method="post" row = "form">
  <input type = "hidden" class = "form-control" placeholder="车次" required="required" name = "id" id = "book_id">
  <input type = "hidden" class = "form-control" placeholder="出发地" required="required" name = "loc1" id = "book_loc1">
  <input type = "hidden" class = "form-control" placeholder="目的地" required="required" name = "loc2" id = "book_loc2">
  <input type = "hidden" class = "form-control" placeholder="时间" required="required" name = "date" id = "book_date">
  <input type = "hidden" class = "form-control" placeholder="类型" required="required" name = "catalog" id = "book_catalog">
  <input type = "hidden" class = "form-control" placeholder="车次" required="required" name = "ticket_kind" id = "book_ticket_kind">
  <table id = "book_ticket">
  </table>
</form>
<a href="index.php/Ticket" class="btn btn-default">
  重新查询
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