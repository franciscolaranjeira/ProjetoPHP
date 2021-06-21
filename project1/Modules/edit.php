<?php include("../server/configC.php"); ?>
<?php include("../form/formF.php"); ?>

<?php

$module = $ufcd = $grade = $info = "";


if (isset($_GET["id"])) {
    // OBTER  DADOS
    $select = "SELECT Modules, UFCD, Grade, INFO FROM  courses WHERE ID = ?";

    if ($stmt = mysqli_prepare($connect, $select)) {
        mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                $line = mysqli_fetch_array($result);
                $module = $line["Modules"];
                $ufcd = $line["UFCD"];
                $grade = $line["Grade"];
                $info = $line["INFO"];
            } else {
                echo "Something went wrong!!";
            }
        }
    } else {
        echo "Something went wrong, try later";
    }
} else {
    if (isset($_POST["id"])) {
        // alterar dados
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //validar dados


            if (!checkIfEmpty($_POST["Modules"])) {
                temp("Modules");
            }

            if (!checkIfEmpty($_POST["UFCD"])) {
                temp("UFCD");
            }

            if (!checkIfEmpty($_POST["Grade"])) {
                temp("Grade");
            }

            if (!checkIfEmpty($_POST["INFO"])) {
                temp("INFO");
            }

            $update = "UPDATE courses SET Modules = ?, UFCD = ?, Grade = ?, INFO = ? WHERE ID = ?";

            if ($stmt = mysqli_prepare($connect, $update)) {
                mysqli_stmt_bind_param($stmt, "siisi", $_POST["Modules"], $_POST["UFCD"], $_POST["Grade"], $_POST["INFO"], $_POST["id"]);

                if (mysqli_stmt_execute($stmt)) {
                    header('location: ../modules.php');
                } else {
                    echo "Something went wrong!";
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($connect);
        }
    }
}
?>

<html>

<head>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/editC.css">
</head>

<body>
    <div id="editC">
        <div id="box">

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="text-align: center;">

                <div>
                    Modules:
                    <br>
                    <input type="text" name="Modules" value="<?php echo $module; ?>">
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (checkIfEmpty($_POST["Modules"])) {
                            printEmpty();
                        }
                    } ?>
                    <br>
                </div>

                <div>
                    UFCD:
                    <br>
                    <input type="text" name="UFCD" value="<?php echo $ufcd; ?>">
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (checkIfEmpty($_POST["UFCD"])) {
                            printEmpty();
                        }
                    } ?>
                    <br>
                </div>

                <div>
                    Grade:
                    <br>
                    <input type="text" name="Grade" value="<?php echo $grade; ?>">
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (checkIfEmpty($_POST["Grade"])) {
                            printEmpty();
                        }
                    } ?>
                    <br>
                </div>

                <div>
                    INFO:
                    <br>
                    <input type="text" name="INFO" value="<?php echo $info; ?>">
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (checkIfEmpty($_POST["INFO"])) {
                            printEmpty();
                        }
                    } ?>
                    <br>
                </div>

                <div>
                    <input type="hidden" name="id" value='<?php echo $_GET["id"] ?>'>
                    <input type="submit" value="Submit">
                    <br>
                    <a href="../modules.php">No</a>
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