<?php


function Timesort($start, $limit)
{
    include "C:\\xampp\\SQL CRED (PDO)\\abcxyz.php"; //cred
    $tableNameServ = "video"; //db tb name
    $tableNameServ2 = "user_acc_info";
    $dir = "../Uploads/Videos/";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname1", $usernameServ, $passwordServ);
        $stmt = "SELECT * FROM $tableNameServ ORDER BY timestmp DESC LIMIT $start, $limit";
        $stmt2 = $conn->query($stmt);

        $video = array('mp4', 'webm', 'ogg');
        $picture = array('jpg', 'jpeg', 'webp');
        $picDir = "../Resources/images/profile/";
        while ($loop = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            $stmtD = $conn->prepare("SELECT userName,reg_date,PrPSID FROM $tableNameServ2 WHERE id=:AID LIMIT 1");
            $stmtD->bindParam(':AID', $loop['AID']);
            $stmtD->execute();
            $res = $stmtD->fetch(PDO::FETCH_ASSOC);

            $userName = $res['userName'];
            $profPic = $res['PrPSID'];
            $reg_date = $res['reg_date'];
            $like = $loop['Likes'];
            $dislike = $loop['Dislikes'];
            $comm = $loop['TotlComnt'];

            ?>
            <div class='UPcontainer'>
                <div class="UPoptsBox">
                    <div class="optsElems">Block
                        <?php echo $userName ?>
                    </div>
                    <div class="optsElems">Report
                        <?php echo $userName ?>
                    </div>

                </div>
                <div class='vid_tools'>
                    <div class="ByInfo">
                        <?php
                        if ($profPic === 0 || $profPic === '0') {
                            ?>

                            <i class="icon-account_box_ic_icon IconCl"></i>

                        <?php } else { ?>
                            <div class="PicPlNam">
                                <img class="profIMG" loading="lazy" src="<?php echo $picDir . $profPic ?>">

                                <?php
                        }
                        ?> <div class="ByUser">
                                <?php echo $userName ?>
                            </div>

                            <i onclick="gearIcon(this);"
                                class="icon-configuration_edit_gear_options_preferences_icon IconCl UPopts">
                            </i>

                        </div>

                    </div>
                    <div class="PostTitlePre">
                        <p class='PostTitle'>
                            <?php echo $loop['title'] ?>
                        </p>
                    </div>

                </div>
                <?php

                $type = pathinfo($loop['SID'], PATHINFO_EXTENSION);
                try {
                    if (in_array($type, $video)) {

                        ?>
                        <video class='UPMcontainer' preload="metadata" controls>

                            <source src="<?php echo $dir . $loop['SID'] ?>" type="video/mp4">
                            <source src=" <?php echo $dir . $loop['SID'] ?> " type="video/ogg">
                        </video>
                    <?php } else if (in_array($type, $picture)) {


                        ?>
                            <div class='UPMcontainer'>

                                <img loading="lazy" class="UPMimgCl" src="<?php echo $dir . $loop['SID'] ?>">

                            </div>
                            <?php
                    }
                } finally {
                    $VID = $loop['VID'];
                    $AID = $loop['AID'];

                    ?>
                <div class='vid_tools '>
                    <div class="IconCl">
                        <span class="number">
                            <?php echo $like ?>
                        </span>
                        <i onclick="FeatureHandler('1',event, <?php echo $VID ?>,<?php echo $AID ?>);"
                            class=" icon-thumb_up_off_alt "> </i>
                    </div>
                    <div class="IconCl">
                        <span class="number">
                            <?php echo $dislike ?>
                        </span>
                        <i onclick="FeatureHandler('2',event, <?php echo $VID ?>,<?php echo $AID ?>);"
                            class="icon-thumb_down_off_alt"> </i>
                    </div>
                    <div class="IconCl">
                        <span class="number">
                            <?php echo $comm ?>
                        </span>
                        <i class="icon-comment  "></i>
                    </div>
                    <i onclick="FeatureHandler('3',event, <?php echo $VID ?>,<?php echo $AID ?>);"
                        class="icon-favorite_outline IconCl"></i>
                </div>
            </div>
        <?php } ?>


            <?php
        }
        return $limit;
    } catch (Exception $err) {
        echo $err->getMessage();
    }
}



function FeatureHandler($type, $VID, $AID)
{
    try {
        include "C:\\xampp\\SQL CRED (PDO)\\abcxyz.php";
        $tableNameServ = "video";
        $tableNameServ2 = "featurehandler";
        // types :-> Likes = 1, Dislikes = 2 |  // this is not making sense -> need updated logic for table ->Favoutires = 3
        $conn = $conn = new PDO("mysql:host=$servername;dbname=$dbname1", $usernameServ, $passwordServ);
        if ($type === '1' || $type === 1) {
            echo "Type One";
            $action = 'Likes';

        } else if ($type === '2' || $type === 2) {
            echo "Type Two ";
            $action = 'Dislikes';
        } else if ($type === '3' || $type === 3) {
            $action = false;
        } else {
            throw new Exception("Unknown type of feature requested");
        }
        if ($action) {
            $stmt = $conn->prepare("UPDATE $tableNameServ set $action = $action + 1  WHERE VID =:VID AND AID=:AID ");
            $stmt->bindParam('VID', $VID);
            $stmt->bindParam('AID', $AID);
            if ($stmt->execute()) {
                echo " Feature request success [1/2] ";
            } else {
                echo " Error [1/2] : " . $stmt->errorInfo()[2];
            }
        }
        // stmt2 = add to featurehandler table
        if ($action === false) {
            $val = true;
            $stmt2 = $conn->prepare("INSERT INTO featurehandler (VID,AID,Fav) VALUES (:VID,:AID,:Fav)");
            $stmt2->bindParam(':Fav',$val );
        } else {
            $stmt2 = $conn->prepare("INSERT INTO featurehandler (VID,AID,types) VALUES (:VID,:AID,:types) ");
            $stmt2->bindParam(':types', $type);
        }

        $stmt2->bindParam(':VID', $VID);
        $stmt2->bindParam(':AID', $AID);

        if ($stmt2->execute()) {
            echo " Feature request success [2/2] ";
        } else {
            echo " Error [2/2] : " . $stmt2->errorInfo()[2];
        }



    } catch (Exception $e) {
        echo "Error [Main Handle] :" . $e->getMessage();
    }

}

function AddPost($title, $fileName)
{
    include "C:\\xampp\\SQL CRED (PDO)\\abcxyz.php"; //cred
    $tableNameServ = "video"; //db tb name
    include_once "verify.php";
    $GetVals = $Details;

    if (is_array($GetVals)) {
        $AID = (int) $GetVals[1];

        // Rest of your code...
    } else {
        throw new Exception("An ERROR occured");
        // Handle the case where the included file didn't return an array
    }
    if ($GetVals !== false || $GetVals !== '0' || $GetVals !== 0) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname1", $usernameServ, $passwordServ);
            $stmt = $conn->prepare("INSERT INTO video (title,SID,AID) VALUES (:title,:SID,:AID)");
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":SID", $fileName);
            $stmt->bindParam(":AID", $AID);

            $stmt->execute();
            exit;
        } catch (Exception $err) {

            echo $err->getMessage();
            exit;
        }
    }
}



?>