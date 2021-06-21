<?php include("../server/configC.php"); ?>
<?php include("../form/formF.php"); ?>

<?php
$project = "";
$idModule = "";

function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}



// id = IDp tabela dos trabalhos
// idm = IDmodulos tabela dos modulos


if (isset($_GET["id"])) {   //COLOCA OS DADOS NO FORM
    $select = "SELECT project FROM projects WHERE IDp = ?";

    if ($stmt = mysqli_prepare($connect, $select)) {
        mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 1) {
                $line = mysqli_fetch_array($result);
                $project = $line["project"];
            } else {
                echo "Something went wrong!!";
            }
        }
    } else {
        echo "Something went wrong, try later";
    }
    // ACABA O SELECT




} else {    //ALTERAÇÃO DADOS NA BASE DE DADOS

    //selecionar o id do modulo
    $select = "SELECT IDmodule FROM projects WHERE IDp = ?";

    if ($stmt = mysqli_prepare($connect, $select)) {
        mysqli_stmt_bind_param($stmt, "i", $_POST["id"]);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
        }
        if (mysqli_num_rows($result) == 1) {
            $line = mysqli_fetch_array($result);
            $idModule = $line["IDmodule"];
        } else {
            echo "Something is wrong, try later!";
        }
    }

    if (isset($_POST["id"])) {

        //validação
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!checkIfEmpty($_POST["project"])) {
                temp("project");
            }
            //update dados
            $update = "UPDATE projects SET project = ? WHERE IDp = ?";
            if ($stmt = mysqli_prepare($connect, $update)) {
                mysqli_stmt_bind_param($stmt, "si", $_POST["project"], $_POST["id"]);
                if (mysqli_stmt_execute($stmt)) {
                    header("Location: projectsTable.php?id=" . $idModule);
                } else {
                    echo "Something went wrong!";
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($connect);
        }
    }                   // ACABA O UPDATE

}
?>

<html>

<head>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/moduleEdit.css">
</head>

<body>
    <div id="editC">
        <div id="box">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="text-align: center;">
                <div id="form">
                    Project:
                    <br>
                    <input id="inputTexto" type="text" name="project" value="<?php echo $project; ?>">
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (checkIfEmpty($_POST["project"])) {
                            printEmpty();
                        }
                    } ?>
                    <br>
                </div>
                <div id="inputSubmit">
                    <input type="hidden" name="id" value='<?php echo $_GET["id"] ?>'>
                    <input type="submit" value="Submit">
                </div>

            </form>
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