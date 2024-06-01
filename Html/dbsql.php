<?php

$CredGrabber = "C:\\D_Drive\\XAMPP_Installation\\xampp\\SQL CRED (PDO)\\abcxyz.php";




include 'verify.php';

function Timesort($start, $limit)
{
    global $CredGrabber;
    include $CredGrabber; //cred
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
            if (file_exists('tmpfile.php')) {
                $filename = 'tmpfile.php';

                // Acquire a lock
                $file = fopen($filename, 'a+');


                // Read and modify the data in the file
                $data = include($filename);

                if (!isset($data[$loop['AID']])) {
                    $data[$loop['AID']] = $userName;
                }
                // Write the modified data back to the file
                file_put_contents($filename, '<?php return ' . var_export($data, true) . ';');

                // Release the lock

                fclose($file);

            } else {
                $FileObj = fopen('tmpfile.php', 'a+');
                fwrite($FileObj, "<?php return array('Ini'=>'Default_Value'); ?>");
            }
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
                    <div class='vid_tools1 '>
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
                            <i onclick="FeatureHandler('3',event, <?php echo $VID ?>,<?php echo $AID ?>);" class="icon-comment  "></i>
                        </div>
                        <div>
                            <i onclick="FeatureHandler('4',event, <?php echo $VID ?>,<?php echo $AID ?>);"
                                class="icon-favorite_outline IconCl"></i>
                        </div>
                    </div>
                    <div class="CommentBox">
                        <div class="ExpTst">

                        </div>
                        <div class="CommentTools">
                            <textarea class="ComntText" rows="4" maxlength="680" placeholder="Enter your comments here"></textarea>
                            <button onclick="AddComnt(<?php echo $VID ?>,<?php echo $AID ?>,event)" class="AddComnt">Add
                                Comment</button>
                        </div>
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


function AddComment($VID, $AID, $event, $SCFLG, $SCID, $CC) //CID - Sub-Comment ID, SCFLG - SubComment Flag
{
    try {


        global $CredGrabber;
        include $CredGrabber;
        $tableNameServ = "video";
        $tableNameServ2 = "comment";
        $tableNameServ3 = "subcomment";

        include 'verify.php';
        $AAID = $Details[1];
        echo " AAID :" . $AAID;
        echo "<br> AID:" . $AID;
        echo "<br> VID;" . $VID;


        $conn = new PDO("mysql:host=$servername;dbname=$dbname1", $usernameServ, $passwordServ);

        if ($AAID === null || $AAID === 'undefined') {
            throw new Exception("AAID Undefined");
        }
        if (empty($SCFLG) || $SCFLG === false) {
            $action = 'TotlComnt';
            $stmt = $conn->prepare("INSERT INTO $tableNameServ2 (VID,AID,CC,AAID) VALUES (:VID,:AID,:CC,:AAID)");
            $stmt2 = $conn->prepare("UPDATE video set $action =$action+1  WHERE AID=:AID AND VID=:VID");
        }

        $stmt2->bindParam(":VID", $VID);
        $stmt2->bindParam(":AID", $AID);
        $stmt->bindParam(":AAID", $AAID);
        $stmt->bindParam(':VID', $VID);
        $stmt->bindParam(':AID', $AID);
        $stmt->bindParam(':CC', $CC);
        if ($stmt->execute() && $stmt2->execute()) {
            echo "Operation Comment : Success";
            echo " CC : " . $CC;
        } else {
            throw new Exception("Operation Comment : failed");
        }
    } catch (Exception $e) {
        echo "<br>Error [Sector - XS452_1 , Section - AddC(153-180)/178 ] :<br><hr>" . $e->getMessage();
    }
}
function CommtHandler($VID, $AID)
{

    try {

        global $CredGrabber;
        include $CredGrabber;
        $tableNameServ = "video";
        $tableNameServ2 = "featurehandler";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname1", $usernameServ, $passwordServ);
        $stmt = $conn->query("SELECT TotlComnt FROM $tableNameServ WHERE VID=$VID AND AID = $AID");

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $resultVal = $result['TotlComnt'];
        if ($resultVal === 0 || $resultVal === '0') {
            $objArray = json_encode([$VID, $AID]);
            ob_clean();
            echo "No one commented on this post yet.<br>Be the first one to comment!";
        } else {
            $stmt2 = $conn->prepare("SELECT * FROM comment WHERE VID=:VID AND AID=:AID");
            $stmt2->bindParam(":AID", $AID);
            $stmt2->bindParam(":VID", $VID);
            if ($stmt2->execute()) {
                ob_clean(); /*
global $Dict_AID;
foreach ($Dict_AID as $key => $val) {
echo $key . " then " . $val;
}*/

                while ($stmtResults = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                    $CC = $stmtResults['CC'];
                    $Acc = $stmtResults['AID'];
                    $Dict_AID = include('tmpfile.php');
                    $name = $Dict_AID[$Acc];
                    ?>
                    <div class='IndiComnt'>
                        <div class='IndiComntIndi'>


                            <div class='IndiComntTop'>
                                <div class='IndiComntAC'>
                                    <?php echo $name ?>
                                </div>
                                <div class='IndiComntCreate'>
                                    <?php echo $stmtResults['Created'] ?>
                                </div>

                            </div>

                            <div class='IndiComntCC'>

                                <?php echo $CC ?>

                            </div>


                            <div class='IndiComntBot'>
                                <div class='vid_tools1'>
                                    <div class='IconCl'>
                                        <span class="number">
                                            0
                                        </span>
                                        <i onclick="FeatureHandler('1',event, <?php echo $VID ?>,<?php echo $AID ?>);"
                                            class=" icon-thumb_up_off_alt "> </i>
                                    </div>
                                    <div class="IconCl">
                                        <span class="number">
                                            0
                                        </span>
                                        <i onclick="FeatureHandler('2',event, <?php echo $VID ?>,<?php echo $AID ?>);"
                                            class="icon-thumb_down_off_alt"> </i>
                                    </div>
                                    <div class="IconCl">
                                        <span class="number">
                                            0
                                        </span>
                                        <i onclick="FeatureHandler('3',event, <?php echo $VID ?>,<?php echo $AID ?>);"
                                            class="icon-comment  "></i>
                                    </div>
                                    <div>
                                        <i onclick="FeatureHandler('4',event, <?php echo $VID ?>,<?php echo $AID ?>);"
                                            class="icon-favorite_outline IconCl"></i>
                                    </div>
                                </div>
                                <div class='IndiComntTime'>
                                    <?php echo $stmtResults['CreationTime'] ?>
                                </div>

                            </div>



                        </div>

                    <?php }
                //   echo " OK OK <|> ok <|>";
            } else {
                echo "<|>Failed<|>";
            }
        }


        $conn = null;
        exit;

    } catch (Exception $e) {
        $conn = null;
        echo " Error [Sectional : FH>CH] : " . $e->getMessage();
    }
}

function FeatureHandler($type, $VID, $AID)
{
    try {
        global $CredGrabber;
        include $CredGrabber;
        $tableNameServ = "video";
        $tableNameServ2 = "featurehandler";
        // types :-> Likes = 1, Dislikes = 2 |  // this is not making sense -> need updated logic for table ->Favoutires = 3
        $conn = new PDO("mysql:host=$servername;dbname=$dbname1", $usernameServ, $passwordServ);

        if ($type === '1' || $type === 1) {
            echo "Type One";
            $action = 'Likes';
            $actionOppo = 'Dislikes';

        } else if ($type === '2' || $type === 2) {
            echo "Type Two ";
            $action = 'Dislikes';
            $actionOppo = 'Likes';
        } else if ($type === '3' || $type === 3) {
            echo " Type 3 ";
            $conn = null;
            CommtHandler($VID, $AID);


        } else if ($type === '4' || $type === 4) {

            $action = false;
            echo "Type 4 ";


        } else {

            throw new Exception("Unknown feature requested");
        }
        $validate = $conn->query("SELECT * FROM $tableNameServ2 WHERE AID=$AID AND VID=$VID AND Flag IS NULL");
        if ($validate && $validate->rowCount() === 1) {





            $loopthis = $validate->fetch(PDO::FETCH_ASSOC);
            if ($loopthis) {
                echo "<br> From Featurehandle - Types: " . $loopthis['types'] . " / Favorite: " . $loopthis['Fav'] . "<br>";
                echo "<br> From Video - Type :$type and Action:$action";
                $typesCHK = $loopthis['types'];
                $FavCHK = $loopthis['Fav'];
            } else {

                throw new Exception("No matching records found");
            }

            if ($action) {
                //|| $typesCHK === '0' || $typesCHK === 0
                if (($typesCHK === '0' || $typesCHK === 0)) {
                    $Updatestmt = "UPDATE $tableNameServ2 set types=$type WHERE AID=$AID AND VID=$VID";
                    $stmt = $conn->prepare("UPDATE $tableNameServ set $action = $action + 1  WHERE VID =:VID AND AID=:AID  ");

                } else {
                    // echo "<br>Not 0:?";      let targetObj = event.target.parentNode.childNodes;
                }

                if (($typesCHK === '1' || $typesCHK === 1) && ($type === '2' || $type === 2)) {
                    $Updatestmt = "UPDATE $tableNameServ2 set types='2' WHERE AID=$AID AND VID=$VID";
                    $stmt = $conn->prepare("UPDATE $tableNameServ set $action = $action + 1 ,$actionOppo = $actionOppo-1 WHERE VID =:VID AND AID=:AID  AND $actionOppo >0");
                } else {
                    //  echo "<br> Not 1:2";
                }

                if (($typesCHK === '2' || $typesCHK === 2) && ($type === '1' || $type === 1)) {
                    $Updatestmt = "UPDATE $tableNameServ2 set types='1' WHERE AID=$AID AND VID=$VID";
                    $stmt = $conn->prepare("UPDATE $tableNameServ set $action = $action + 1 ,$actionOppo = $actionOppo-1 WHERE VID =:VID AND AID=:AID  AND $actionOppo >0");
                } else {
                    // echo "<br> Not 2:1<br>";
                }
                if ((($typesCHK === '1' || $typesCHK === 1) && ($type === '1' || $type === 1)) || (($typesCHK === '2' || $typesCHK === 2) && ($type === '2' || $type === 2))) {
                    $Updatestmt = "UPDATE $tableNameServ2 set types='NULL'  WHERE AID=$AID AND VID=$VID";
                    //   echo "<br>Explicitly Set TYPES=0";
                    $stmt = $conn->prepare("UPDATE $tableNameServ set $action = $action - 1  WHERE VID =:VID AND AID=:AID ");

                } else {
                    //  echo "<br> Not 1:1 or 2:2";
                }


                if (!empty($Updatestmt)) {
                    //   echo "<br>Update Statement : " . $Updatestmt . "<br>";
                    //   echo "<br>Main  Statement : " . strval($stmt) . "<br>";
                    $UpdatestmtObj = $conn->query($Updatestmt);

                } else {

                    throw new Exception("FATAL ERROR - NO *UPDATE ELEMENT* FOUND");
                }
                if ($stmt) {
                    $stmt->bindParam('VID', $VID);
                    $stmt->bindParam('AID', $AID);
                    if ($stmt->execute()) {
                        echo " Feature request success [1/4] ";
                    } else {

                        throw new Exception(" Error [1/4] : " . $stmt->errorInfo()[2]);
                    }
                } else {

                    throw new Exception(" FATAL ERROR - NO *STATEMENT* WAS PREPARED ");
                }
            } else if ($action === false) {


                if ($FavCHK === 0 || $FavCHK === false || $FavCHK === '0') {
                    $val = true;
                    //   echo " Chk val -0";
                } else if ($FavCHK === 1 || $FavCHK === true || $FavChk === '1') {
                    $val = false;
                    // echo " Chk val -1";
                }
                $stmt2 = $conn->prepare(" UPDATE $tableNameServ2 SET VID = :VID, AID = :AID, Fav = :Fav WHERE AID = :AID AND VID = :VID ");
                $stmt2->bindParam(':Fav', $val);
                $stmt2->bindParam(':VID', $VID);
                $stmt2->bindParam(':AID', $AID);



                if ($stmt2->execute()) {
                    echo " Feature request success [3/4] ";
                } else {

                    throw new Exception(" Error [3/4] : " . $stmt2->errorInfo()[2]);
                }

            }


        } else if ($validate && $validate->rowCount() === 0) {
            if ($action === false) {

                $val = true;
                $stmt2 = $conn->prepare("INSERT INTO $tableNameServ2 (VID,AID,Fav) VALUES (:VID,:AID,:Fav)");
                $stmt2->bindParam(':Fav', $val);
                $stmt = null;
            } else {

                $stmt2 = $conn->prepare("INSERT INTO $tableNameServ2 (VID,AID,types) VALUES (:VID,:AID,:types)  ");
                $stmt = $conn->prepare("UPDATE $tableNameServ set $action = $action + 1  WHERE VID =:VID AND AID=:AID ");
                $stmt2->bindParam(':types', $type);
                $stmt->bindParam(':AID', $AID);
                $stmt->bindParam(":VID", $VID);

            }

            $stmt2->bindParam(':VID', $VID);
            $stmt2->bindParam(':AID', $AID);


            if ($stmt2->execute()) {
                if (!empty($stmt) && $stmt->execute()) {
                    echo " Feature request success [2/4] ";
                } else {
                    echo " Feature request success [2/4] ";

                }
            } else {

                throw new Exception(" Error [2/4] : " . $stmt2->errorInfo()[2]);
            }
        } else {

            throw new Exception("Error [4/4] : Database corruption found ! [ Duplicate records found ]");
        }

        $conn = null;

    } catch (Exception $e) {
        $conn = null;
        echo "<br>Error [Sector - XS452_1 , Section - FFeH(150-315) ] :<br><hr>" . $e->getMessage();
    }

}

function AddPost($title, $fileName)
{
    global $CredGrabber;
    include $CredGrabber; //cred
    $tableNameServ = "video"; //db tb name
    include_once "verify.php";
    global $Details;
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