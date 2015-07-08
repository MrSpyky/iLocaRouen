<!DOCTYPE html>
<html>
    <head>
        <title>Liste meubles</title>
        <meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="liste_meubles.css">
    </head>
    <body>
        <h2>Liste de meubles</h2>
		
        <div id="display">
			<table style="width:100%">
				<tr>
					<th>ID</th>
					<th>Meuble</th> 
					<th>Photo 1</th>
					<th>Photo 2</th>
					<th>Photo 3</th>
					<th>Rented (bool)</th>
				</tr>
				<tr>
					<td>Eve</td>
					<td>Jackson</td> 
					<td>94</td>
				</tr>
			</table>
        </div>
		
		<div id="test">
		<?php
			echo "Test nul";
		?>
			<?php 
				
				include('class_MeubleManager.php');
				include('class_Meuble.php');
				include('function_returnDb.php');
				$meubleTest = new  Meuble([
				"type" => "Frigo",
				"photo1" => "URLphoto1",
				"photo2" => "URLphoto2",
				"photo3" => "URLphoto3",
				"rentedBy" => "NO ONE"
				]);
				echo "Va te faire enculer";
				
				$db = returnDb();
				$manager = new MeubleManager($db);
				
				$manager-> add($meubleTest);
			?>
		</div>

		<div id="add">
			<form method="post" action="add_meuble.php">
				<input type="text" name="meuble" id="meuble"/><label for="meuble">Quel type d'objet est-ce ?</label>
			</form>
		</div>
    </body>
</html>
