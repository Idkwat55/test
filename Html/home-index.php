<head>
<title>Home | Sammlung</title>
</head>
 
 <?php include 'header.php';?>

<script>
document.getElementById('home_btn').classList.add('actives');

</script>

<div id="stupid"></div>
 
      <!--  font-->     
<div class="cont">    

 

<section>                   
 <!-- main container -->
 <div class="dummy_cont">
      <div class="cont_inside_cont   "><!-- card forms -->
 	     <p class="abc"  onclick="novl()">Novels</p>
          <div class="cont_inside_cont_img" ><!-- image inside card-->
            <img src="../Resources/images/0023.jpg" onclick="novl()"  >
          </div>
    </div>
</div>
</section>

<section>
       <div class="dummy_cont">
      <div class="cont_inside_cont " >
 	     <p class="abc"> Media</p>
          <div class="cont_inside_cont_img" onclick="movi()">
            <img src="../Resources/images/003.jpg" >
          </div>
     </div>
</div>
</section>

<section>      
  <div class="dummy_cont">
  <div class="cont_inside_cont  " >
 	    <p class="abc">  Manga </p>
 	<div class="cont_inside_cont_img"  onclick="manga()">
 		
            <img src="../Resources/images/0015.jpg">
 	</div>
 </div>
</div>

</section>
<section>      
   <div class="dummy_cont">
  <div class="cont_inside_cont "   >
          <span class="abc"> Graphical </span>
      <div class="cont_inside_cont_img" onclick="graphical()">
            <img src="../Resources/images/0018.jpg">
      </div>
 </div>
</div>      
</section>

</div>
   
 
<?php include 'footer.php';?>

