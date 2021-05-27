   
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background: #116466;
}
form {
  
  border-radius: 25px;
  background: #D1E8E2;
  position: relative;
  margin: 0 auto;
  padding: 20px 20px 20px;
  width: 500px;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  box-sizing: border-box;
}

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

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  color: white;
  background-color: grey;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  border-radius: 10px;
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
a {
  color: dodgerblue;
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


<form method="post">
    <h2 align="center" ><font color="#116466">ABK</h2>
  <div class="imgcontainer">
    <img src="static/login.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" class="text-line" placeholder="Enter Username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" class="text-line" placeholder="Enter Password" name="password" required>

     <?php
            if(isset($_POST['submit']))
            {
               try{
                    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=abk','root','');
                  //  echo "Connection is established...<br/>";
                    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $query=$dbhandler->query('SELECT USER_ID, PASSWORD from user_info');
                    while($r=$query->fetch())
                    {
                            if($r['USER_ID']===$_POST['username'] && $r['PASSWORD']===$_POST['password'])
                            {
                                session_start();
                                $_SESSION['id'] = $r['USER_ID'];
                                header( "Location:http://localhost/abk/home.php" );
                            }

                    }
                    echo "<h3 align='center' ><font color='red'>Please Enter Correct Username Or Password</font></h3>";
                    
                }
                catch(PDOException $e)
                {
                        echo $e->getMessage();
                        die();
                }
                        
            
            }
        ?>
    
    <button type="submit" name="submit" value="submit">Login</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
      <button type="reset" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span></font>&nbsp;
      <a href="register.php"><font color="#D9B08C" >Register</font></a>
  </div>
</form>
        
    </body>
</html>
