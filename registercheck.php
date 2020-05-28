<?php  
    if(isset($_POST["submit"]))  
    {  
        $user = $_POST["username"];  
        $psw = $_POST["password"];  
        $psw_confirm = $_POST["confirm"];  
        if($user == "" || $psw == "" || $psw_confirm == "")  
        {  
            echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";  
        }

        else  
        {
            if (isset($_REQUEST['authcode'])) {

                session_start();

                if($psw == $psw_confirm)  
                {  
                    $db = mysqli_connect("localhost","admin","admin") or die('Unable to connect. Check your connection parameters.');  
                    $query = "CREATE DATABASE IF NOT EXISTS finding";
                    mysqli_query($db, $query) or die(mysql_error($db));  
                    $db_selected = mysqli_select_db($db, "finding") or die(mysql_error($db)); 
                    $sql = "select username from user where username = '$_POST[username]'"; //SQL语句  
                    $result = mysqli_query($db, $sql);    //执行SQL语句  
                    $num = mysqli_num_rows($result); //统计执行结果影响的行数  
                    if($num)    //如果已经存在该用户  
                    {  
                        echo "<script>alert('用户名已存在'); history.go(-1);</script>";  
                    }  
                    else    //不存在当前注册用户名称  
                    {  
                        if (strtolower($_REQUEST['authcode'])== $_SESSION['authcode']) {      // 判断验证码
                           // echo "<script language=\"javascript\">";
                           // echo "document.location=\"./registercheck.php\"";
                           // echo "</script>";
                            $sql_insert = "insert into user (username,password) values('$_POST[username]','$_POST[password]')";  
                            $res_insert = mysqli_query($db, $sql_insert);  
                            //$num_insert = mysql_num_rows($res_insert);  
                            if($res_insert)  
                            {  
                                echo "<script>alert('注册成功！'); history.go(-1);</script>";  
                            }  
                            else  
                            {  
                                echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";  
                            }  
                        }
                        else {
                           // echo "<script language=\"javascript\">";
                            echo "<script>alert('验证码输入错误!'); history.go(-1);</script>";
                           // echo "document.location=\"./registercheck.php\"";
                           // echo "</script>";
                        }
                    }  
                }  
                else  
                {  
                    echo "<script>alert('密码不一致！'); history.go(-1);</script>";  
                }  
            }
            else {
                echo "<script>alert('提交未成功！'); history.go(-1);</script>";
            }
        }  
    }  
    else  
    {  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }  
?>  