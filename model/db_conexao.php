<?php
	define ('SERVIDOR',"localhost");
	define ('USERNAME',"root");
	define ('PASSWORD',"");
	define ('DBNOME',"duval");

	$conector = new mysqli(SERVIDOR, USERNAME, PASSWORD, DBNOME);
?>