<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>シフト確定確認フォーム</title>
    <link rel="stylesheet" href="Page3.css">
</head>

<body>

    <header><br>
        <img src="Icon awesome-user-clock.png"> Shift-on!
    </header>

    <center>

        <?php
	// 来月を取得
	$m = date('n', strtotime('+1 month'));

	//値を受け取る
	$data = $_POST['data'];

	//2次元連想配列dataのキー値がdayのものを1次元配列$dayに代入
	$day = $data['day'];
	//2次元連想配列dataのキー値がdateのものを1次元配列$dateに代入
	$date = $data['date'];
	?>

            <br>

            <table border="1">
                <tr>
                    <?php foreach($day as $a):?>
                    <td align="center">
                        <?php echo $a." "; ?>
                    </td>
                    <?php endforeach; ?>
                </tr>

                <tr>
                    <?php foreach($date as $b): ?>
                    <?php	if ($b) :?>
                        <td align="center">
                            <?php echo $b." "; ?>
                        </td>
                        <?php else:?>
                        <?php endif;?>
                        <?php endforeach; ?>
                </tr>
            </table>

            <br> 以上のシフトを提出してよろしいですか？
            <br><br> 間違いがなければ確定を押してください。
            <br>
            <p><input type="submit" onclick="location.href='./Page4.php'" value="確定"></p>
            修正がある場合は修正を押してください。<br>
            <p><input type="submit" onclick="location.href='./Page2.php'" value="修正"></p>
    </center>

</body>

</html>