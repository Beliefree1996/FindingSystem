<?php
error_reporting(E_ALL || ~E_NOTICE);
session_start();
if(!$_SESSION['admin_name']){
	header("Location: login.php");
}

if($_GET['action'] == "logout") {
  unset($_SESSION['admin_name']);
  //echo '注销登录成功！点击此处 <a href="login.php">登录';
  exit();
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="shortcut icon" href="img/寻物.png">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/vue.min.js"></script>
	<title>用户管理</title>
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top"> 
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">校园寻物平台管理</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php?action=logout">退出管理员系统</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="index.php">用户管理 <span class="sr-only">(current)</span></a></li>
            <li><a href="admin_losers.php">遗失信息管理</a></li>
            <li><a href="admin_finders.php">招领信息管理</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
          <h2 class="sub-header">用户列表</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>用户名</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody id="tbody">
                <tr v-for="user in users">
                  <td>{{user.id}}</td>
                  <td>{{user.username}}</td>
                  <td>{{(user.status==1)?'正常':'被锁定'}}</td>
                  <td><a style="cursor:pointer" v-on:click="change_status(user.id,user.status,nowPage)">{{(user.status==1)?'锁定':'解锁'}}</a>  <a style="cursor:pointer" v-on:click="delete_user(user.id,nowPage)">删除</a></td>
                </tr>
                <tr>
            	  <td colspan="4" align="center"><a style="cursor:pointer" v-on:click="page(--nowPage)">上一页 </a>{{nowPage}}/{{totalPage}}<a style="cursor:pointer" v-on:click="page(++nowPage)"> 下一页</a></td>
                </tr>
              </tbody>

              <script type="text/javascript">
              	var tbody=new Vue({
			        el: '#tbody',
			        data: {
			          users:"",
			          nowPage:"",
			          totalPage:""
			        },
			        beforeCreate:function(){
			            var _self=this;
			            $.get('api/users.php',function(data){
			                _self.users=data.users;
			                _self.nowPage=data.nowPage;
			                _self.totalPage=data.totalPage;
			            })
			        },
			        methods:{
			          page:function(newpage){
			            var _self=this;
			            $.get('api/users.php',{nowPage:newpage},function(data){
			                _self.users=data.users;
			                _self.nowPage=data.nowPage;
			                _self.totalPage=data.totalPage;
			            })
			          },
			          change_status:function(id,status,nowPage){
			          	var _self=this;
			          	if(confirm('确定要对编号为'+id+'的用户执行'+((status==1)?'锁定':'解锁')+'操作吗?')){
			          		$.get('api/change_user_status.php',{'id':id,'status':status},function(data){
				          		if(data.flag==1){
				          			$.get('api/users.php',{nowPage:nowPage},function(msg){
				          				alert('操作成功');
				          				_self.users=msg.users;
						                _self.nowPage=msg.nowPage;
						                _self.totalPage=msg.totalPage;
				          			});
				          		}else{
				          			alert('系统繁忙，请稍后重试');
				          		}
				            },'json');
			          	}
			          },
			          delete_user:function(id,nowPage){
			          	var _self=this;
			          	if(confirm('删除后不可恢复！ 确定删除对编号为 '+id+' 的用户吗?')){
			          		$.get('api/delete_user.php',{'id':id},function(data){
				          		if(data.flag==1){
				          			$.get('api/users.php',{nowPage:nowPage},function(msg){
				          				alert('操作成功');
				          				_self.users=msg.users;
						                _self.nowPage=msg.nowPage;
						                _self.totalPage=msg.totalPage;
				          			});
				          		}else{
				          			alert('系统繁忙，请稍后重试');
				          		}
				            },'json')
			          	}
			          }
			        },
			      });
              </script>

            </table>
          </div>
        </div>
      </div>
    </div>



</body>
</html>