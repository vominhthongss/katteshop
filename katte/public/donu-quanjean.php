<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<head>
    <title>
        Katte Shop
    </title>
    <link rel="icon" href="images/logoshop.png">
</head>

<body>
    <?php include "body-header.php" ?>
    <?php include "body-search.php" ?>
    <?php include "body-navigation.php" ?>
    <?php include "donu-sub.php"?>
    <?php 
        include "dbConfig.php"; 
        $sql = "SELECT * FROM hanghoa WHERE manhom='DONU' AND TenHH LIKE '%Quần Jean%' ORDER BY TenHH ASC ";

    ?>
    <?php 
        include "productcss.php";
    ?>
    <?php include "body-footer.php" ?>
    <link rel="stylesheet" href="css/katte.css">
    <script src="javascript/katte.js"></script>
</body>

</html>