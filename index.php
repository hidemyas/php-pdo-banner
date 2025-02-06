<?php
require_once "connect.php";
?>

<!doctype html>
<html lang="tr-Tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banner Uygulaması</title>
</head>
<body>
<?php
$ads_query  =   $db_connect->prepare('SELECT * FROM bannerlar ORDER BY gosterimsayisi ASC LIMIT 1');
$ads_query->execute();
$ads_banner         =   $ads_query->fetch(PDO::FETCH_ASSOC);
    ?>
<table width="1000" align="center" border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <tr height="150">
            <td align="center"><img src="dosyalar/<?php echo $ads_banner['bannerdosyasi'];?>" border="0" alt=""></td>
        </tr>
    </tbody>
</table>
</body>
</html>
<?php
    $ads_reload =   $db_connect->prepare('UPDATE bannerlar SET gosterimsayisi=gosterimsayisi+1 WHERE id = ?');
    $ads_reload->execute([$ads_banner['id']]);

    $db_connect=null;

