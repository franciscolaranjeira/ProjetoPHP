<?php include("../server/configC.php"); ?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Delete Module</title>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/deleteC.css">
</head>

<body>
    <div id="deleteC">
        <div id="box">
            <h3>
                You will Delete the following Module!
            </h3>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="id" value='<?php echo $_GET["id"] ?>'>
                <h4>
                    Are you sure?
                </h4>
                <p>
                    <input type="submit" value="Yes">
                    <p>
                    <a href="../modules.php">No</a>
                </p>
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
//Verifica se a submissão foi efetuada através do método POST

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $delete = "DELETE FROM courses WHERE id = ?";

    //se consegui configurar corretamente a minha consulta pré-feita

    if ($stmt = mysqli_prepare($connect, $delete)) {

        //associa os campos do formulário com a minha consulta pré-feita em sql ($delete)
        mysqli_stmt_bind_param($stmt, "i", $_POST["id"]);

        if (mysqli_stmt_execute($stmt)) { //se executei o DELETE
            header('location: ../modules.php');
        } else {
            echo "Something it's Wrong";
        }
    }

    mysqli_stmt_close($stmt);
}
mysqli_close($connect); //estamos a fechar a ligação à base de dados
?>