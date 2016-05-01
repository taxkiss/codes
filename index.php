<?php
//===================================》》使用绘图技术绘制验证码

//1.随机产生4个随机数
$checkCode="";
for ($i=0;$i<4;$i++){
    $checkCode.=dechex(rand(1, 15));// decheck()十进制转换为十六进制
 }
 
 //2.存入列
 session_start();
 $_SESSION['checkCode']=$checkCode;
 
 //3.创建画布
 $image1=imagecreatetruecolor(100, 30);

 //制造干扰,创建20条弧线
 for ($j=0;$j<30;$j++){
     imagearc($image1, rand(0, 100), rand(0, 30), rand(0, 100), rand(0, 30), rand(0, 360), rand(0, 360), imagecolorallocate($image1, rand(0, 155), rand(0, 255), rand(0, 255)));
 }
 
 //3.创建字体颜色,将字粘贴上去
 $white=imagecolorallocate($image1, 255, 255, 255);
 imagestring($image1, rand(2, 5), rand(5, 70), rand(2, 15), $checkCode, $white);
 
 //5.输出图像或保存
 header("content-type:image/png");
 imagepng($image1);
 
 //6.释放资源
 imagedestroy($image1);
 