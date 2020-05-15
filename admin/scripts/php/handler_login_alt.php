<?php
// Error message should ideally be $_SESSION based rather than URL based text. 
$error = 'Oops! The email and/or password you entered did not match. Please try again.';
$sql = "SELECT AdminPassword FROM admin WHERE AdminEmail = ? ";
$query_admin = $conn->prepare($sql);
$query_admin->bind_param('s', $email); 
$query_admin->execute();
/***
 * Now check password. The database password value should be ALREADY HASHED.
 ***/
if ($query_admin->num_rows === 1){
 $query_admin->store_result();
 $query_admin->bind_result($db_pwd);
 $query_admin->fetch();
 unset($query_admin); //cleanup. 
 //
 //
 if(password_verify($password, $db_pwd) === true){
  /***
   * Password's match. Load rest of row
   ***/
   $admin_retrieve = $conn->prepare(SELECT AdminID, AdminFirstName, AdminLastName FROM admin WHERE AdminEmail = ? AND AdminPassword = ?");
   $admin_retrieve->bind_param('ss',$email, $db_pwd);
   $admin_retrieve->execute();
   while($row = $query_admin->fetch_assoc()) {
        echo "id: " . $row["AdminID"]. " - Name: " . $row["AdminFirstName"]. " " . $row["AdminLastName"]. "<br>";
         }
   }
   else {
       /***
        * Password failed
        ***/  
       // Error message should ideally be session based rather than URL based text. 
       header("Location: https://www.yourwebsite.com/login.php?error=".urlencode($error));
       exit; 
       }
    }
     else {
        /***
         * Email failed
         ***/
        // Error message should ideally be session based rather than URL based text. 
        header("Location: https://www.yourwebsite.com/login.php?error=".urlencode($error));
        exit; 
    } 
?>