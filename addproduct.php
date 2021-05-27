<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

/* Drop down */
.dropbtn {
  background-color: #D9B08C;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}
  .dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}

</style>
</head>
<body>
    <form method="POST">
        <?php
                session_start()

            ?>
    <div class="container">
    <h2 align="center" ><font color="#116466"> ABK</h2>
    <p align="center">Please Fill in this Form to Sell a product.</p>
    <hr>

   <!-- <label for="productid"><b>Product Id</b></label>
    <input type="text" class="text-line" placeholder="Enter Your Name" name="prod_id" required>

     <label for="userid"><b>User Id</b></label>
    <input type="text" class="text-line" placeholder="Enter Your Name" name="uid" required> -->

    <label for="Productname"><b>Product name</b></label>
    <input type="text" class="text-line" placeholder="Enter Your Product Name" name="prod_name" required></textarea><br><br>

    <label for="Price"><b>Price</b></label>
    <input type="text" class="text-line" placeholder="Enter Amount" name="price" required>
    
    <label for="discount"><b>Discount</b></label>
    <input type="text" class="text-line" placeholder="Enter discount value" name="discount" required>
   

   <label for="subc">Choose a subcategory:</label>
    <select id="subc" name="subc">
    <option value=""> </option>
    <option value="DESKTOP COMPUTER">DESKTOP COMPUTER</option>
    <option value="LAPTOP">LAPTOP</option>
    <option value="MOBILE PHONE">MOBILE PHONE</option>
    <option value="MOBILE PHONE ACCESSO">MOBILE PHONE ACCESSO</option>
  </select>
  

    <p>
    <label for="image"><b>Upload Image</b></label>
    <input type="file" name="image"  value="image" /><br>
    </p>
   <?php
            if(isset($_POST['submit']))
            {
                if(isset($_SESSION['id']))
                {
                
                     try{
                        //$prod_id =$_POST['prod_id'];   
                        $uid=$_SESSION['id'];
                        $prod_name = $_POST['prod_name'] ;
                        $discount = $_POST['discount'];
                        $subcategory = $_POST['subc']  ;                  
                        $price =$_POST['price'];
                                              

                     //  $image = $_FILES['image']['tmp_name'];
                     //  $img = file_get_contents($image);

                         $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=abk','root','');
                       //echo "Connection is established...<br/>";
                         $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                        $subcategoryid = "SELECT SUBCAT_ID from subcategory where SUBCAT_NAME = '$subcategory' ";
                         $query=$dbhandler->query($subcategoryid);
                         
                         $r=$query->fetch();
                        //$sel =$dbhandler->query($subcategoryid);
                        
                         $sel = $r['SUBCAT_ID'];

                         $sql="INSERT INTO product(PROD_ID, SELLER_ID, SUBCAT_ID, PROD_NAME, DISCOUNT, PRICE, PICTURE) 
                                VALUES ('', '$uid', '$sel', '$prod_name', '$discount', '$price', 'img')";
                         $query=$dbhandler->query($sql);

                        // echo "data inserted";
                        }
                     catch(PDOException $e)
                     {
                             echo $e->getMessage();
                             die();
                     }
                }

                else
                {
                     echo '<script>
                                  {
                                      alert("you need to login first");
                                  }
                                  </script>';
                }
                        
            }
            
        ?>
    <button type="submit" class="registerbtn" name="submit" value="submit">Sell</button>
    <h4 align="center"><a href="home.php"><font color="dodgerblue">Home</font></a>&nbsp;
        <a href="index.php"><font color="#D9B08C">Login</font></a></h4>
</form>

</body>
</html>

        
    </body>
</html>

