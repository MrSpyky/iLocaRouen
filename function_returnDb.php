<?php

			function returnDb() {
				try
				{
					$db = new PDO('mysql:host=localhost;dbname=locarouen', 'root', ''); 
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
				catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
				}
				
				return $db;
			}
?>
