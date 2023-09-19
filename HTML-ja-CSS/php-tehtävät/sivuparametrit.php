<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Nettiteknologia</title>
</head>

<body>
    <?php
    if (!isset($_GET['tekno'])) {
        echo '<a href="./sivuparametrit.php?tekno=html">HTML</a><br>';
        echo '<a href="./sivuparametrit.php?tekno=css">CSS</a><br>';
        echo '<a href="./sivuparametrit.php?tekno=javascript">Javascript</a><br>';
        echo '<a href="./sivuparametrit.php?tekno=php">PHP</a><br>';
    } elseif ($_GET['tekno'] == 'html') {
        echo 'HTML kuvaa dokumentin rakenteen.<br>';
        echo '<a href="javascript:history.back()">Takaisin</a><br>';
    } elseif ($_GET['tekno'] == 'css') {
        echo 'CSS määrittää dokumentin ulkoasun.<br>';
        echo '<a href="javascript:history.back()">Takaisin</a><br>';
    } elseif ($_GET['tekno'] == 'javascript') {
        echo 'Javascript on selainpuolen kieli.<br>';
        echo '<a href="javascript:history.back()">Takaisin</a><br>';
    } elseif ($_GET['tekno'] == 'php') {
        echo 'PHP on palvelinpuolen kieli.<br>';
        echo '<a href="javascript:history.back()">Takaisin</a><br>';
    } else {
        echo 'Haluamaasi teknologiaa ei löydy.<br>';
        echo '<a href="javascript:history.back()">Takaisin</a><br>';
    }
    ?>
</body>

</html>