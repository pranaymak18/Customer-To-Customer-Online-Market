<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #116466;
}

* {
  box-sizing: border-box;
  
}
form {
  
  border-radius: 25px;
  background: #D1E8E2;
  position: relative;
  margin: 0 auto;
  padding: 20px 20px 20px;
  width: 500px;
}
/* Add padding to containers */
.container {
  border-radius: 10px;
  padding: 16px;
}

/* Full-width input fields */


input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  box-sizing: border-box;
}
/* Overwrite default styles of hr */
hr {
  border: 1px solid #2C3531;
  margin-bottom: 25px;
}

/* Set a style for the submit button */

button {
  background-color: #D9B08C;
  color: grey;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
    background-color: #FFCB9A;
    color:black;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.login {
  background-color: #f1f1f1;
  text-align: center;
}
.text-line {
    background-color: transparent;
    color: black;
    outline: none;
    outline-style: none;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: solid #D9B08C 2px;
    padding: 3px 10px;
}
</style>
</head>
<body>

<form method="POST">
  <div class="container">
    <h2 align="center" ><font color="#116466"> Aao..Becho..Kharido! </h2>
    <p align="center">Please Fill in this Form to create an account.</p>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" class="text-line" placeholder="Enter Your Username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" class="text-line" placeholder="Enter your Password" name="password" required>

    <label for="fname"><b>First Name</b></label>
    <input type="text" class="text-line" placeholder="Enter Your Username" name="fname" required>

    <label for="lname"><b>Lirst Name</b></label>
    <input type="text" class="text-line" placeholder="Enter Your Username" name="lname" required>

    <label for="city"><b>City</b></label>
    <input type="text" class="text-line" placeholder="Enter Your Username" name="city" required>
   
    <label for="State"><b>State</b></label>
    <input type="text" class="text-line" placeholder="Enter Your Username" name="state" required>
   
    <label for="pin"><b>Pin code</b></label>
    <input type="text" class="text-line" placeholder="Enter Your Username" name="pin" required>



    <label for="mobileno"><b>Mobile-No</b></label>
    <input type="text" class="text-line" placeholder="Enter Your Mobile-No" name="mobileno" required>
    
    <label for="Email"><b>Email</b></label>
    <input type="text" class="text-line" placeholder="Enter Your Email" name="email" required>

    <?php
            if(isset($_POST['submit']))
            {
               try{
                   
                   $username=$_POST['username'];
                   $password=$_POST['password'];


                   $mobileno=$_POST['mobileno'];
                   $email=$_POST['email'];

                   $fname = $_POST['fname'];
                   $lname = $_POST['lname'];
                   $city = $_POST['city'];
                   $state = $_POST['state'];
                   $pin = $_POST['pin'];

                    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=abk','root','');
                  //  echo "Connection is established...<br/>";
                    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $last_id = $dbhandler->query("SELECT MAX(P_ID) FROM personal_detail");
                    $r = $last_id->fetch();
                    $sel = $r['MAX(P_ID)'];

                    $int = (int) filter_var($sel,FILTER_SANITIZE_NUMBER_INT);
                    $int = $int + 1;
                    $pid = 'P'.$int;

                    echo "New record created successfully. Last inserted ID is: " . $pid;

                    $sql="INSERT INTO `user_info`( user_id,P_ID ,PASSWORD ) VALUES ('$username','$pid','$password')";
                    $query=$dbhandler->query($sql);

                    $sql="INSERT INTO `personal_detail`( P_ID,FIRST_NAME,LAST_NAME,EMAIL,PHN_NO1,CITY,STATE ,PIN_CODE )
                     VALUES ('$pid','$fname','$lname','$email','$mobileno','$city','$state','$pin')";
                    $query=$dbhandler->query($sql);
                    
                    echo "<h3 align='center' ><font color='green'>You Are Rgistered Successfully</font></h3>";
                }
                catch(PDOException $e)
                {
                        echo $e->getMessage();
                        die();
                }
                        
            
            }
        ?>
    <button type="submit" class="registerbtn" name="submit" value="submit">Register</button>
    <p>Already have an account? <a href="index.php">Login</a>.</p>
  </div></font>
</form>

</body>
</html>

        
    </body>
</html>


