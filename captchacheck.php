<?php   //验证码
  session_start();
  $image = imagecreatetruecolor(100, 30);
  $bgcolor = imagecolorallocate($image,255,255,255); //#ffffff
  imagefill($image, 0, 0, $bgcolor);
  $captcha_code = "";
  for($i=0;$i<4;$i++){
    $fontsize = 8;    
    $fontcolor = imagecolorallocate($image, rand(0,120),rand(0,120), rand(0,120));      
    $data ='abcdefghigkmnpqrstuvwxy3456789';
    $fontcontent = substr($data, rand(0,strlen($data)),1);
    //10>.=连续定义变量
    $captcha_code .= $fontcontent;    
    //设置坐标
    $x = ($i*100/4)+rand(5,10);
    $y = rand(5,10);
    imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
  }
  //10>存到session
  $_SESSION['authcode'] = $captcha_code;
  //8>增加干扰元素，设置雪花点
  for($i=0;$i<200;$i++){
    //设置点的颜色，50-200颜色比数字浅，不干扰阅读
    $pointcolor = imagecolorallocate($image,rand(50,200), rand(50,200), rand(50,200));    
    //imagesetpixel — 画一个单一像素
    imagesetpixel($image, rand(1,99), rand(1,29), $pointcolor);
  }
  //增加干扰元素，设置横线
  for($i=0;$i<4;$i++){
    //设置线的颜色
    $linecolor = imagecolorallocate($image,rand(80,220), rand(80,220),rand(80,220));
    //设置线，两点一线
    imageline($image,rand(1,99), rand(1,29),rand(1,99), rand(1,29),$linecolor);
  }
  header('Content-Type: image/png');
  //imagepng() 建立png图形函数
  imagepng($image);
  //imagedestroy() 结束图形函数 销毁$image
  imagedestroy($image);
?>