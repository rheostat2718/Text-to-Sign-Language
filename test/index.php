<?php

function connect()
{
	$db = new PDO('mysql:host=localhost;dbname=text2sign;charset=utf8', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $db;
}

$db = connect();

$sql = "select notation from hamnosys where 1 = 1 limit 1";

$stmt = $db->prepare($sql);
$stmt->execute(array());

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$db = null;

?>
<html>
<head>
	<title>Trying hamnosys</title>
	<meta charset="utf-8">
<style type="text/css">
@font-face {
    font-family: "My Custom Font";
    src: url(HamNoSysUnicode.ttf) format("truetype");
}
p.customfont { 
    font-family: "My Custom Font", Verdana, Tahoma;
}
</style>
</head>

<body>
<p class="customfont"><?php echo $row['notation']; ?></p>

</body>
</html>