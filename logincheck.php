<?php  
    if(isset($_POST["submit"]))  
    {  
        $user = $_POST["username"];  
        $psw = $_POST["password"];  
        if($user == "" || $psw == "")  
        {  
            echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";  
        }  
        else  
        {  
            $db = mysqli_connect("localhost","admin","admin") or die('Unable to connect. Check your connection parameters.');  
            $query = "CREATE DATABASE IF NOT EXISTS finding";
            mysqli_query($db, $query) or die(mysql_error($db));  
            $db_selected = mysqli_select_db($db, "finding") or die(mysql_error($db));  
            $sql = "select username,password,status from user where username = '$_POST[username]' and password = '$_POST[password]' and status = '1'";  
            $sql1 = "select username,password from user where username = '$_POST[username]' and password = '$_POST[password]'";
            $result=mysqli_query($db, $sql);
            $result1=mysqli_query($db, $sql1);
            $num = mysqli_num_rows($result);  
            $num1 = mysqli_num_rows($result1);
            if($num1)  
            {  
                if($num){
                    session_start();
                    $_SESSION['username']=$_POST['username'];
                    $row = mysqli_fetch_array($result);  //将数据以索引方式储存在数组中  
                    echo $row[0];  
                    header("Location: logined/logined_index.php");
                }
                else{
                    echo "<script>alert('您的账号已被封，请联系管理员！！');history.go(-1);</script>";
                }
            }  
            else  
            {  
                echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";  
            }  
            
        }  
    }  
    else  
    {  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }  
    
?>  