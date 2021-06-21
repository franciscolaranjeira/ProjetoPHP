<?php include("../server/configC.php"); ?>
<?php include("../form/formF.php"); ?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!checkIfEmpty($_POST["username"])) {
        temp("username");
    }

    if (!checkIfEmpty($_POST["password"])) {
        temp("password");
    }

    if (!checkIfEmpty($_POST["email"])) {
        temp("email");
    }

    $insert = "INSERT INTO loginusers (username, password, email) VALUES (?,?,?)";

    if ($stmt = mysqli_prepare($connect, $insert)) {
        mysqli_stmt_bind_param($stmt, "sss", $_POST["username"], $_POST["password"], $_POST["email"]); //associa os campos do formulário com a minha consulta pré-feita em sql ($insert)
        if (mysqli_stmt_execute($stmt)) {
            header('location: ../admin.php');
        } else {
            echo "Something it's Wrong";
        }
    }

    mysqli_stmt_close($stmt); //obriga a terminar o INSERT
}

mysqli_close($connect); //estamos a fechar a ligação +a base de dados
?>

<html>

<head>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/createNew.css">
</head>

<body>
    <div id="createNew">
        <div id="box">
            <div id="Box-h1">
                <h3>New User</h3>
            </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="text-align: center;">

                Username:
                <br>
                <input type="text" name="username">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (checkIfEmpty($_POST["username"])) {
                        printEmpty();
                    }
                } ?>
                <br>

                Password:
                <br>
                <input type="text" name="password">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (checkIfEmpty($_POST["password"])) {
                        printEmpty();
                    }
                } ?>
                <br>

                Email:
                <br>
                <input type="text" name="email">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (checkIfEmpty($_POST["email"])) {
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
