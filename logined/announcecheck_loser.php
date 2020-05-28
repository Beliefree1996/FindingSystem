<?php
    if(isset($_POST["submit"])&&$_SERVER['REQUEST_METHOD'] == 'POST') {
        $name_ = $_POST["name"];
        $contact_ = $_POST["contact"];
        $thing_ = $_POST["thing"];

        if($name_ == "" || $contact_ == "" || $thing_ == "") {
            echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
        }

        else {
             $uptypes=array(  
            'image/jpg',  
            'image/jpeg',  
            'image/png',  
            'image/pjpeg',  
            'image/gif',  
            'image/bmp',  
            'image/x-png'  
            );  
              
            $max_file_size=2097153;     //上传文件大小限制, 单位BYTE  
            $destination_folder="uploadimg/"; //上传文件路径  
            $watermark=1;      //是否附加水印(1为加水印,其他为不加水印);  
            $watertype=1;      //水印类型(1为文字,2为图片)  
            $waterposition=1;     //水印位置(1为左下角,2为右下角,3为左上角,4为右上角,5为居中);  
            $waterstring="http://www.xplore.cn/";  //水印字符串  


            if (!is_uploaded_file($_FILES["upfile"]['tmp_name']))  
            //是否存在文件  
            {  
                 echo "图片不存在!";  
                 exit;  
            }  
          
            $file = $_FILES["upfile"]; 
            if($max_file_size < $file["size"])  
            //检查文件大小  
            {  
                echo "文件太大!";  
                exit;  
            }  

            if(!in_array($file["type"], $uptypes))  
            //检查文件类型  
            {  
                echo "文件类型不符!".$file["type"];  
                exit;  
            } 
            
            $destination_folder="uploadimg/";
            if(!file_exists($destination_folder))  
            {  
                mkdir($destination_folder);  
            }  
          
            $filename=$file["tmp_name"];  
            $image_size = getimagesize($filename);  
            $pinfo=pathinfo($file["name"]);  
            $ftype=$pinfo['extension'];  
            $destination = $destination_folder.time().".".$ftype;  
            if (file_exists($destination) && $overwrite != true)  
            {  
                echo "同名文件已经存在了";  
                exit;  
            }  
          
            if(!move_uploaded_file ($filename, $destination))  
            {  
                echo "移动文件出错";  
                exit;  
            }  
      



            session_start();
                $db = mysqli_connect("localhost","admin","admin","finding") or die ('Unable to connect. Check your connection parameters.');
                mysqli_set_charset($db, "utf8");
                $sql_insert = "insert into loser (username,name,gender,contactway,contact,thing,class,picture,time,locale,description) value ('$_SESSION[username]', '$_POST[name]','$_POST[gender]', '$_POST[contactway]', '$_POST[contact]', '$_POST[thing]', '$_POST[class]', '$destination', '$_POST[time]', '$_POST[locale]', '$_POST[description]')";
                $res_insert = mysqli_query($db, $sql_insert);
                if($res_insert) {  
                    echo "<script>alert('发布成功！'); top.location='logined_index.php';</script>";
                }
                else {  
                    echo "<script>alert('系统繁忙，请稍候！'); </script>";  
                }
            

        }
    }
?>