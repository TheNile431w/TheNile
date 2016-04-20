

<?php include("htmlHeader.php"); ?>
    <?php include("htmlTopbar.php"); ?>

<html>
  <!--
    Modified from the Debian original for Ubuntu
    Last updated: 2014-03-19
    See: https://launchpad.net/bugs/1288690
  -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>TheNile Main</title>
  </head>
  <body>
    <center><h1>Signup to The Nile</h1></center>

    <!-- Will add a nice modal to specify if its a person or a company. for now only person -->

    <form onsubmit="return validateForm();" method="post" id="form">
      <br>
      <center>
      <h3>Are you registering as a person or as a company?</h3>
      <br>
      <input type="radio" onchange="displayQuestions('person')" id="person" name="user" value="person" />
      Person
      <br>
      <input type="radio" onchange="displayQuestions('company')" id="company" name="user" value="company"/>
      Company
      <br>
      <br>
      
      <label>Enter your name:</label><input type="text" id="name" name="name" placeholder="Enter name"/>
      <br>
      <br>
      <label>Enter your email: </label><input type="text" id="email" name="email" placeholder="Enter email"/>
      <br>
      <br>
      <label>Enter your username: </label><input type="text" id ="username" name="username" placeholder="Enter username"/>
      <br>
      <br>
      <label>Enter your password: </label><input type="password" id ="password" name="password" placeholder="Enter password"/>
      <br>
      <br>
      <label>Enter your income: </label><input type="int" id="income" name="income" placeholder="Enter income"/>
      <br>
      <br>
      <div id="genderQuestion" style="display:none">
      <label>Enter your gender: </label>
      
      <br>
      <input type="radio" id="male" name="gender"/>
      Male
      <br>
      <input type="radio" id="female" name="gender"/>
      Female
      <br>
      <input type="radio" id="other" name="gender"/>
      Other
      <br>
      <br>
      </div>
      <!-- May add a jquery plugin datePicker -->
      <div id="bdayQuestion" style="display:none">
      <label>Enter your birthday: </label><input type="text" id="birthday" name="birthday" placeholder="1995/05/01"/>
      <br>
      <br>
      </div>
       <div id="pocQuestion" style="display:none">
      <label>Enter your Point of Contact(username) </label><input type="text" id="poc" name="poc" placeholder="kevinco26"/>
      <br>
      <br>
      </div>
       <div id="companyCatQuestion" style="display:none">
      <label>Enter your Company Category: </label><input type="text" id="companyCat" name="companyCat" placeholder="Software"/>
      <br>
      <br>
      </div>

      <input type="submit" value="Sign up!">

      
    </form>
    </center>
  </body>
</html>

<script>
function displayQuestions(id){

  if(id == 'person')
  {
    document.getElementById("genderQuestion").style.display="initial";
    document.getElementById("bdayQuestion").style.display="initial";
    document.getElementById("companyCatQuestion").style.display="none";
    document.getElementById("pocQuestion").style.display="none";



  }
  else
  {
    document.getElementById("genderQuestion").style.display="none";
    document.getElementById("bdayQuestion").style.display="none";
    document.getElementById("companyCatQuestion").style.display="initial";
    document.getElementById("pocQuestion").style.display="initial";


  }
}
function validateForm()
{
	if(document.getElementById("name").value=="" || document.getElementById("email").value=="" || document.getElementById("username").value=="" || document.getElementById("password").value=="" ||document.getElementById("income").value=="")
	{
		alert("Please complete all the fields");
		return false;
	}
  var queryString = $('#formID').serialize(); 

  var username = document.getElementById("username").value;
  jQuery.ajax({
      url: "/handleSignup.php?verify="+username,
      error: function(data){
       
      },
      success: function(data){

        if(data == 1){
          alert("Username exists");
          return false;
        }
        else{
          jQuery.ajax({
          url: "/handleSignup.php?insert="+queryString,
          error: function(data){
           
          },
          success: function(data){

            alert("Account created!!");

            window.location.href = "/viewProfile.phps";
            // go to my profile.
            }     
          });
        } 
      }
  });


return false;
}
</script>