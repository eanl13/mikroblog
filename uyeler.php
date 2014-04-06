<?php
session_start();
include_once  './Login.php';

$Login = new Login();
if ( $Login->isLogined() == false ){
    header('Location: '. 'index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
<div id="container">
    <div id="content">
        <?php
        $UyeList = $Login->getUye(10);
        ?>
        <table border="1" cellpadding="2">
            <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Firstname</th>
                <th>Lastname</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (is_null($UyeList) ){
                echo '<tr><td colspan="5">No record.</td></tr>';
            }else{
                foreach ($UyeList as $UyeItem) {
                    $UyeItem = (object)$UyeItem;
                    ?>
                    <tr>
                        <td><?php echo $UyeItem->id; ?></td>
                        <td><?php echo $UyeItem->email; ?></td>
                        <td><?php echo $UyeItem->firstname; ?></td>
                        <td><?php echo $UyeItem->lastname; ?></td>
                        <td>
                            <a href="takip_et.php?id=<?php echo $UyeItem->id; ?>">
                                Takip Et
                            </a>
                        </td>
                    </tr>
                <?php
                }
            }
            ?>

            </tbody>
        </table>

    </div>
</div>
</body>
</html>
