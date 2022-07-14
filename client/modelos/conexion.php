<?php

class Conexion
{

	static public function conectar()
	{
		// $link = new PDO(
		// 	"mysql:host=localhost;dbname=miniprog_quinielas",
		// 	"miniprog",
		// 	"PlJ0zI0m;k1V[0"
		// );
		$link = new PDO(
			"mysql:host=localhost;dbname=miniprog_quinielas",
			"root",
			""
		);


		$link->exec("set names utf8");

		return $link;
	}

	static public function conexion_mysqli()
	{


		$mysqli = new mysqli("localhost", "miniprog", "", "miniprog_quinielas");

		$mysqli->query("SET NAMES utf8");

		return $mysqli;
	}
}
