<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"> 
   <title>管理员</title>
   <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
   <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
   <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type="text/javascript">
    var station_num = 0;
    function check_cookie ()
    {
      var x = '<%=session("id")%>';
      if (x != '')
      {
        document.getElementById("user_name").innerHTML = x;
        var A = document.createElement('b');
        A.setAttribute("class","caret");
        document.getElementById("user_name").appendChild(A);
        document.getElementById("user_name").style.display = "visible";
      }
      else
      {
        document.getElementById("user_name").style.display = "none";
      }
    }
    function get_id()
    {
      document.getElementById("add_admin").style.display = "none";
      document.getElementById("open_train").style.display = "none";
      document.getElementById("add_train").style.display = "none";
      document.getElementById("delete_train").style.display = "none";
      document.getElementById("change_train").style.display = "none";
    }
    function check_id()
    {
      var x = document.forms["users"]["name"].value;
      if(!(/^[A-Za-z0-9\_\-]+$/gi).test(x))
      {
        alert("username error");
        return false;
      }
    }
    function check_train()
    {
      var x = document.forms["users"]["name"].value;
      if(!(/^[\d]+$/gi).test(x))
      {
        alert("username error");
        return false;
      }
    }
    function show_add_train()
    {
      document.getElementById("add_admin").style.display = "none";
      document.getElementById("open_train").style.display = "none";
      document.getElementById("add_train").style.display = "inline";
      document.getElementById("delete_train").style.display = "none";
      document.getElementById("change_train").style.display = "none";
      document.getElementById("add_train_ticket").style.display = "none";
      station_num = 0;
      if($(window).height()==$(document).height())
      {
        $("#time_footer").addClass("navbar-fixed-bottom");
      }
      else
      {
        $("#time_footer").removeClass(" navbar-fixed-bottom");
      }
    }
    function show_open_train()
    {
      document.getElementById("add_admin").style.display = "none";
      document.getElementById("add_train").style.display = "none";
      document.getElementById("open_train").style.display = "inline";
      document.getElementById("delete_train").style.display = "none";
      document.getElementById("change_train").style.display = "none";
      station_num = 0;
      if($(window).height()==$(document).height())
      {
        $("#time_footer").addClass("navbar-fixed-bottom");
      }
      else
      {
        $("#time_footer").removeClass(" navbar-fixed-bottom");
      }
    }
    function show_add_admin()
    {
      document.getElementById("open_train").style.display = "none";
      document.getElementById("add_train").style.display = "none";
      document.getElementById("add_admin").style.display = "inline";
      document.getElementById("delete_train").style.display = "none";
      document.getElementById("change_train").style.display = "none";
      station_num = 0;
      if($(window).height()==$(document).height())
      {
        $("#time_footer").addClass("navbar-fixed-bottom");
      }
      else
      {
        $("#time_footer").removeClass(" navbar-fixed-bottom");
      }
    }
    function show_delete_train()
    {
      document.getElementById("open_train").style.display = "none";
      document.getElementById("add_train").style.display = "none";
      document.getElementById("add_admin").style.display = "none";
      document.getElementById("delete_train").style.display = "inline";
      document.getElementById("change_train").style.display = "none";
      station_num = 0;
      if($(window).height()==$(document).height())
      {
        $("#time_footer").addClass("navbar-fixed-bottom");
      }
      else
      {
        $("#time_footer").removeClass(" navbar-fixed-bottom");
      }
    }
    function show_change_train()
    {
      document.getElementById("open_train").style.display = "none";
      document.getElementById("add_train").style.display = "none";
      document.getElementById("add_admin").style.display = "none";
      document.getElementById("delete_train").style.display = "none";
      document.getElementById("change_train").style.display = "inline";
      document.getElementById("change_train_ticket").style.display = "none";
      station_num = 0;
      if($(window).height()==$(document).height())
      {
        $("#time_footer").addClass("navbar-fixed-bottom");
      }
      else
      {
        $("#time_footer").removeClass(" navbar-fixed-bottom");
      }
    }
    function add_train_add_station()
    {
      var x = $("input[name=add_ticket_num]").val();
      var A = document.createElement("input");
      A.setAttribute("type","text");
      A.setAttribute("class","form-control");
      A.setAttribute("required", "required");
      A.setAttribute("name","add_station_name");
      A.setAttribute("placeholder", "车站名" + station_num);
      document.getElementById("add_train_station_form").appendChild(A);
      A = document.createElement("input");
      A.setAttribute("type","text");
      A.setAttribute("class","form-control");
      A.setAttribute("required", "required");
      A.setAttribute("name","add_station_arrive_time_" + station_num);
      A.setAttribute("placeholder", "车站" + station_num + "到达时间");
      document.getElementById("add_train_station_form").appendChild(A);
      A = document.createElement("input");
      A.setAttribute("type","text");
      A.setAttribute("class","form-control");
      A.setAttribute("required", "required");
      A.setAttribute("name","add_station_start_time_" + station_num);
      A.setAttribute("placeholder", "车站" + station_num + "出发时间");
      document.getElementById("add_train_station_form").appendChild(A);
      A = document.createElement("input");
      A.setAttribute("type","text");
      A.setAttribute("class","form-control");
      A.setAttribute("required", "required");
      A.setAttribute("name","add_station_stopover_time_" + station_num);
      A.setAttribute("placeholder", "车站" + station_num + "停留时间");
      document.getElementById("add_train_station_form").appendChild(A);
      A = document.createElement("br");
      document.getElementById("add_train_station_form").appendChild(A);
      for (var j = 0; j < Number(x); j++)
      {
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","add_station_price_" + station_num);
        A.setAttribute("placeholder", "车票" + j + "票价");
        document.getElementById("add_train_station_form").appendChild(A);
      }
      A = document.createElement("br");
      document.getElementById("add_train_station_form").appendChild(A);
      station_num++;
      document.getElementById("add_station_num").val = station_num;
      if($(window).height()==$(document).height())
      {
        $("#time_footer").addClass("navbar-fixed-bottom");
      }
      else
      {
        $("#time_footer").removeClass(" navbar-fixed-bottom");
      }
    }
    function add_train_ticket_1(elem)
    {
      document.getElementById("add_train_ticket").style.display = "inline";
      var x = $("input[name=add_ticket_num]").val();
      var y = $("input[name=add_station_num]").val();
      station_num = Number(y);
      var A;
      for (var i = 0; i < Number(x); i++)
      {
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","add_train_ticket_" + i);
        A.setAttribute("placeholder", "车票名" + i);
        document.getElementById("add_train_ticket_form").appendChild(A);
      }
      A = document.createElement("button");
      A.setAttribute ("class", "btn btn-default");
      A.setAttribute ("type", "button");
      A.setAttribute ("onclick", "add_train_add_station()");
      A.innerHTML = "增加车站";
      document.getElementById("add_train_ticket_form").appendChild(A);
      for (var i = 0; i < Number(y); i++)
      {
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","add_station_name");
        A.setAttribute("placeholder", "车站名" + i);
        document.getElementById("add_train_station_form").appendChild(A);
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","add_station_arrive_time_" + i);
        A.setAttribute("placeholder", "车站" + i + "到达时间");
        document.getElementById("add_train_station_form").appendChild(A);
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","add_station_start_time_" + i);
        A.setAttribute("placeholder", "车站" + i + "出发时间");
        document.getElementById("add_train_station_form").appendChild(A);
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","add_station_stopover_time_" + i);
        A.setAttribute("placeholder", "车站" + i + "停留时间");
        document.getElementById("add_train_station_form").appendChild(A);
        A = document.createElement("br");
        document.getElementById("add_train_station_form").appendChild(A);
        for (var j = 0; j < Number(x); j++)
        {
          A = document.createElement("input");
          A.setAttribute("type","text");
          A.setAttribute("class","form-control");
          A.setAttribute("required", "required");
          A.setAttribute("name","add_station_price_" + i);
          A.setAttribute("placeholder", "车票" + j + "票价");
          document.getElementById("add_train_station_form").appendChild(A);
        }
        A = document.createElement("br");
        document.getElementById("add_train_station_form").appendChild(A);
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
    function change_train_add_station()
    {
      var x = $("input[name=change_ticket_num]").val();
      var A = document.createElement("input");
      A.setAttribute("type","text");
      A.setAttribute("class","form-control");
      A.setAttribute("required", "required");
      A.setAttribute("name","change_station_name");
      A.setAttribute("placeholder", "车站名" + station_num);
      document.getElementById("change_train_station_form").appendChild(A);
      A = document.createElement("input");
      A.setAttribute("type","text");
      A.setAttribute("class","form-control");
      A.setAttribute("required", "required");
      A.setAttribute("name","change_station_arrive_time_" + station_num);
      A.setAttribute("placeholder", "车站" + station_num + "到达时间");
      document.getElementById("change_train_station_form").appendChild(A);
      A = document.createElement("input");
      A.setAttribute("type","text");
      A.setAttribute("class","form-control");
      A.setAttribute("required", "required");
      A.setAttribute("name","change_station_start_time_" + station_num);
      A.setAttribute("placeholder", "车站" + station_num + "出发时间");
      document.getElementById("change_train_station_form").appendChild(A);
      A = document.createElement("input");
      A.setAttribute("type","text");
      A.setAttribute("class","form-control");
      A.setAttribute("required", "required");
      A.setAttribute("name","change_station_stopover_time_" + station_num);
      A.setAttribute("placeholder", "车站" + station_num + "停留时间");
      document.getElementById("change_train_station_form").appendChild(A);
      A = document.createElement("br");
      document.getElementById("change_train_station_form").appendChild(A);
      for (var j = 0; j < Number(x); j++)
      {
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","change_station_price_" + station_num);
        A.setAttribute("placeholder", "车票" + j + "票价");
        document.getElementById("change_train_station_form").appendChild(A);
      }
      A = document.createElement("br");
      document.getElementById("change_train_station_form").appendChild(A);
      station_num++;
      document.getElementById("change_station_num").val = station_num;
      if($(window).height()==$(document).height())
      {
        $("#time_footer").addClass("navbar-fixed-bottom");
      }
      else
      {
        $("#time_footer").removeClass(" navbar-fixed-bottom");
      }
    }
    function change_train_ticket_1(elem)
    {
      document.getElementById("change_train_ticket").style.display = "inline";
      var x = $("input[name=change_ticket_num]").val();
      var y = $("input[name=change_station_num]").val();
      station_num = Number(y);
      var A;
      for (var i = 0; i < Number(x); i++)
      {
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","change_train_ticket_" + i);
        A.setAttribute("placeholder", "车票名" + i);
        document.getElementById("change_train_ticket_form").appendChild(A);
      }
      A = document.createElement("button");
      A.setAttribute ("class", "btn btn-default");
      A.setAttribute ("type", "button");
      A.setAttribute ("onclick", "change_train_add_station()");
      A.innerHTML = "增加车站";
      document.getElementById("change_train_ticket_form").appendChild(A);
      for (var i = 0; i < Number(y); i++)
      {
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","change_station_name");
        A.setAttribute("placeholder", "车站名" + i);
        document.getElementById("change_train_station_form").appendChild(A);
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","change_station_arrive_time_" + i);
        A.setAttribute("placeholder", "车站" + i + "到达时间");
        document.getElementById("change_train_station_form").appendChild(A);
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","change_station_start_time_" + i);
        A.setAttribute("placeholder", "车站" + i + "出发时间");
        document.getElementById("change_train_station_form").appendChild(A);
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","change_station_stopover_time_" + i);
        A.setAttribute("placeholder", "车站" + i + "停留时间");
        document.getElementById("change_train_station_form").appendChild(A);
        A = document.createElement("br");
        document.getElementById("change_train_station_form").appendChild(A);
        for (var j = 0; j < Number(x); j++)
        {
          A = document.createElement("input");
          A.setAttribute("type","text");
          A.setAttribute("class","form-control");
          A.setAttribute("required", "required");
          A.setAttribute("name","change_station_price_" + i);
          A.setAttribute("placeholder", "车票" + j + "票价");
          document.getElementById("change_train_station_form").appendChild(A);
        }
        A = document.createElement("br");
        document.getElementById("change_train_station_form").appendChild(A);
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
   <script type="text/javascript">
     function add_train_ticket_2()
     {
      document.getElementById("add_train_station_form").innerHTML = "";
      document.getElementById("add_train_ticket_form").innerHTML = "";
      document.getElementById("add_train_ticket").style.display = "none";
     }
     function change_train_ticket_2()
     {
      document.getElementById("change_train_station_form").innerHTML = "";
      document.getElementById("change_train_ticket_form").innerHTML = "";
      document.getElementById("change_train_ticket").style.display = "none";
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
      <div id = "qqq" class="navbar-right navbar-nav nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" name = "user_name" id = "user_name">
        </a>
        <ul class="dropdown-menu">
          <li><a href="user.php">用户系统</a></li>
          <li><a href="admin.php">管理</a></li>
        </ul>
        </li>
      </div>
  </div>
</nav>
<div class="col-md-offset-2">
<div class="radio">
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" onclick="show_add_train()">添加车次
  </label>
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onclick="show_open_train()">公开车次
  </label>
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios5" value="option5" onclick="show_change_train()">修改车次
  </label>
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" onclick="show_delete_train()">删除车次
  </label>
  <label class = "radio-inline">
    <input type="radio" name="optionsRadios" id="optionsRadios4" value="option4" onclick="show_add_admin()">增加管理员
  </label>
</div>
</div>
<div id = "add_admin">
<div class="col-md-offset-2">
<form action="change_user.php" method="post" row = "form" name = "users">
<div class="form-inline">
          <input type = "text" class = "form-control" placeholder="姓名" required="required" name = "name">
          <button type="submit" class="btn btn-default">
            提交
          </button>
</div>
</form>
</div>
</div>
<div name = "add_train" id = "add_train">
<form action="public_train.php" method="post" row = "form"  name = "users">
<div class="form-inline">
<div class="col-md-offset-2">
  <input type = "text" class = "form-control" placeholder="车号" required="required" name = "train_id">
  <input type = "text" class = "form-control" placeholder="车名" required="required" name = "train_name">
  <input type = "text" class = "form-control" placeholder="类型" required="required" name = "train_style">
  <input type = "text" class = "form-control" placeholder="车站数目" required="required" name = "add_station_num" id = "add_station_num">
  <input type = "text" class = "form-control" placeholder="车票种数" required="required" name = "add_ticket_num">
  <button class="btn btn-default" type = "button" onclick="add_train_ticket_1(this);">
            输入车次及车票信息
  </button>
</div>
</div>
<div class="table table-hover" name="add_train_ticket" id = "add_train_ticket">
  <div id = "add_train_ticket_form" class="form-inline col-md-offset-2" name = "add_train_ticket_form">
    
  </div>
  <div id = "add_train_station_form" class="form-inline col-md-offset-2" name = "add_train_station_form">
    
  </div>
  <button type="submit" class="btn btn-default col-md-offset-5">
  提交车次及车票信息
  </button>
  <button type="reset" class="btn btn-default" onclick="add_train_ticket_2();">
  重置
  </button>
</div>
</form>
</div>
<div name = "change_train" id = "change_train">
<form action="public_train.php" method="post" row = "form"  name = "change" class="row">
<div class="col-md-offset-2">
<div class="form-inline">
  <input type = "text" class = "form-control col-lg-2" placeholder="车号" required="required" name = "train_id" id = "train_id">
  <input type = "text" class = "form-control" placeholder="车名" required="required" name = "train_name" id = "train_name">
  <input type = "text" class = "form-control" placeholder="类型" required="required" name = "train_style" id = "train_style">
  <input type = "text" class = "form-control" placeholder="车站数目" required="required" name = "change_station_num" id = "change_station_num">
  <input type = "text" class = "form-control" placeholder="车票种数" required="required"  name = "change_ticket_num" id = "change_ticket_num">
  <button class="btn btn-default" type = "button" onclick="change_train_ticket_1(this);">
            输入车次及车票信息
  </button>
</div>
</div>
<div class="table table-hover" name="change_train_ticket" id = "change_train_ticket">
  <div id = "change_train_ticket_form" class="form-inline col-md-offset-2" name = "change_train_ticket_form">
    
  </div>
  <div id = "change_train_station_form" class="form-inline col-md-offset-2" name = "change_train_station_form">
    
  </div>
  <button type="submit" class="btn btn-default col-md-offset-5">
  提交车次及车票信息
  </button>
  <button type="reset" class="btn btn-default" onclick="change_train_ticket_2();">
  重置
  </button>
</div>
</form>
</div>
<div id = "open_train">
<div class="col-md-offset-2">
<form action="public_train.php" method="post" row = "form"  name = "users">
<div class="form-inline">
          <input type = "text" class = "form-control" placeholder="车次编号" required="required" name = "train_id">
          <button type="submit" class="btn btn-default">
            公开
          </button>
</div>
</form>
</div>
</div>
<div id = "delete_train">
<div class="col-md-offset-2">
<form action="delete_train.php" method="post" row = "form" name = "users">
<div class="form-inline">
          <input type = "text" class = "form-control" placeholder="车次编号" required="required" name = "train_id">
          <button type="submit" class="btn btn-default">
            删除
          </button>
</div>
</form>
</div>
</div>
<script type="text/javascript">
  get_id();
  check_cookie();
</script>
<footer name = "time_footer" id = "time_footer" class="navbar-fixed-bottom">
  <br>
    <div class="container">
    <div style = "text-align: center">
    <p>当前时间
    <script type="text/javascript">
        document.write(Date());
      </script>
      </p>
    </div>
</footer>
</body>
</html>