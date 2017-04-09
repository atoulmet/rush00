<?php

if (session_start() === false)
{
	    echo "Erreur inattendue\n";
		    exit ;
}

?>
<!DOCTYPE html>
<html>
	<head lang="fr">
		<meta charset="utf-8">
		<title>ft_amazon</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>

	<body>
		<?php include_once("header.php"); ?>

		<div class="products">
			<table>
				<tr>
					<?php

					include_once("get_connect.php");

					$cat = array();
					$categorie = '%'.$_GET['categorie'].'%';
					$db = get_connect("ft_amazon");
					$req_pre = mysqli_prepare($db, 'SELECT * FROM products WHERE categories LIKE ?');
					mysqli_stmt_bind_param($req_pre, "s", );
					mysqli_stmt_execute($req_pre);
					mysqli_stmt_bind_result($req_pre, $user['id'], $user['name'], $user['prix'], $user['categories']);
					while(mysqli_stmt_fetch($req_pre))
					{
					      echo '<td class="cell_prod">
						  			<span class="prod_name">'.$user['name'].'</span>

									<span class="prod_price">'.$user['prix'].'</span>
						  		</td>';
					}
					mysqli_stmt_close($req_pre);
					if (!mysqli_close($db))
						exit(mysqli_error($db));

					?>
				</tr>
			</table>
		</div>

		<?php include_once("footer.php"); ?>
	</body>
</html>
