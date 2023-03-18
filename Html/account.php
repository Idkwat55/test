<?php 
include 'header.php' ?>
<script>
document.getElementById('account').style.setProperty('--acc-sign-blr',' #4d4dff');

</script>
<dev >
<form class="accountCl font"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	
	User Name <input class="inputBar" type="text" autocomplete="user" name="user"  >
	Password <input  class="inputBar" type="password" name="pswd">
	<input type="submit" class="signInBtn" name="submit" value="Sign in">
</form>
</dev>
 


<?php include 'footer1.php' ?>