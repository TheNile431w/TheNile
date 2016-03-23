<?php

include("htmlHeader.php");

?>

<title>TheNile Main</title>
</head>

<body>
<?php

include("htmlTopbar.php");

?>
    <h1>Welcome to The Nile! *insert catchy quote here*</h1>

    <form action="test.php" method="post">
      <label>Enter your name:</label><input type="text" name="name" placeholder="Enter name"/>
      <br>
      <br>
      <label>Enter your email: </label><input type="text" name="email" placeholder="Enter email"/>
      <br>
      <br>
      <label>Enter your username: </label><input type="text" name="username" placeholder="Enter username"/>
      <br>
      <br>
      <label>Enter your password: </label><input type="password" name="password" placeholder="Enter password"/>
      <br>
      <br>
      <label>Enter your income: </label><input type="int" name="income" placeholder="Enter income"/>
      <br>
      <br>
      <input type="submit"/ value="Submit Form!">

      
    </form>
  </body>
</html>

