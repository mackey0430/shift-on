<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>シフト入力フォーム</title>
    <link rel="stylesheet" href="Page2.css">
</head>

<body>
    <header><br>
        <img src="Icon awesome-user-clock.png"> Shift-on!
    </header>

    <center>
        <h1>ようこそ　ゲスト　さん</h1>
        <div class="a">
            <?php
    // 来月を取得
    $month = date('n', strtotime('+1 month'));
    //来月の年を取得
    $year = date('Y', strtotime('+1 month'));
    // 来月の月末日を取得
    $last_day = date('t', strtotime('+1 month'));

    echo $year.'年'.$month.'月の出勤可能日をチェックしてください';

    //配列calenderを定義
    $calendar = array();

    // 配列の行用の変数jを定義
    $j = 0;

    // その月の日付を取得
    for ($i = 1; $i < $last_day + 1; $i++) {

      // 各々の曜日番号を取得
      $week = date('w', mktime(0, 0, 0, $month, $i, $year));

      // 1日の場合
      if ($i == 1) {
        // 1日目の曜日までをループ
        for ($s = 1; $s <= $week; $s++) {
          // 前半に空文字をセット
          $calendar[$j]['day'] = '';
          $j++;
        }
      }

      // 配列に日付をセット
      $calendar[$j]['day'] = $i;
      $j++;

      // 月末日の場合
      if ($i == $last_day) {

        // 月末日から残りをループ
        for ($e = 1; $e <= 6 - $week; $e++) {
          // 後半に空文字をセット
          $calendar[$j]['day'] = '';
          $j++;
        }

      }

    }

    ?>

        </div>

        <table>
            <tr>
                <th bgcolor="E6E6E6">
                    <font color="red">日</font>
                </th>
                <th bgcolor="#E6E6E6">月</th>
                <th bgcolor="#E6E6E6">火</th>
                <th bgcolor="#E6E6E6">水</th>
                <th bgcolor="#E6E6E6">木</th>
                <th bgcolor="#E6E6E6">金</th>
                <th bgcolor="E6E6E6">
                    <font color="blue">土</font>
                </th>
            </tr>

        
            <tr>
                <?php $cnt = 0; ?>
                <!--連想配列calenderのkeyとvalueを出力-->
            
                <?php foreach ($calendar as $key => $value): ?>

                <!-- カレンダーのセルに数値を代入 -->
            
                <td align="center">

                    <!--cntを1加算-->
                    <?php $cnt++; ?>
                    <!--cntが１、つまり日曜日なら文字を赤くする-->
                    <?php if ($cnt == 1): ?>
                    <font color="red">
                        <?php echo $value['day']; ?>
                    </font>
                    <!--cntが2、つまり土曜日なら文字を青くする-->
                    <?php elseif ($cnt == 7): ?>
                    <font color="blue">
                        <?php echo $value['day']; ?>
                    </font>
                    <!--それ以外なら黒字で出力する-->
                    <?php else: echo $value['day']?>
                    <?php endif; ?>

                    <div class="checkbox">
                        <!--配列の中に数字があればフォームを出力-->
                        <?php if ($value['day']): ?>
                        <form method="post" action="page3.php">
                            <!-- 日付とチェックボックスを結びつける-->
                            <input type="checkbox" name=d ata[day][] value="<?php  echo $value['day'];?>">
                            <select name=d ata[date][] value="<?php echo $value['day']; ?>" 　size="5">
              <option ></option>
              <option value="朝番">朝番</option>
              <option value="昼番">昼番</option>
              <option value="夜番">夜番</option>
              </select>
                            <?php endif; ?>
                    </div>

                    </td>

                <!--cntが７だったら改行してcntを0に戻す-->
                <?php if ($cnt == 7): ?> 　 </tr>
        
            <tr>
            
                <?php $cnt = 0; ?>
                <?php endif; ?>

                <?php endforeach; ?> 　 </tr>
        </table>
        <br>

        <!--確定ボタン-->
        <p><input class="decorated-btn click-down" type="submit" value="送信する" action="Page3.php"></p>
        <br>
        <br>

        <footer>
            <footer>
            
                <ul class="footer-menu">
                    <li>home ｜</li>
                    <li>about ｜</li>
                    <li>service ｜</li>
                    <li>Contact Us</li>
                </ul>
                <p>© All rights reserved by </p>
            </footer>

    </center>
</body>

</html>