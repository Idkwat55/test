<head>
   <title> About the Creator</title>
</head>
<?php if (!isset($HeaderInclu)) {
   include 'header.php';
   $HeaderInclu = true;
} ?>

<body class="abt-body">
   <div class="abt-header">
      <span class="abt-heading">About the Creator</span>
   </div>
   <main class="abt-main">
      <section class="abt-section">
         <h2 class="abt-section-heading">My Story</h2>
         <p class="abt-section-content">So, it's May 29, 2024 now, when I finally decided to do something about the
            'About' page.
            Let me tell you all about it. Sometime in 2022, after being bored, and with the urge to do something with
            the tablet in my room corner
            (partly fueled by my depression at the time), I find out about FTP and how I can turn my old tab into a
            wireless storagge device.
            Since then, I wanted to modify the interface the simple http server/ftp server apps gave me on android. So I
            wanted my own interface as,
            at the time it seemed quicker and easier to write one instead of finding one fitting me. Hence I revisited
            my 8th grade computer science books,
            learning basic html. It slowly evolved, from html, to css, then to javascript, until I finally switched to
            xampp because of PHP and need of SQl.
         </p>
      </section>
      <section class="abt-section">
         <h2 class="abt-section-heading">The Project</h2>
         <p class="abt-section-content">For something that started as a pure interface for simple file transfer, I
            wanted to be able to stream videos
            without needing to download them first, including mkv and avi format. Alas, builtin support for them is not
            available even as of this writing
            I would need to write a JS for buffering and making datastream, which, just think of, makes my head spin.
         </p>
         <p class="abt-section-content">Anyway, as I started my freshmen
            year in college, I wanted more, a lot more out it. I wanted to read books, novels, stream videos, add
            comments, have web apps via flask,
            and so on. But, I while I did have decent Novel reader at one point, it wasn't dynamic ie I had to add new
            chapters manually in the backend
            and so in the name of fixing it by starting from scratch, I've removed what little I had created. To
            accomodate that, I've added basic user
            authenication system, using JWTs, encrypted even. Also had PHP backend for file uploading, and a mysql
            database to keep records of it.
            You could even change your profile photos! though I hadn't implemented the user-accessible part of it yet.
            Just some more minor finishing touches here and there, and maybe a optimisation mania now and then, it would
            be a 'site' to behold.
         </p>
      </section>
      <section class="abt-section">
         <h2 class="abt-section-heading">The Future</h2>
         <p class="abt-section-content">While I'd love to continue this project and see it make to the real end users
            one day, I have decided its not my passion,
            But more of a hobby. My interest, for all personal and practical purposes, lie in Electronics. Therefore,
            I'm thinking of handing over this
            project to my friends, who have interest in this web development, and will bring this beaut to life.
         </p>
      </section>
      <section class="abt-sign-section">
         <h2 class="abt-sign-section-content" style="right:-1;">Risikesvar G</h2>

      </section>
   </main>

</body>


<?php include 'footer.php'; ?>