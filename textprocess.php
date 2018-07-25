
<?php
session_start();
$_SESSION['account']="";
$_SESSION['password']="";
?>



<html>

<head>
<meta charset="UTF-8">
<title>TextProcess</title>
</head>

<body>

<?php

if (!$fp=fopen("test.txt","r")){
    echo "檔案無法開啟";
	exit;
}
//echo $fp;

while (!feof($fp)){
	$str=fgets($fp);
	$str = iconv("BIG5","UTF-8", $str);
	$str_explode=explode(" ",$str);
	$len=count($str_explode);

	//mb_convert_encoding($str,"UTF-8","auto");  
	//echo "分隔線";
	for($i=0;$i<$len;$i++){

	echo $str_explode[$i]."<br>";
	}
	echo"-------------------"."<br>";

}

fclose($fp) ;


?>


</body>


</html>