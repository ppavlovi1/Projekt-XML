<?php

$username="";
$password="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$ans=$_POST;

	if (empty($ans["username"]))  {
        	echo "Korisnicki račun nije unesen.";
		
    		}
	else if (empty($ans["password"]))  {
        	echo "Lozinka nije unesena.";
		
    		}
	else {
		$username= $ans["username"];
		$password= $ans["password"];
	
		provjera($username,$password);
	}
}


function provjera($username, $password) {
	

	$xml=simplexml_load_file("users.xml");
	
	
	foreach ($xml->user as $usr) {
  	 	$usrn = $usr->username;
		$usrp = $usr->password;
		$usrime=$usr->ime;
		$usrprezime=$usr->prezime;
		if($usrn==$username){
			if($usrp == $password){
				echo "Prijavljeni ste kao $usrime $usrprezime";
				return;
				}
			else{
				echo "Netocna lozinka";
				return;
				}
			}
		}
		
	echo "Korisnik ne postoji.";
	return;
}
?>

