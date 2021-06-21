<?php include("../server/configC.php"); ?>
<?php include("../form/formF.php"); ?>

<?php

function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

// VALIDAR DADOS

if (isset($_GET["id"])) {

    // entra id do modulo 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!checkIfEmpty($_POST["module"])) {
            temp("module");
        }

        if (!checkIfEmpty($_POST["project"])) {
            temp("project");
        }


        $insert = "INSERT INTO projects (IDmodule, module, project) VALUES (?,?,?)";




        if ($stmt = mysqli_prepare($connect, $insert)) {

            mysqli_stmt_bind_param($stmt, "iss", $_GET["id"], $_POST["module"], $_POST["project"]);


            if (mysqli_stmt_execute($stmt)) {
                header('Location: projectsTable.php?id=' . $_GET["id"] . '');
            } else {
                echo "Something it's Wrong"; //erro aqui
            }

            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($connect);
}


?>


<html>

<head>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/addmodule.css">
</head>

<body>
    <div id="addm">
        <div id="box">
            <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $_GET['id']; ?>" style="text-align: center;">
                <div>
                    Module:
                    <br>
                    <input type="text" name="module">
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (checkIfEmpty($_POST["module"])) {
                            printEmpty();
                        }
                    } ?>
                    <br>

                    Project:
                    <br>
                    <input type="text" name="project">
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (checkIfEmpty($_POST["project"])) {
                            printEmpty();
                        }
                    } ?> 
                    <br>
                </div>
                <div>
                    <input id="inputSubmit" type="submit" value="Submit">
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