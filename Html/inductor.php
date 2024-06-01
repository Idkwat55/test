<?php if(!isset($HeaderInclu)){include 'header.php';
$HeaderInclu =true ;}?>
 
<form id='myform' class='  font' onsubmit='submitte(); return false;'>
   Inductance <input class='inputBar' type='text' id='user'  ' required name='inductance'> <br>

 permeability <input class='inputBar' type='password' id='pass'   required name='permeability'><br> 

  number of turns<input class='inputBar' type='password' id='pass'  required name='turns'> <br>

  Area <input class='inputBar' type='password' id='pass'  required name='area'><br>
  
  length<input class='inputBar' type='password' id='pass'  required name='length'> <br>

    <input type='submit' class='signInBtn font' name='submit'  value='Calculate'> <br>
</form>

    </div>
<div>
    <p id="Result"></p>
</div>
<script>
        function submitte(){
            var newReq = new XMLHttpRequest();
var showRes =document.getElementById('Result');
           showRes.innerHTML = this.responseText;
           
        }
    </script>
 <?php include 'footer1.php'?>