<?php  if(!isset($HeaderInclu)){include 'header.php';
$HeaderInclu =true ;} ?>
<?php
$ContineFlg = include 'verify.php';
if ($ContineFlg === (false || null)) {
    echo "<script>
    console.error('Sign In Error');
    </script>";
    exit;
}
?>


<div class="cont abc font">
   <div class="cont_inside_cont_upl">
      <p class="font_for_header"> Upload <strong> Videos</strong> Here <strong>:</strong></p>
      <form action="./upload_videos.php" method="post" enctype="multipart/form-data" id="upload">


         <input type="file" id="file"   name="file[]" required multiple>
         <input type="submit" id="submit" class="UplBtn" name="submit" value="Upload">

         <div class="bar">
            <span class="bar-fill" id="pb"><span class="bar-fill-text" id="pt"></span></span>
         </div>
         <div id="uploads" class="uploads">
            Uploaded file links will appear here.
         </div>
      </form>
   </div>

</div>

<div class="cont abc font">
   <div class="cont_inside_cont_upl">
      <p class="font_for_header"> Upload <strong> Other stuff</strong> Here <strong>:</strong></p>
      <form action="../Uploads/upload_others.php" method="post" enctype="multipart/form-data" id="upload1">


         <input type="file" id="file1" name="file[]" required multiple>
         <input type="submit" id="submit1" name="submit" value="Upload">

         <div class="bar">
            <span class="bar-fill" id="pb1"><span class="bar-fill-text" id="pt1"></span></span>
         </div>
         <div id="uploads1" class="uploads">
            Uploaded file links will appear here.
         </div>
      </form>
   </div>
</div>

<script>
   document.getElementById('upload_opt').classList.add('actives');


   document.getElementById('submit').addEventListener('click', function (e) {
      e.preventDefault();

      var f = document.getElementById('file'),
         pb = document.getElementById('pb'),
         pt = document.getElementById('pt');

      app.uploader({
         files: f,
         progressBar: pb,
         progressText: pt,
         processor: '../Uploads/upload.php',

         finished: function (data) {
            var uploads = document.getElementById('uploads'),
               succeeded = document.createElement('div'),
               failed = document.createElement('div'),

               anchor,
               span,
               x;

            if (data.failed.length) {
               failed.innerHTML = '<p>Unfortunately, the following files failed to upload:</p>'
            }

            uploads.innerText = '';

            for (x = 0; x < data.succeeded.length; x = x + 1) {
               anchor = document.createElement('a');
               anchor.href = './videos.php#' + data.succeeded[x].name;
               anchor.innerText = data.succeeded[x].name;
               anchor.target = '_self';

               succeeded.appendChild(anchor);
            }

            for (x = 0; x < data.failed.length; x = x + 1) {
               span = document.createElement('span');
               span.innerText = data.failed[x].name;

               failed.appendChild(span);
            }

            uploads.appendChild(succeeded);
            uploads.appendChild(failed);
         },

         error: function () {
            console.log('Not working.');
         }
      });
   });


</script>
<script>

   document.getElementById('submit1').addEventListener('click', function (e) {
      e.preventDefault();

      var f = document.getElementById('file1'),
         pb = document.getElementById('pb1'),
         pt = document.getElementById('pt1');

      app.uploader({
         files: f,
         progressBar: pb,
         progressText: pt,
         processor: '../Uploads/upload_others.php',

         finished: function (data) {
            var uploads = document.getElementById('uploads1'),
               succeeded = document.createElement('div'),
               failed = document.createElement('div'),

               anchor,
               span,
               x;

            if (data.failed.length) {
               failed.innerHTML = '<p>Unfortunately, the following files failed to upload:</p>'
            }

            uploads.innerText = '';

            for (x = 0; x < data.succeeded.length; x = x + 1) {
               anchor = document.createElement('a');
               anchor.href = './videos123.php#' + data.succeeded[x].name;
               anchor.innerText = data.succeeded[x].name;
               anchor.target = '_self';

               succeeded.appendChild(anchor);
            }

            for (x = 0; x < data.failed.length; x = x + 1) {
               span = document.createElement('span');
               span.innerText = data.failed[x].name;

               failed.appendChild(span);
            }

            uploads.appendChild(succeeded);
            uploads.appendChild(failed);
         },

         error: function () {
            console.log('Not working.');
         }
      });
   });


</script>

</div>
<?php include 'footer.php' ?>