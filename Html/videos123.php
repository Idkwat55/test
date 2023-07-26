<head>
    <title> Sammlung | Movies</title>
</head>
<?php include 'header123.php'; ?>

<script type="text/javascript">
    window.onload = function () {
        document.getElementById('hov2').classList.add('actives');
        document.getElementById('dropdown2').classList.add('actives');

    }

</script>

     <form action="Upload.php" method="post" enctype="multipart/form-data"
                                   id="upload">
                                   <label for="file" class="custom-file-input">
                                        <span>Choose File</span>
                                        <input type="file" id="file" placeholder="hi"
                                             accept=".mp4,.png,.mkv,.avi,.webm,.webp,.jpg,.jpeg" name="file" required>
                                   </label>
                                   <label for="title" class="custom-file-input">
                                        <span>Title</span>
                                        <input type="text" required name="title" id="title">
                                   </label>
                                   <input type="submit" id="submit" class="UplBtn" name="submit" value="Upload">
                                   <div class="bar">
                                        <span class="bar-fill" id="pb"><span class="bar-fill-text"
                                                  id="pt"></span></span>
                                   </div>
                                   <div id="uploads" class="uploads">
                                        .
                                   </div>
                              </form>





<?php include 'footer123.php'; ?>