<?php include "server\configC.php"; ?>

<!DOCTYPE html>
<html lang="eng">

<head>

	<title>FranciscoLaranjeira</title>
	<link rel="stylesheet" href="css/nav.css">
	<link rel="stylesheet" href="css/modules.css">
</head>

<body>
	<!-- PAGINA INICIAL-->
	<div id="modules">
		<div id="box">
			<?php
			$sql = "SELECT * FROM Courses";
			$result = mysqli_query($connect, $sql);
			if ($result) {
				$lineNumber = mysqli_num_rows($result);
				//tabela para apresentação de dados
				//cabeçalho
				if ($lineNumber > 0) { 								//se tenho resultados para apresentar

					echo "<table id ='table'>";
					echo "<tr>";
					echo "<th>Modules</th>";
					echo "<th>UFCD</th>";
					echo "<th>Grade</th>";
					echo "<th>INFO</th>";
					echo "<th>Edit</th>";
					echo "<th>View</th>";
					echo "<th>Delete</th>";
					echo "</tr>";


					//ciclo para imprimir lines da tabela da base de dados
					while ($line = mysqli_fetch_array($result)) {			//enquanto eu tiver dados
						echo "<tr>";

						echo "<td class='module-row'><a href='projects/projectsTable.php?id=" . $line['ID'] . "'>" . $line['Modules'] . "</td>";
						echo "<td>" . $line['UFCD'] . "</td>";
						echo "<td>" . $line['Grade'] . "</td>";
						echo "<td>" . $line['INFO'] . "</td>";

						echo "<td><a class='link' href='Modules/edit.php?id=" . $line['ID'] . "'>Edit Course</a></td>";
						echo "<td><a href='Modules/view.php?id=" . $line['ID'] . "'>View Course</a></td>";
						echo "<td><a href='Modules/delete.php?id=" . $line['ID'] . "'>Delete Course</a></td>";

						echo "</tr>";
					}

					echo "</table>";
				} else {
					echo "Não existem dados a apresentar";
				}

				// caso a coneção a base de dados der erro
			} else {
				echo "ERRO! Não consegui executar a consulta SQL " . mysqli_error($connect);
			}
			?>
		</div>
		<div id="addm">
			<a href="Modules/addC.php">Add Modules</a>
		</div>
	</div>
	<!-- MENU LADO DIREITO-->
	<aside id="nav-bot">
        <div id="nav-bot-solo">
            <div id="nav-foto"><img src="foto\foto.png"; height=100px; width=100px; /></div>
            <ul id="nav-list">
                <li id="nav-list-solo"><a id="nav-link-list" href="index.php">HOME</a></li>
                <li id="nav-list-solo"><a id="nav-link-list" href="aboutme.php">ABOUT ME</a></li>
                <li id="nav-list-solo"><a id="nav-link-list" href="modules.php">MODULES</a></li>
                <li id="nav-list-solo"><a id="nav-link-list" href="contact.php">CONTACT ME</a></li>
                <li id="nav-list-solo"><a id="nav-link-list" href="admin.php">ADMIN</a></li>
            </ul>
        </div>
        <div id="nav-social">
            <div id="facebook">
                <a href="https://pt-pt.facebook.com" target="_blank"><img src="vectors/facebooklogo.png" ; height=30px; width=30px; /></a>
            </div>
            <div id="instagram">
                <a href="https://www.instagram.com" target="_blank"><img src="vectors/instagramlogo.png" ; height=30px; width=30px; /></a>
            </div>
            <div id="twitter">
                <a href="https://twitter.com/?lang=pt" target="_blank"><img src="vectors/twitterlogo.png" ; height=30px; width=30px; /></a>
            </div>
            <div id="linkedin">
                <a href="https://pt.linkedin.com" target="_blank"><img src="vectors/linkedinlogo.png" ; height=30px; width=30px; /></a>
            </div>
            
        </div>
        <div id="nav-contact"><h6 id="nav-contact-solo">francisco.laranjeira@hotmail.com <br> 966333555 </h6></div>
    </aside>

</body>

</html>