<?php include ("NavBar.php");
 include ("function.php");

 $userid = $_SESSION["user_id"];
 $conn = require __DIR__ .  "/db_conn.php";

 $sql = sprintf("SELECT * FROM user
           WHERE user_id = $userid");
 $result = $conn->query($sql);

 $user = $result->fetch_assoc();
?>

<div>
      <h2><u>Your Details</u></h2>
      <h3>Name: <?php echo $user["first_name"] . $user["last_name"]?></h3>
      <h3>Email: <?php echo $user["email"]?></h3>
      <h3>Account type: <?php echo get_access_level($user["user_access_level"])?></h3>
</div>
<div>
    