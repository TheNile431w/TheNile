
<?php include("Header.php"); ?>
<?php include("MySQL.php");?>

<?php


	if(isset($_GET["verify"])){

		$username = $_GET["verify"];
		 $db = new database();

 		 $r = $db->query('SELECT * FROM User WHERE username="'.$username.'"');

 		 // check if exists
 		 if($r->num_rows == 1) {
 		 	echo 1;
 		 }
 		 else
 		 {
 		 	echo 0;
 		 }
	}

	// $user = $_POST['user'];

	// $name = $_POST['name'];
	// $email = $_POST['email'];
	// $password = $_POST['password'];
	// $username = $_POST['username'];
	// $income = $_POST['income'];



	// if($user == "person"){
	// 	$gender = $_POST['gender'];
	// 	$birthday = $_POST['birthday'];

	// 	$signup = new Person(array(
	// 	"username" => $username,
	// 	"name" => $name,
	// 	"email" => $email,
	// 	"password" => $password,
	// 	"income" => $income,
	// 	"gender" => $gender,
	// 	"bday" => $birthday));

		
	// }
	// else
	// {
	// 	$poc = $_POST['poc'];
	// 	$companyCat = $_POST['companyCat'];
		
	// 	$signup = new Company(array(
	// 	"username" => $username,
	// 	"name" => $name,
	// 	"email" => $email,
	// 	"password" => $password,
	// 	"income" => $income,
	// 	"company_cat" => $companyCat,
	// 	"PoC" => $poc));

	// 	echo $signup;

	// }


	// echo "Successfully added!";

	

	//header("Location: /");

?>