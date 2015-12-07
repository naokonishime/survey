<!DOCUTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta charset="UTF-8">

	</head>
	<body>

		<?php
			$code=$_POST['code'];

			$dsn = 'mysql:dbname=phpkiso;host=localhost';
			$user = 'root';
			$password = '';
			$dbh = new PDO($dsn,$user,$password);
			$dbh->query('SET NAMES utf8');

			//SQL文作成
			$sql = 'SELECT * FROM `survey` WHERE code=?';

			//SQL文実行　
			$stmt = $dbh->prepare($sql);
			$date[]=$code;
			$stmt->execute($date);

			//実行した結果として得られたデータを表示
				$rec = $stmt->fetch(PDO::FETCH_ASSOC);
				
				
				
				echo $rec['code'];
				echo $rec['nickname'];
				echo $rec['email'];
				echo $rec['goiken'];
				echo '<br />';
			
			//DB接続を削除
			$dbh = null;

			?>



	</body>

</html>