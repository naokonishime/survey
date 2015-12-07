<!DOCUTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP基礎</title>

	</head>
	<body>
		ありがとうございます！
		<?php 
			$dsn ='mysql:dbname=phpkiso;host=localhost';
			$user ='root';
			$password ='';
			$dbh = new PDO($dsn,$user,$password);
			$dbh ->query('SET NAMES utf8') ;//今から実行されるSQL文はデータベースでUTF8で表示されます
			

			$nickname = $_POST['nickname'];
			$email = $_POST['email'];
			$goiken = $_POST['goiken'];

			echo $nickname;
			echo '様<br />';
			echo 'ご意見ありがとうございました<br />';
			echo'頂いたご意見『';
			echo $goiken;
			echo '』<br />';
			echo $email;
			echo 'にメールを送りましたので、ご確認ください。';

			$sql = 'INSERT INTO `survey`(`nickname`,`email`,`goiken`) VALUES("'.$nickname.'","'.$email.'","'.$goiken.'")';
			var_dump($sql);
			$stmt = $dbh->prepare($sql);  //insert文を実行
			$stmt ->execute();

			$dbh = null; //datebaseから切断
			?>

	</body>
</html>
