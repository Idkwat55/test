<?php

require "C:\\xampp\\SQL CRED (PDO)\\abcxyz.php"; //cred
$tableNameServ = "user_acc_info"; //db tb name

if (!function_exists('DeleteAcc')) {
	function DeleteAcc($servername, $dbname1, $usernameServ, $passwordServ, $tableNameServ, $DelPswd, $DelName)
	{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname1", $usernameServ, $passwordServ);
		$DelReqStmt = $conn->prepare("SELECT id,password FROM $tableNameServ WHERE userName=:ChkUsr");
		$DelReqStmt->bindParam(':ChkUsr', $DelName);
		$DelReqStmt->execute();

		while ($row = $DelReqStmt->fetch(PDO::FETCH_ASSOC)) {
			$DelServUId = $row['id'];
			$DelServPswd = $row['password'];
		}

		if (isset($DelServPswd) && $DelName === $_COOKIE['User']) {
			if (password_verify($DelPswd, $DelServPswd)) {
				//	$AddSecChkDel = include 'verify.php';
				//	if ($AddSecChkDel) {
				$DelStmt = $conn->prepare("DELETE FROM $tableNameServ WHERE userName=:userName AND id=:id");
				$DelStmt->bindParam(':id', $DelServUId);
				$DelStmt->bindParam(':userName', $DelName);
				$DelStmt->execute();
				echo "Successfully Deleted Your Account";

				header('Deld:' . true);
				exit;
			} else {
				echo "Invalid details entered!";
			}
		} else {
			echo "Invalid details entered!";
		}

		$conn = null;
	}
}

if (!function_exists('verify')){
	function verify($servername, $dbname1, $usernameServ, $passwordServ, $tableNameServ, $UsrSubId, $UsrId)
	{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname1", $usernameServ, $passwordServ);
		$verifStmt = $conn->prepare("SELECT * from $tableNameServ WHERE id = :ChkId AND userName = :ChkUsr");
		$verifStmt->bindParam(':ChkId', $UsrSubId);
		$verifStmt->bindParam(':ChkUsr', $UsrId);
		$verifStmt->execute();

		$ChkVerif = $verifStmt->fetchAll(PDO::FETCH_ASSOC);

		if (count($ChkVerif) === 1) {
			global $verifSucs;
			$verifSucs = true;
			$FlagAllowIn = true;


		}
		 
		$conn = null;
	}
}

try {

	if (isset($DelFlg) && $DelFlg === true) {
		DeleteAcc($servername, $dbname1, $usernameServ, $passwordServ, $tableNameServ, $DelPswd, $DelName);
	}

	if (isset($VeriFlg) && $VeriFlg) {
		
		verify($servername, $dbname1, $usernameServ, $passwordServ, $tableNameServ, $UsrSubId, $UsrId);
		
	}

} catch (Exception $e) {

	echo $e->getMessage();

} finally {

	try {
		$conn = new
			PDO("mysql:host=$servername;dbname=$dbname1", $usernameServ, $passwordServ);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if (isset($FlagSign) && $FlagSign === "Up") {

			$checkstmt = $conn->prepare("SELECT * FROM $tableNameServ WHERE userName = :Chkusrname");

			$checkstmt->bindParam(':Chkusrname', $nameUsr);

			$checkstmt->execute();

			$FlagChekstmt = $checkstmt->fetchAll(PDO::FETCH_ASSOC);

			if (count($FlagChekstmt) > 0) {
				echo "<br>The requested user-name is not available";

			} else {

				$stmt = $conn->prepare("INSERT INTO user_acc_info (userName,email,password) VALUES (:userName,:email,:password)");
				$passwordUsr = password_hash($pswd, PASSWORD_DEFAULT);

				$stmt->bindParam(':userName', $nameUsr);
				$stmt->bindValue(':email', $email);
				$stmt->bindParam(':password', $passwordUsr);
				$stmt->execute();
				echo "<br>Successfully created your Account<br>";
				$SignUpStat = true;

			}

		} elseif (isset($FlagSign) && $FlagSign === "In") {

			try {


				$checkstmt = $conn->prepare("SELECT * FROM $tableNameServ WHERE userName = :Chkusrname  ");
				$checkstmt->bindParam(':Chkusrname', $user, PDO::PARAM_STR);
				$checkstmt->execute();

				$FlagChekstmt = $checkstmt->fetchAll(PDO::FETCH_ASSOC);

				$GetEmailStmt = $conn->prepare("SELECT email FROM $tableNameServ WHERE userName = :Chkusrname  ");

				$GetEmailStmt->bindParam(':Chkusrname', $user, PDO::PARAM_STR);
				$GetEmailStmt->execute();

				$GetEmail = $GetEmailStmt->fetchAll(PDO::FETCH_ASSOC);

				if (count($GetEmail) === 1) {
					$UserEmailChk = $GetEmailStmt->fetchColumn();
				}
				if ($UserEmail === null || $UserEmail === 'null') {
					$AddMailFlg = true;

				} else {
					$AddMailFlg = false;
					$UserEmail = $UserEmailChk;
				}


				if (count($FlagChekstmt) === 1) {

					$FlagAllowIn = true;
					$UsrIdStmt = $conn->prepare("SELECT id,password FROM $tableNameServ WHERE userName = :Chkusrname  ");

					$UsrIdStmt->bindParam(':Chkusrname', $user, PDO::PARAM_STR);
					$UsrIdStmt->execute();

					while ($row = $UsrIdStmt->fetch(PDO::FETCH_ASSOC)) {
						$UsrSubId = $row['id'];
						$passwordUsrServ = $row['password'];

					}


				}
				if (isset($passwordUsrServ)) {

					if (password_verify($pswd, $passwordUsrServ)) {

					} else {
						$FlagAllowIn = false;
					}
				}

			} catch (Exception $e) {

				echo $e->getMessage();
			}

		}

		$conn = null;

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