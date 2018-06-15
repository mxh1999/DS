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
    function get_id()
    {
      document.getElementById("add_admin").style.display = "none";
      document.getElementById("open_train").style.display = "none";
      document.getElementById("add_train").style.display = "none";
      document.getElementById("delete_train").style.display = "none";
      document.getElementById("change_train").style.display = "none";
      document.getElementById("check_train").style.display = "none";
    }
    function show_add_train()
    {
      document.getElementById("add_admin").style.display = "none";
      document.getElementById("open_train").style.display = "none";
      document.getElementById("add_train").style.display = "inline";
      document.getElementById("delete_train").style.display = "none";
      document.getElementById("change_train").style.display = "none";
      document.getElementById("add_train_ticket").style.display = "none";
      document.getElementById("check_train").style.display = "none";
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
      document.getElementById("check_train").style.display = "none";
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
      document.getElementById("check_train").style.display = "none";
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
      document.getElementById("check_train").style.display = "none";
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
      document.getElementById("check_train").style.display = "none";
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
      var x = $("input[id=add_num_ticket]").val();
      var A = document.createElement("input");
      A.setAttribute("type","text");
      A.setAttribute("class","form-control");
      A.setAttribute("required", "required");
      A.setAttribute("name","name_s[" + station_num + "]");
      A.setAttribute("placeholder", "车站名" + station_num);
      document.getElementById("add_train_station_form").appendChild(A);
      A = document.createElement("input");
      A.setAttribute("type","text");
      A.setAttribute("class","form-control");
      A.setAttribute("required", "required");
      A.setAttribute("name","time_arrive[" + station_num + "]");
      A.setAttribute("placeholder", "车站" + station_num + "到达时间");
      document.getElementById("add_train_station_form").appendChild(A);
      A = document.createElement("input");
      A.setAttribute("type","text");
      A.setAttribute("class","form-control");
      A.setAttribute("required", "required");
      A.setAttribute("name","time_start[" + station_num + "]");
      A.setAttribute("placeholder", "车站" + station_num + "出发时间");
      document.getElementById("add_train_station_form").appendChild(A);
      A = document.createElement("input");
      A.setAttribute("type","text");
      A.setAttribute("class","form-control");
      A.setAttribute("required", "required");
      A.setAttribute("name","time_stopover[" + station_num + "]");
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
        A.setAttribute("name","price[" + station_num + "][" + j + "]");
        A.setAttribute("placeholder", "车票" + j + "票价");
        document.getElementById("add_train_station_form").appendChild(A);
      }
      A = document.createElement("br");
      document.getElementById("add_train_station_form").appendChild(A);
      station_num++;
      document.getElementById("add_num_station").val = station_num;
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
      var x = $("input[id=add_num_ticket]").val();
      var y = $("input[id=add_num_station]").val();
      station_num = Number(y);
      var A;
      for (var i = 0; i < Number(x); i++)
      {
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","name_price[" + i + "]");
        A.setAttribute("placeholder", "第" + i + "种车票名");
        document.getElementById("add_train_ticket_form").appendChild(A);
      }
      for (var i = 0; i < Number(y); i++)
      {
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","name_s[" + i + "]");
        A.setAttribute("placeholder", "车站名" + i);
        document.getElementById("add_train_station_form").appendChild(A);
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","time_arrive[" + i + "]");
        A.setAttribute("placeholder", "车站" + i + "到达时间");
        document.getElementById("add_train_station_form").appendChild(A);
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","time_start[" + i + "]");
        A.setAttribute("placeholder", "车站" + i + "出发时间");
        document.getElementById("add_train_station_form").appendChild(A);
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","time_stopover[" + i + "]");
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
          A.setAttribute("name","price[" + i + "][" + j + "]");
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
      var x = $("input[id=change_num_ticket]").val();
      var A = document.createElement("input");
      A.setAttribute("type","text");
      A.setAttribute("class","form-control");
      A.setAttribute("required", "required");
      A.setAttribute("name","name_s[" + station_num + "]");
      A.setAttribute("placeholder", "车站名" + station_num);
      document.getElementById("change_train_station_form").appendChild(A);
      A = document.createElement("input");
      A.setAttribute("type","text");
      A.setAttribute("class","form-control");
      A.setAttribute("required", "required");
      A.setAttribute("name","time_arrive[" + station_num + "]");
      A.setAttribute("placeholder", "车站" + station_num + "到达时间");
      document.getElementById("change_train_station_form").appendChild(A);
      A = document.createElement("input");
      A.setAttribute("type","text");
      A.setAttribute("class","form-control");
      A.setAttribute("required", "required");
      A.setAttribute("name","time_start[" + station_num + "]");
      A.setAttribute("placeholder", "车站" + station_num + "出发时间");
      document.getElementById("change_train_station_form").appendChild(A);
      A = document.createElement("input");
      A.setAttribute("type","text");
      A.setAttribute("class","form-control");
      A.setAttribute("required", "required");
      A.setAttribute("name","time_stopover[" + station_num + "]");
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
        A.setAttribute("name","price[" + station_num + "][" + j + "]");
        A.setAttribute("placeholder", "车票" + j + "票价");
        document.getElementById("change_train_station_form").appendChild(A);
      }
      A = document.createElement("br");
      document.getElementById("change_train_station_form").appendChild(A);
      station_num++;
      document.getElementById("change_num_station").val = station_num;
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
      var x = $("input[id=change_num_ticket]").val();
      var y = $("input[id=change_num_station]").val();
      station_num = Number(y);
      var A;
      for (var i = 0; i < Number(x); i++)
      {
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","name_price[" + i + "]");
        A.setAttribute("placeholder", "车票名" + i);
        document.getElementById("change_train_ticket_form").appendChild(A);
      }
      for (var i = 0; i < Number(y); i++)
      {
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","name_s[" + i + "]");
        A.setAttribute("placeholder", "车站名" + i);
        document.getElementById("change_train_station_form").appendChild(A);
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","time_arrive[" + i + "]");
        A.setAttribute("placeholder", "车站" + i + "到达时间");
        document.getElementById("change_train_station_form").appendChild(A);
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","time_start[" + i + "]");
        A.setAttribute("placeholder", "车站" + i + "出发时间");
        document.getElementById("change_train_station_form").appendChild(A);
        A = document.createElement("input");
        A.setAttribute("type","text");
        A.setAttribute("class","form-control");
        A.setAttribute("required", "required");
        A.setAttribute("name","time_stopover[" + i + "]");
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
          A.setAttribute("name","price[" + i + "][" + j + "]");
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
    function add_train_test()
    {
      var x = document.getElementById("add_num_station").val;
      document.getElementById("add_time_arrive_1").val = "--:--";
      document.getElementById("add_time_start_" + x).val = "--:--";
      return true;
    }
    function change_train_test()
    {
      var x = document.getElementById("change_num_station").val;
      document.getElementById("change_time_arrive_1").val = "--:--";
      document.getElementById("change_time_start_" + x).val = "--:--";
      return true;
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
     function show_check_train()
     {
      document.getElementById("open_train").style.display = "none";
      document.getElementById("add_train").style.display = "none";
      document.getElementById("add_admin").style.display = "none";
      document.getElementById("delete_train").style.display = "none";
      document.getElementById("change_train").style.display = "none";
      document.getElementById("check_train").style.display = "inline";
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
<div class="col-md-10 col-md-offset-1" style="background-color: rgba(248,248,255,0.3);padding: 15px; padding-top: 30px; height: 500px; overflow-y: auto;">
<div style="text-align: center;">
  <button type="button" onclick="show_add_train()" class="btn btn-default">
    添加车次
  </button>
  <button type="button" onclick="show_open_train()" class="btn btn-default">
    公开车次
  </button>
  <button type="button" onclick="show_change_train()" class="btn btn-default">
    修改车次
  </button>
  <button type="button" onclick="show_delete_train()" class="btn btn-default">
    删除车次
  </button>
  <button type="button" onclick="show_check_train()" class="btn btn-default">
    查询车次
  </button>
  <button type="button" onclick="show_add_admin()" class="btn btn-default">
    增加管理员
  </button>
</div>
<div id = "add_admin">
<div style="text-align: center;">
<form action="<?php echo This_URL ?>/Admin/set_admin" method="post" row = "form" name = "users" style = "padding-top: 100px;">
        <div class="form-inline">
          <input type = "text" class = "form-control" placeholder="ID" required="required" name = "id">
          <button type="submit" class="btn btn-default">
            提交
          </button>
        </div>
</form>
</div>
</div>
<div name = "add_train" id = "add_train">
<form action="<?php echo This_URL ?>/Train/add" method="post" row = "form"  name = "users" onsubmit="add_train_test()" style = "padding-top: 20px;">
<div class="form-inline">
<div class="col-md-offset-1">
  <input type = "text" class = "form-control" placeholder="车号" required="required" name = "train_id">
  <input type = "text" class = "form-control" placeholder="车名" required="required" name = "name">
  <input type = "text" class = "form-control" placeholder="类型" required="required" name = "catalog">
  <input type = "text" class = "form-control" placeholder="车站数目" required="required" name = "num_station" id = "add_num_station">
  <input type = "text" class = "form-control" placeholder="车票种数" required="required" name = "num_price" id = "add_num_ticket">
  <button class="btn btn-default" type = "button" onclick="add_train_ticket_1(this);">
            输入车次及车票信息
  </button>
</div>
</div>
<br>
<div class="table table-hover" name="add_train_ticket" id = "add_train_ticket">
  <div id = "add_train_ticket_form" class="form-inline col-md-offset-2" name = "add_train_ticket_form">
    
  </div>
  <div id = "add_train_station_form" class="form-inline col-md-offset-2" name = "add_train_station_form">
    
  </div>
  <button type="button" class="btn btn-default col-md-offset-4" onclick="add_train_add_station()">
  增加车站
  </button>
  <button type="submit" class="btn btn-default">
  提交车次及车票信息
  </button>
  <button type="reset" class="btn btn-default" onclick="add_train_ticket_2();">
  重置
  </button>
</div>
</form>
</div>
<div name = "change_train" id = "change_train">
<form action="<?php echo This_URL ?>/Train/modify" method="post" row = "form"  name = "change" class="row" onsubmit="change_train_test()" style = "padding-top: 20px;">
<div class="col-md-offset-1">
<div class="form-inline">
  <input type = "text" class = "form-control" placeholder="车号" required="required" name = "train_id">
  <input type = "text" class = "form-control" placeholder="车名" required="required" name = "name">
  <input type = "text" class = "form-control" placeholder="类型" required="required" name = "catalog">
  <input type = "text" class = "form-control" placeholder="车站数目" required="required" name = "num_station" id = "change_num_station">
  <input type = "text" class = "form-control" placeholder="车票种数" required="required" name = "num_price" id = "change_num_ticket">
  <button class="btn btn-default" type = "button" onclick="change_train_ticket_1(this);">
            输入车次及车票信息
  </button>
</div>
</div>
<br>
<div class="table table-hover" name="change_train_ticket" id = "change_train_ticket">
  <div id = "change_train_ticket_form" class="form-inline col-md-offset-2" name = "change_train_ticket_form">
    
  </div>
  <div id = "change_train_station_form" class="form-inline col-md-offset-2" name = "change_train_station_form">
    
  </div>
  <button type="button" class="btn btn-default col-md-offset-4" onclick="change_train_add_station()">
  增加车站
  </button>
  <button type="submit" class="btn btn-default">
  提交车次及车票信息
  </button>
  <button type="reset" class="btn btn-default" onclick="change_train_ticket_2();">
  重置
  </button>
</div>
</form>
</div>
<div id = "open_train">
<div style="text-align: center;">
<form action="<?php echo This_URL ?>/Train/sale" method="post" row = "form"  name = "users" style = "padding-top: 100px;">
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
<div style="text-align: center;">
<form action="<?php echo This_URL ?>/Train/erase" method="post" row = "form" name = "users" style = "padding-top: 100px;">
<div class="form-inline">
          <input type = "text" class = "form-control" placeholder="车次编号" required="required" name = "train_id">
          <button type="submit" class="btn btn-default">
            删除
          </button>
</div>
</form>
</div>
</div>
<div id = "check_train">
<div style="text-align: center;">
<form action="<?php echo This_URL ?>/Train/query" method="post" row = "form" name = "users" style = "padding-top: 100px;">
<div class="form-inline">
          <input type = "text" class = "form-control" placeholder="车次编号" required="required" name = "train_id">
          <button type="submit" class="btn btn-default">
            查询
          </button>
</div>
</form>
</div>
</div>
</div>
<script type="text/javascript">
  get_id();
  check_cookie();
</script>
<footer name = "time_footer" id = "time_footer" class="navbar-fixed-bottom">
  <br>
    <div class="container">
    <div style = "text-align: center; color: white;">
    <p>当前时间
    <script type="text/javascript">
        document.write(Date());
      </script>
      </p>
    </div>
</footer>
</body>
</html>