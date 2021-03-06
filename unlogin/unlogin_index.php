    <!DOCTYPE HTML>
    <html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <title>校园寻物平台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel='stylesheet' id='prettyphoto-css'  href="css/prettyPhoto.css" type='text/css' media='all'>
    <link href="css/fontello.css" type="text/css" rel="stylesheet">
    <!--[if lt IE 7]>
            <link href="css/fontello-ie7.css" type="text/css" rel="stylesheet">  
        <![endif]-->
    <!-- Google Web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Quattrocento:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
    <style>


    body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
    }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/寻物.png">
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <!-- Load ScrollTo -->
    <script type="text/javascript" src="js/jquery.scrollTo-1.4.2-min.js"></script>
    <!-- Load LocalScroll -->
    <script type="text/javascript" src="js/jquery.localscroll-1.2.7-min.js"></script>
    <script type="text/javascript" src="js/vue.min.js"></script>
    <script type="text/javascript" src="../js/layer/layer.js"></script>
    <!-- prettyPhoto Initialization -->
    <script type="text/javascript" charset="utf-8">
          $(document).ready(function(){
            $("a[rel^='prettyPhoto']").prettyPhoto();
          });
        </script>
    </head>
    <body>
    <!--******************** NAVBAR ********************-->
    <div class="navbar-wrapper">
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
            <h1 class="brand"><a href="#top">校园寻物平台</a></h1>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <nav class="pull-right nav-collapse collapse">
              <ul id="menu-main" class="nav">
                <li><a href="../login.php">登录/注册</a></li>
                <li><a title="back" href="#back">我要寻物</a></li>
                <li><a title="return" href="#return">我要归还</a></li>
                <li><a title="team" href="javascript:alert('抱歉！您尚未登录，无权发布！');">我要发布</a></li>
                <li><a title="contact" href="#contact">联系作者</a></li>
              </ul>
            </nav>
          </div>
          <!-- /.container -->
        </div>
        <!-- /.navbar-inner -->
      </div>
      <!-- /.navbar -->
    </div>
    <!-- /.navbar-wrapper -->
    <div id="top"></div>
    <!-- ******************** HeaderWrap ********************-->
    <div id="headerwrap">
      <header class="clearfix">
        <h1><span>Get Back!</span> 说 不 定 就 找 到 了 呢 ？</h1>
        <br>
        <h2>塞翁失马，焉知非福~</h2>
      <!--
        <div class="container">
          <div class="row">
            <div class="span12">
              <h2>Search for your losed/found thing.</h2>
              <input type="text" name="thing" placeholder="学生证/钥匙/钱包/数码产品" class="cform-text" size="40" title="请选择分类">
              <input type="submit" value="Search" class="cform-submit"
            </div>
          </div>
          <div class="row">
            <div class="span12">
              <ul class="icon">
                <li><a href="#" target="_blank"><i class="icon-pinterest-circled"></i></a></li>
                <li><a href="#" target="_blank"><i class="icon-facebook-circled"></i></a></li>
                <li><a href="#" target="_blank"><i class="icon-twitter-circled"></i></a></li>
                <li><a href="#" target="_blank"><i class="icon-gplus-circled"></i></a></li>
                <li><a href="#" target="_blank"><i class="icon-skype-circled"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      -->

      </header>
    </div>
    <!--******************** Feature ********************-->
    <div class="scrollblock">
      <section id="feature">
        <div class="container">
          <div class="row">
            <div class="span12">
              <article>
                <p>At present,this site is only used for the</p>
                <p>students of Shanghai University</p>
                <p>to publish materials and lost property notices.</p>
              </article>
            </div>
            <!-- ./span12 -->
          </div>
          <!-- .row -->
        </div>
        <!-- ./container -->
      </section>
    </div>
    <hr>
    <!--******************** Back Section ********************-->
    <section id="back" class="single-page scrollblock">
      <div class="container" id="find_thing">
        <div class="align"><i class="icon-cog-circled"></i></div>
        <h1>Looking For...</h1>
        <!-- Four columns -->
        <div class="row" >
           <article class="span4 post" v-for="finder in finders"> <img class="img-news" v-bind:src="'../logined/'+finder.picture" alt="" style="width: 100%;height: 250px">
            <div class="inside">
              <p class="post-date"><i class="icon-calendar"></i> {{finder.time}}</p>
              <h3>{{finder.thing}}</h3>
              <div class="entry-content">
                <p>{{finder.name}}</p>
                              
                <a href="JavaScript:void(0)" v-on:click = "detail(finder)" class="more-link">read more</a> </div>
          
            </div>
            <!-- /.inside -->
          </article>
          <!-- /.span3 -->
        </div>
        <p></p>
        <div style="text-align: center;">
          <a style="cursor:pointer" v-on:click="page(--nowPage)">上一页</a></li>
              {{nowPage}}/{{totalPage}}
          <a style="cursor:pointer" v-on:click="page(++nowPage)">下一页</a>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>

    <script type="text/javascript">
      var find_thing=new Vue({
        el: '#find_thing',
        data: {
          finders:"",
          nowPage:"",
          totalPage:""
        },
        beforeCreate:function(){
            var _self=this;
            $.get('api/finders.php',function(data){
                _self.finders=data.finders;
                _self.nowPage=data.nowPage;
                _self.totalPage=data.totalPage;
            })
        },
        methods:{
          page:function(newpage){
            var _self=this;
            $.get('api/finders.php',{nowPage:newpage},function(data){
                _self.finders=data.finders;
                _self.nowPage=data.nowPage;
                _self.totalPage=data.totalPage;
            })
          },
          detail:function(finder){
            layer.open({
              type: 1,
              title: false,
              closeBtn: 0,
              shadeClose: true,
              skin: 'yourclass',
              content: "<div  class=\"white_content1\" align=\"right\"><div align=\"left\"><p>拾主姓名："+finder.name+"</p><p>"+finder.contactway+"："+finder.contact+"</p><p>发现时间："+finder.time+"</p><p>发现地点："+finder.locale+"</p><p>详细描述："+finder.description+"</p></div></div>"
            });
          },
        },
      });
    </script>
    <hr>
    <!--******************** Return Section ********************-->
    <section id="return" class="single-page scrollblock">
      <div class="container" id="lose_thing">
        <div class="align"><i class="icon-cog-circled"></i></div>
        <h1>Return To...</h1>
        <!-- Four columns -->
        <div class="row" >
           <article class="span4 post" v-for="loser in losers"> <img class="img-news" v-bind:src="'../logined/'+loser.picture" alt="" style="width: 100%;height: 250px">
            <div class="inside">
              <p class="post-date"><i class="icon-calendar"></i> {{loser.time}}</p>
              <h3>{{loser.thing}}</h3>
              <div class="entry-content">
                <p>{{loser.name}}</p>
                <a href="JavaScript:void(0)" v-on:click = "detail(loser)" class="more-link">read more</a> </div>
            </div>
            <!-- /.inside -->
          </article>
          <!-- /.span3 -->
        </div>
        <p></p>
        <div style="text-align: center;">
          <a style="cursor:pointer" v-on:click="page(--nowPage)">上一页</a></li>
              {{nowPage}}/{{totalPage}}
          <a style="cursor:pointer" v-on:click="page(++nowPage)">下一页</a>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>

    <script type="text/javascript">
      var lose_thing=new Vue({
        el: '#lose_thing',
        data: {
          losers:"",
          nowPage:"",
          totalPage:""
        },
        beforeCreate:function(){
            var _self=this;
            $.get('api/losers.php',function(data){
                _self.losers=data.losers;
                _self.nowPage=data.nowPage;
                _self.totalPage=data.totalPage;
            })
        },
        methods:{
          page:function(newpage){
            var _self=this;
            $.get('api/losers.php',{nowPage:newpage},function(data){
                _self.losers=data.losers;
                _self.nowPage=data.nowPage;
                _self.totalPage=data.totalPage;
            })
          },
          detail:function(loser){
            layer.open({
              type: 1,
              title: false,
              closeBtn: 0,
              shadeClose: true,
              skin: 'yourclass',
              content: "<div  class=\"white_content2\" align=\"right\"><div align=\"left\"><p>失主姓名："+loser.name+"</p><p>"+loser.contactway+"："+loser.contact+"</p><p>丢失时间："+loser.time+"</p><p>丢失地点："+loser.locale+"</p><p>详细描述："+loser.description+"</p></div></div>"
            });
          },
        },
      });
    </script>
    <hr>
    
    <!--******************** Testimonials Section ********************-->
    <section id="testimonials" class="single-page hidden-phone">
      <div class="container">
        <div class="row">
          <div class="blockquote-wrapper">
            <blockquote class="mega">
             <div class="span8">
                <p class="alignright">"Honesty may be dear bought,but can never be an ill pennyworth."</p>
              </div>
              <div class="span8">
                <p class="alignright">&nbsp</p>
              </div>
              <div class="span8">
                <p class="alignright">&nbsp</p>
              </div>
              <div class="span12">
                <p class="alignright">找 到 了？ 那 是 不 是 该 请 他 / 她 吃 顿 饭？</p>
              </div>
            </blockquote>
          </div>
          <!-- /.blockquote-wrapper -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <hr>
    <!--******************** News Section ********************-->
    <section class="single-page hidden-phone">
      <div>
        <a href="#" class="btn btn-large">Go to the top</a> </div>
      <!-- /.container -->
    </section>
    <hr>
    <!--******************** Team Section ********************-->
    


    <!--******************** Contact Section ********************-->
    <section id="contact" class="single-page scrollblock">
      <div class="container">
        <div class="align"><i class="icon-mail-2"></i></div>
        <h1>Contact the authors now!</h1>
        <div class="row">
          <div class="span12">
            <div class="cform" id="theme-form">
              <form action="#" method="post" class="cform-form">
                <div class="row">
                  <div class="span6"> <span class="your-name">
                    <input type="text" name="your-name" placeholder="Your Name" class="cform-text" size="40" title="your name">
                    </span> </div>
                  <div class="span6"> <span class="your-email">
                    <input type="text" name="your-email" placeholder="Your Email" class="cform-text" size="40" title="your email">
                    </span> </div>
                </div>
                <div class="row">
                  <div class="span6"> <span class="college">
                    <input type="text" name="company" placeholder="Your College" class="cform-text" size="40" title="college">
                    </span> </div>
                  <div class="span6"> <span class="grade">
                    <input type="text" name="website" placeholder="Your Grade" class="cform-text" size="40" title="grade">
                    </span> </div>
                </div>
                <div class="row">
                  <div class="span12"> <span class="message">
                    <textarea name="message" class="cform-textarea" cols="40" rows="10" title="drop us a line."></textarea>
                    </span> </div>
                </div>
                <div>
                  <input type="submit" value="Send message" class="cform-submit pull-left">
                </div>
                <div class="cform-response-output"></div>
              </form>
            </div>
          </div>
          <!-- ./span12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <hr>
    <div class="footer-wrapper">
      <div class="container">
        <footer>
          <small>&copy; 2017 Shanghai University. All rights reserved by Beliefree.</small>
        </footer>
      </div>
      <!-- ./container -->
    </div>
    <!-- Loading the javaScript at the end of the page -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/site.js"></script>
    
    <!--ANALYTICS CODE-->
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-29231762-1']);
	  _gaq.push(['_setDomainName', 'dzyngiri.com']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
    </body>
    </html>
