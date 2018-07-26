
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

// $array1 = array("color","red","tony","amos");
// $array2 = array("a", "b", "color","green", "shape","trapezoid", "four");
// $result = array_merge($array1, $array2);
// print_r($result);
// echo"-------------------"."<br>";


if (!$fp=fopen("test.txt","r")){
    echo "檔案無法開啟";
	exit;
}
//echo $fp;
$array_merge=array("");
//中文標點符號
$char = "。、！？：；﹑•＂…‘’“”〝〞∕¦‖—　〈〉﹞﹝「」‹›〖〗】【»«』『〕〔》《﹐¸﹕︰﹔！¡？¿﹖﹌﹏﹋＇´ˊˋ―﹫︳︴¯＿￣﹢﹦﹤‐­˜﹟﹩﹠﹪﹡﹨﹍﹉﹎﹊ˇ︵︶︷︸︹︿﹀︺︽︾ˉ﹁﹂﹃﹄︻︼（）";
$pattern = array(
    "/[[:punct:]]/i", //英文标点符号
    '/['.$char.']/u', //中文标点符号
    '/[ ]{2,}/'
);
// $string="diwmd,spoa:sko";
// echo $string."<br>";
// $string=preg_replace ($pattern,'',$string);
// echo $string."<br>";
// echo"-------------------";
//preg_replace ( $pattern , $replacement ,$subject);
//
while (!feof($fp)){
	$str=fgets($fp);
	$str = iconv("BIG5","UTF-8", $str);
	//preg_replace ($rule,'',$str);
	$str_explode=explode(" ",$str);
	$len=count($str_explode);



	


	for($i=0;$i<$len;$i++){
	//echo $str_explode[$i]."<br>";
		$str_explode[$i]=preg_replace ($pattern,null,$str_explode[$i]);
		$str_explode[$i]=trim($str_explode[$i]);
	}
	$array_merge=array_merge($array_merge,$str_explode);
	

	// echo"-------------------"."<br>";
}

sort($array_merge);
//echo"-------------------"."<br>";
$len1=count($array_merge);
for($j=3;$j<$len1;$j++){
echo $array_merge[$j]."<br>";
$array_merge_nonemprty[$j-3]=$array_merge[$j];
}
echo"-------------------"."<br>";
echo "<pre>";
//print_r(array_count_values ($array_merge));
print_r(array_count_values ($array_merge_nonemprty));
echo "</pre>";
//echo '<pre>',print_r(array_count_values ($array_merge)),'</pre>';
//print_r(array_count_values ($array_merge));

fclose($fp) ;


?>


</body>


</html>