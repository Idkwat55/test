<?php
if (!isset($HeaderInclu)) {
  include 'header.php';
  $HeaderInclu = true;
}

if (!isset($_COOKIE['token']) || !isset($_COOKIE['valid']) || $_COOKIE["valid"] === false) {

  ?>

  <script>
    document.getElementById('account').style.setProperty('--acc-sign-blr', ' #4d4dff');
    window.onload = function () {
      document.getElementById('user').focus();
    }
  </script>

  <div class='accountClCenter'>
    <form autocomplete='on' id='myform' class='accountCl font' onsubmit='submitted(); return false; '>
      <div>
        <label for='user'>User Name:</label><span class="redText">*</span>
        <input class='inputBar' type='text' id='user' autocomplete='username' required name='user'>
      </div>

      <div>
        <label for='pass'>Password:</label> <span class="redText">*</span>
        <input class='inputBar' type='password' id='pass' autocomplete='password' required name='pswd'>
      </div>

      <div>
        <label for='email'>Email:</label>
        <input class='inputBar' type='email' id='email' autocomplete='email' name='email'>
      </div>

      <div>
        <button type='submit' class='signInBtn font' id="SignIn" name='submit' value='Sign In'>Sign In</button>
        <button type='submit' class='signUpBtn font' id="SignUp" name='submit' value='Sign Up'>Sign Up</button>
      </div>
    </form>




    <div id='res'>

    </div>

    <?php
} elseif (isset($_COOKIE['token']) && isset($_COOKIE['valid']) && in_array($_COOKIE["valid"], array('1', 1, true))) {

  header("Location: UserPage.php");

} else {
  exit('ERR_FailedToSetEquivalen-01');
}

include 'footer1.php';
?>