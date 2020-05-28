<?php
error_reporting(E_ALL || ~E_NOTICE);
session_start();
if(!$_SESSION['admin_name']){
	header("Location: login.php");
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
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/vue.min.js"></script>
	<title>招领信息管理</title>
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
          <a class="navbar-brand" href="#">上大寻物平台管理</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">退出管理员系统</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="index.php">用户管理</a></li>
            <li><a href="admin_finders.php">遗失信息管理</a></li>
            <li class="active"><a href="admin_finder.php">招领信息管理 <span class="sr-only">(current)</span></a></li>
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
                  <th>失主姓名</th>
                  <th>性别</th>
                  <th>联系方式</th>
                  <th>丢失物品</th>
                  <th>分类</th>
                  <th>缩略图</th>
                  <th>丢失时间</th>
                  <th>丢失地点</th>
                  <th>详细描述</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody id="tbody">
                <tr v-for="finder in finders">
                  <td>{{finder.id}}</td>
                  <td>{{finder.username}}</td>
                  <td>{{finder.name}}</td>
                  <td>{{finder.gender}}</td>
                  <td>{{finder.contact}}</td>
                  <td>{{finder.thing}}</td>
                  <td>{{finder.class}}</td>
                  <td><img v-bind:src="'../logined/'+finder.picture" style="width: 30px"></td>
                  <td>{{finder.time}}</td>
                  <td>{{finder.locale}}</td>
                  <td>{{finder.description}}</td>
                  <td><a style="cursor:pointer" v-on:click="delete_finder(finder.id,nowPage)">删除</a></td>
                </tr>
                <tr>
            	  <td colspan="12" align="center"><a style="cursor:pointer" v-on:click="page(--nowPage)">上一页 </a>{{nowPage}}/{{totalPage}}<a style="cursor:pointer" v-on:click="page(++nowPage)"> 下一页</a></td>
                </tr>
              </tbody>

              <script type="text/javascript">
              	var tbody=new Vue({
    			        el: '#tbody',
    			        data: {
    			          finders:"",
    			          nowPage:"",
    			          totalPage:""
    			        },
    			        beforeCreate:function(){
    			            var _self=this;
    			            $.get('../logined/api/finders.php',function(data){
    			                _self.finders=data.finders;
    			                _self.nowPage=data.nowPage;
    			                _self.totalPage=data.totalPage;
    			            },'json');
    			        },
    			        methods:{
    			          page:function(newpage){
    			            var _self=this;
    			            $.get('../logined/api/finders.php',{nowPage:newpage},function(data){
    			                _self.finders=data.finders;
    			                _self.nowPage=data.nowPage;
    			                _self.totalPage=data.totalPage;
    			            })
    			          },
    			          delete_finder:function(id,nowPage){
    			          	var _self=this;
    			          	if(confirm('删除后不可恢复！ 确定删除对编号为 '+id+' 的遗失信息吗?')){
    			          		$.get('api/delete_finder.php',{'id':id},function(data){
    				          		if(data.flag==1){
    				          			$.get('../logined/api/finders.php',{nowPage:nowPage},function(msg){
    				          				alert('操作成功');
    				          				  _self.finders=msg.finders;
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