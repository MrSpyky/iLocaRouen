<!DOCTYPE html>
<html>
    <head>
        <title>Liste meubles</title>
        <meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="liste_meubles.css">
    </head>
    <body>
	
	<?php
			// On enregistre notre autoload.
			function chargerClasse($classname)
			{
			  require 'class_'.$classname.'.php';
			  echo 'CLASS CHARGEE :      ';
			  echo 'class_'.$classname.'.php <br/>';
			}

			spl_autoload_register('chargerClasse');
			
			require('function_returnDb.php');
			require ('function_listRow.php');
		?>
        <h2>Liste de meubles</h2>
		
        <div id="display">
			<table style="width:100%">
				<tr>
					<th>ID</th>
					<th>Meuble</th> 
					<th>Photo 1</th>
					<th>Photo 2</th>
					<th>Photo 3</th>
					<th>Rented By</th>
				</tr>				
				<?php 
				$donnees = [
				"id" => 2,
				"type" => "Frigo",
				"photo1" => "URLphoto1 MODIFIE",
				"photo2" => "URLphoto2",
				"photo3" => "URLphoto3",
				"rentedby" => 12
				];
				$meubleTest = new Meuble($donnees);
				$arrayMeubles = [];
				$db = returnDb();
				$manager = new MeubleManager($db);
				$arrayMeubles = $manager->getList();
				foreach($arrayMeubles as $meubleSimple) {
					listRow($meubleSimple);
				}
				
				
				?>
			</table>
        </div>
		
		<div id="addMeuble">
			<form method="post" action="liste_meubles.php">
				<table>
					<tr>
						<th>ID</th>
						<th>Meuble</th> 
						<th>Photo 1</th>
						<th>Photo 2</th>
						<th>Photo 3</th>
						<th>Rented By</th>
					</tr>	
					
					<tr>
						<td>
							ID autofilled
						</td>
						<td>
							<input type="text" name="type" placeholder="type"/>
						</td>
						<td>
							<input type="text" name="photo1" placeholder="URL photo 1"/>
						</td>
						<td>
							<input type="text" name="photo2" placeholder="URL photo 2"/>
						</td>
						<td>
							<input type="text" name="photo3" placeholder="URL photo 3"/>
						</td>
						<td>
							<input type="number" name="rentedBy" placeholder="Loué par (0=personne)"/>
						</td>
						
					<tr/>
					
				</table>
				<input type="submit" value="Ajouter" name="add"/>
				
				<?php
					if(!empty($_POST['type']) and !empty($_POST['rentedBy']) and !empty($_POST['photo1'])) {
						$db=returnDb();
						$manager = new MeubleManager($db);
						$donnees = [
						'type' => $_POST['type'],
						'photo1' =>$_POST['photo1'],
						'photo2' =>$_POST['photo2'],
						'photo3' =>$_POST['photo3'],
						'rentedBy' =>$_POST['rentedBy'] ];
						
						$meubleToAdd = new Meuble($donnees);
						$manager->add($meubleToAdd);
						$url="http://localhost/LocaRouenWampProject/liste_meubles.php";
						header("Refresh: 1;url=$url");
					}
				?>
			</form>
		</div>

		<div id="add">
			<form method="post" action="add_meuble.php">
				<input type="text" name="meuble" id="meuble"/><label for="meuble">Quel type d'objet est-ce ?</label>
			</form>
		</div>
    </body>
</html>
