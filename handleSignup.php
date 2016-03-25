
<?php include("Header.php"); ?>

<?php

	$user = $_POST['user'];

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$username = $_POST['username'];
	$income = $_POST['income'];



	if($user == "person"){
		$gender = $_POST['gender'];
		$birthday = $_POST['birthday'];

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
		$poc = $_POST['poc'];
		$companyCat = $_POST['companyCat'];
		
		$signup = new Company(array(
		"username" => $username,
		"name" => $name,
		"email" => $email,
		"password" => $password,
		"income" => $income,
		"company_cat" => $companyCat,
		"PoC" => $poc));

	}


	echo "Successfully added!";

	

	//header("Location: /");

?>