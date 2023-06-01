<?php

require "C:\\xampp\\SQL CRED (PDO)\\abcxyz.php";//cred
$tableNameServ = "user_acc_info"; //db tb name

try {
	if ($VeriFlg) {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname1", $usernameServ, $passwordServ);
		$verifStmt = $conn->prepare("SELECT * from $tableNameServ WHERE id = :ChkId AND userName = :ChkUsr");
		$verifStmt->bindParam('ChkId', $UsrSubId);
		$verifStmt->bindParam(':ChkUsr', $UsrId);
		$verifStmt->execute();

		$ChkVerif = $verifStmt->fetchAll(PDO::FETCH_ASSOC);

		if (count($ChkVerif) === 1) {

			$verifSucs = true;
			echo "<script>
			console.log('User in db');
			</script>";// set to delete
		}
		$conn=null;
	}
} catch (Exception $e) {
	echo $e->getMessage();
} finally {

	try {
		$conn = new
			PDO("mysql:host=$servername;dbname=$dbname1", $usernameServ, $passwordServ);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if ($FlagSign === "Up") {

			$checkstmt = $conn->prepare("SELECT * FROM $tableNameServ WHERE userName = :Chkusrname");

			$checkstmt->bindParam(':Chkusrname', $nameUsr);

			$checkstmt->execute();

			$FlagChekstmt = $checkstmt->fetchAll(PDO::FETCH_ASSOC);
			if (count($FlagChekstmt) > 0) {
				echo "<br>The requested user-name is not available";
			} else {

				$stmt = $conn->prepare("INSERT INTO user_acc_info (userName,email,password) VALUES (:userName,:email,:password)");
				$stmt->bindParam(':userName', $nameUsr);
				$stmt->bindValue(':email', 'null');
				$stmt->bindParam(':password', $passwordUsr);
				$stmt->execute();
				echo "<br>Successfully created your Account<br>";
			}
		} 
		elseif ($FlagSign === "In") {
	        try {
			//	echo "<br> ------------ ".$pswd; //delete
			$checkstmt = $conn->prepare("SELECT * FROM $tableNameServ WHERE userName = :Chkusrname AND password = :passwordChk");

			$checkstmt->bindParam(':passwordChk', $pswd, PDO::PARAM_STR);
			$checkstmt->bindParam(':Chkusrname', $user, PDO::PARAM_STR);
			$checkstmt->execute();

			$FlagChekstmt = $checkstmt->fetchAll(PDO::FETCH_ASSOC);
          
			if (count($FlagChekstmt) === 1) {

				$FlagAllowIn = true;
				$UsrIdStmt = $conn->prepare("SELECT id FROM $tableNameServ WHERE userName = :Chkusrname AND password = :passwordChk");
				$UsrIdStmt->bindParam(':passwordChk', $pswd, PDO::PARAM_STR);
				$UsrIdStmt->bindParam(':Chkusrname', $user, PDO::PARAM_STR);
				$UsrIdStmt->execute();
				$UsrSubId = $UsrIdStmt->fetchColumn();

			}}catch (Exception $e){
				echo $e->getMessage();
			}
		}

	} catch (PDOException $e) {

		$tryAgainMsg = "<br> Please try again. If the problem persists contact us. ";

		if (strpos($e, 'SQLSTATE[HY000] [1049]')) {

			echo '<br>SQL_ERR: 1049 ' . $tryAgainMsg . $e->getMessage();

		} else {
			echo "<br>CSQ : 101" . $tryAgainMsg . $e->getMessage();
		}
	}


	$conn = null;
}
?>