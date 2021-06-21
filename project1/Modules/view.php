<?php include("../server/configC.php"); ?>
<?php

$select = "SELECT ID, Modules, Grade, UFCD, INFO FROM courses WHERE id = ?";

if ($stmt = mysqli_prepare($connect, $select)) {

    mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);

    if (mysqli_stmt_execute($stmt)) {

        $result = mysqli_stmt_get_result($stmt);


        if (mysqli_num_rows($result) == 1) {
            $line = mysqli_fetch_array($result);
        } else {
            echo "Something went wrong!";
        }
    }
} else {
    echo "Something went wrong, try later!";
}
mysqli_stmt_close($stmt); //obriga a terminar o SELECT
mysqli_close($connect); //encerra a ligação à base de dados
?>



<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Description of Module</title>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/viewC.css">
</head>

<body>
    <div id="viewC">
        <div id="box">
            <div>
                <h1>Description of Module</h1>
            </div>
            <div>
                <p>
                    <label>ID: </label>
                    <?php echo $line["ID"]; ?>
                </p>
            </div>
            <div>
                <p>
                    <label>Modules: </label>
                    <?php echo $line["Modules"]; ?>
                </p>
            </div>
            <div>
                <p>
                    <label>Grade: </label>
                    <?php echo $line["Grade"]; ?>
                </p>
            </div>
            <div>
                <p>
                    <label>UFCD: </label>
                    <?php echo $line["UFCD"]; ?>
                </p>
            </div>
            <div>
                <p>
                    <label>INFO: </label>
                    <?php echo $line["INFO"]; ?>
                </p>
            </div>
            <p>
                <a href="../modules.php">Back</a>
            </p>
        </div>
    </div>
    <aside id="nav-bot">
        <div id="nav-bot-solo">
            <div id="nav-foto"><img src="../foto/foto.png"; height=100px; width=100px; /></div>
            <ul id="nav-list">
                <li id="nav-list-solo"><a id="nav-link-list" href="../index.php">HOME</a></li>
                <li id="nav-list-solo"><a id="nav-link-list" href="../aboutme.php">ABOUT ME</a></li>
                <li id="nav-list-solo"><a id="nav-link-list" href="../modules.php">MODULES</a></li>
                <li id="nav-list-solo"><a id="nav-link-list" href="../contact.php">CONTACT ME</a></li>
                <li id="nav-list-solo"><a id="nav-link-list" href="../admin.php">ADMIN</a></li>
            </ul>
        </div>
        <div id="nav-social">
            <div id="facebook">
                <a href="https://pt-pt.facebook.com" target="_blank"><img src="../vectors/facebooklogo.png" ; height=30px; width=30px; /></a>
            </div>
            <div id="instagram">
                <a href="https://www.instagram.com" target="_blank"><img src="../vectors/instagramlogo.png" ; height=30px; width=30px; /></a>
            </div>
            <div id="twitter">
                <a href="https://twitter.com/?lang=pt" target="_blank"><img src="../vectors/twitterlogo.png" ; height=30px; width=30px; /></a>
            </div>
            <div id="linkedin">
                <a href="https://pt.linkedin.com" target="_blank"><img src="../vectors/linkedinlogo.png" ; height=30px; width=30px; /></a>
            </div>
            
        </div>
        <div id="nav-contact"><h6 id="nav-contact-solo">francisco.laranjeira@hotmail.com <br> 966333555 </h6></div>
    </aside>
</body>

</html>