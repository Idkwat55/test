<head>
  <title>Home | Sammlung</title>
  <meta name="description"content="Home page of Sammlung - All your Entertainemt needs in one place">
</head>

<?php if(!isset($HeaderInclu)){include 'header.php';
$HeaderInclu =true ;} ?>

<script>
  document.getElementById('home_btn').classList.add('actives');

</script>

<div id="stupid"></div>

<!--  font-->
<div class="cont">



  <section id='sec1' class="SectionBg " style="background-image:url('../Resources/images/0029.jpg');">
    <div class="font TitleMain">
      <h1>Novels</h1>
      <p> Try out our Novels Site! </p>
      <button id="btn1" class="SecBtn "   onclick="novl()">
        <p style="margin:0px; padding:2px;opacity:1;">Try Now!</p>
      </button>
    </div>
    <!--   main container 
 <div class="dummy_cont">
      <div class="cont_inside_cont   ">  card forms 
        <p class="abc"  >Novels</p>
          <div class="cont_inside_cont_img" >  image inside card 
            <img src="../Resources/images/002.jpg" onclick="novl()"  >
          </div>
    </div>
</div>-->
  </section>

  <section id='sec2' class="SectionBg " style="background-image:url('../Resources/images/0026.jpg');">
    <div class="font TitleMain">
      <h1>Media</h1>
      <p> Try out our Media Site! </p>
      <button id="btn2" class="SecBtn"  onclick="movi()">Try Out Now!</button>

      <p style="margin:0px; padding:2px;">Try Now!</p>
      </button>
    </div>


    <!-- <div class="dummy_cont">
      <div class="cont_inside_cont " >
        <p class="abc"> Media</p>
          <div class="cont_inside_cont_img">
            <img   src="../Resources/images/media/005.png"  onclick="movi()" >
          </div>
     </div> 
</div>-->
  </section>


  <section id="sec3" class="SectionBg " style="background-image:url('../Resources/images/0030.jpg');">

    <div class="font TitleMain">
      <h1>Manga</h1>
      <p> Try out our Manga Site! </p>
      <button id="btn2" class="SecBtn "  onclick="manga()">
        <p style="margin:0px; padding:2px;">Try Now!</p>
      </button>
    </div>



    <!-- <div class="dummy_cont">
  <div class="cont_inside_cont  " >
       <p class="abc">  Manga </p>
   <div class="cont_inside_cont_img"  onclick="manga()">
     
            <img src="../Resources/images/0015.jpg" preload>
   </div>
 </div>
</div>-->

  </section>


  <section id="sec4" class="SectionBg " style="background-image:url('../Resources/images/0028.jpg');">

    <div class="font TitleMain">
      <h1>Graphical</h1>
      <p> Try out our Media Site! </p>
      <button id="btn2" class="SecBtn " onclick="graphical()">
        <p style="margin:0px; padding:2px;">Try Now!</p>
      </button>
    </div>




    <!-- <div class="dummy_cont">
  <div class="cont_inside_cont "   >
          <span class="abc"> Graphical </span>
      <div class="cont_inside_cont_img" onclick="graphical()">
            <img src="../Resources/images/0018.jpg" preload>
      </div>
 </div>
</div>      -->
  </section>



  <section id="sec5" class="SectionBg " style="background-image:url('../Resources/images/0027.jpg');">


    <div class="font TitleMain">
      <h1>Educational</h1>
      <p> Try out our Educational Site! </p>
      <button id="btn2" class="SecBtn " onclick="EduMainPg()">
        <p style="margin:0px; padding:2px;">Try Now!</p>
      </button>
    </div>



    <!--<div class="dummy_cont">
  <div class="cont_inside_cont  " >
      <p class="abc">  Educational </p>
  <div class="cont_inside_cont_img"  onclick="EduMainPg()">
    
            <img src="../Resources/images/0020.jpg" preload>
  </div>
 </div>
</div>-->

  </section>

</div>


<?php include 'footer.php'; ?>