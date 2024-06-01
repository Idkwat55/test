<head>
    <title>Movies | Sammlung</title>
    <meta name="description" content="Visual Media Page : Sammlung - One Place for all your Entertainemt needs">
</head>

<?php
session_start();
if (!isset($HeaderInclu)) {

    include 'header.php';
    $HeaderInclu = true;
}
?>

<script type="text/javascript">
    document.getElementById('hov2').classList.add('actives');
    document.getElementById('dropdown2').classList.add('actives');



</script>


<?php

$ContineFlg = include 'verify.php';
if ($ContineFlg === (false || null)) {
    echo "<script>
    console.error('Sign In Error');
    </script>";
    exit;
}
?>

<span id="Go2Top" onclick="bac_2_func()" class="Go2Top icon-keyboard_arrow_up"></span>

<div id="mainV" class="mainV">
    <div id="Category" class="Category font">
        <div class="SortOptCont">
            <span style="margin: 0px;border:none;padding:0.5em; ">Sort By </span>
            <div class="SortOpt">Latest</div>
            <div class="SortOpt">Top</div>
            <div class="SortOpt">Trending</div>

        </div>
        <hr>
        <div>
            <span>Recently Viewed</span>
            <div class="RecentViewCont">
                <div class="RecentViewVid">
                    This space is originally intended for recently Viewed videos / media however I , being the goon I
                    am,
                    failed to realise that this is not YouTube and so there is no need for the recent view , heck there
                    isn't even a way to determine what is recently viewed(as of writing this). Thus this place's content
                    is now up for debate.(That brings up the idea -> why not a global forum. You can join or create
                    chatboxes. Yep thats a nice idea - but the work I would need to do for that is not pleasant to
                    imagine)


                </div>
            </div>
        </div>

    </div>
    <div id="baseContainer" class='baseContainer'>


        <script src="../script/cont.js"></script>
    </div>
</div>
<?php include 'footer.php'; ?>