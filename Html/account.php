<?php
if (!isset($HeaderInclu)) {
  include 'header.php';
  $HeaderInclu = true;
}
 
if (!isset($_COOKIE['token']) || !isset($_COOKIE['valid']) || $_COOKIE["valid"] === false) {
  echo "<script>
  document.getElementById('account').style.setProperty('--acc-sign-blr', ' #4d4dff');

</script>

<dev class='accountClCenter'>
  <form id='myform' class='accountCl font' onsubmit='submitted(); return false;'>
  User Name: <input class='inputBar' type='text' id='user' autocomplete='username' required name='user'>
  Password: <input class='inputBar' type='password' id='pass' autocomplete='password' required name='pswd'>
  
    <input type='submit' class='signInBtn font' name='submit'  value='Sign In'>
    <input type='submit' class='signUpBtn font' name='submit' value='Sign Up'>
  </form>



  <dev id='res' class='responseBox1'></dev>

  </dev>";
} elseif (isset($_COOKIE['token']) && isset($_COOKIE['valid']) && $_COOKIE["valid"] === (true || 1 || '1' )) {
  echo " sdtdesdgrdfdgrd "; 
  echo " <script> alert('asfasaf')</script>";
  header("Location : UserPage.php");
  
}else{
  echo "adsfygh---------------";
}

include 'footer1.php';
?>