<!DOCTYPE HTML> 
<html> 
    <head> 
        <title>信息输入界面</title> 
        <style> 
        .black_overlay{ 
            display: none; 
            position: absolute; 
            top: 0%; 
            left: 0%; 
            width: 100%; 
            height: 100%; 
            background-color: black; 
            z-index:1001; 
            -moz-opacity: 0.8; 
            opacity:.80; 
            filter: alpha(opacity=88); 
        } 
        .white_content { 
            display: none; 
            position: absolute; 
            top: 5%; 
            left: 20%; 
            width: 50%; 
            height: 85%; 
            padding: 20px; 
            border: 10px solid orange; 
            background-color: white; 
            z-index:1002; 
            overflow: auto; 
        } 
    </style> 
    </head> 
    <body> 
        <p>示例弹出层：<a href = "JavaScript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">请点这里</a></p> 
        <div id="light" class="white_content" align="right">
<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">[关闭]</a>
        
        <form method="post" action="announce.php">
        <div align="left">
            <p>姓名：
                <input type="varchar" name="name">
            </p>
        </div>

        </div> 
        <div id="fade" class="black_overlay"></div> 
    </body> 
</html>

