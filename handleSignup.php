
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

	if(isset($_GET["verifyRate"])){

		$username = $_GET["verifyRate"];
		 $db = new database();

 		 $r = $db->query('SELECT * FROM UserRating WHERE rater="'.$username.'"');

 		 // check if exists
 		 if($r->num_rows == 1) {
 		 	echo 1;
 		 }
 		 else
 		 {
 		 	echo 0;
 		 }
	}

	if(isset($_GET["insert"])){

		$user = $_GET['user'];

		$name = $_GET['name'];
		$email = $_GET['email'];
		$password = $_GET['password'];
		$username = $_GET['username'];
		$income = $_GET['income'];



		if($user == "person"){
			$gender = $_GET['gender'];
			$birthday = $_GET['birthday'];

			$signup = new Person(array(
			"username" => $username,
			"name" => $name,
			"email" => $email,
			"password" => $password,
			"income" => $income,
			"gender" => $gender,
			"bday" => $birthday));

			
		}
		else
		{
			$poc = $_GET['poc'];
			$companyCat = $_GET['companyCat'];
			
			$signup = new Company(array(
			"username" => $username,
			"name" => $name,
			"email" => $email,
			"password" => $password,
			"income" => $income,
			"company_cat" => $companyCat,
			"PoC" => $poc));



		}
	}

	if(isset($_GET["rate"])){
		$rater = $_GET['rate'];

		$ratee = $_GET['ratee'];
		$rating = $_GET['rating'];
		$description = $_GET['description'];

        $n = new UserRating(array(
                'rater' => $rater,
                'ratee' => $ratee,
                'rating' =>$rating,
                'description' => $description));

	}

	// echo "Successfully added!";

	

	//header("Location: /");

?>