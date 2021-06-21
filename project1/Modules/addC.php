<?php include("../server/configC.php"); ?>
<?php include("../form/formF.php"); ?>
<html>

<head>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/addC.css">
</head>

<body>
    <div id="addC">
        <div id="box">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="text-align: center;">

                Modules:
                <br>
                <input type="text" name="Modules">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (checkIfEmpty($_POST["Modules"])) {
                        printEmpty();
                    }
                } ?>
                <br>

                UFCD:
                <br>
                <input type="text" name="UFCD">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (checkIfEmpty($_POST["UFCD"])) {
                        printEmpty();
                    }
                } ?>
                <br>

                Grade:
                <br>
                <input type="text" name="Grade">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (checkIfEmpty($_POST["Grade"])) {
                        printEmpty();
                    }
                } ?>
                <br>
                INFO:
                <br>
                <input type="text" name="INFO">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (checkIfEmpty($_POST["INFO"])) {
                        printEmpty();
                    }
                } ?>
                <br>

                <input type="submit" value="Submit">

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

<?php
// VALIDAR DADOS

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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

    //consulta pré-feita

    $insert = "INSERT INTO Courses (Modules, Grade, UFCD, INFO) VALUES (?,?,?,?)";

    //se consegui configurar corretamente a minha consulta pré-feita

    if ($stmt = mysqli_prepare($connect, $insert)) {
        mysqli_stmt_bind_param($stmt, "siss", $_POST["Modules"], $_POST["Grade"], $_POST["UFCD"], $_POST["INFO"]); //associa os campos do formulário com a minha consulta pré-feita em sql ($insert)
        if (mysqli_stmt_execute($stmt)) { //se executei o INSERT
            header('location: ../modules.php'); //reencaminha para uma dada página
        } else {
            echo "Something it's Wrong";
        }
    }

    mysqli_stmt_close($stmt); //obriga a terminar o INSERT
}

mysqli_close($connect); //estamos a fechar a ligação +a base de dados
?>