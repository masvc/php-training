<?php
// フォームから送信されたデータを受け取る
$name = $_POST["name"];
$tel = $_POST["tel"];
$mail = $_POST["mail"];
$area = $_POST["area"];
$language = $_POST["language"];

// チェックボックスの処理（選択されたスキル名を配列として受け取る）
$skills = isset($_POST["skill"]) ? implode(", ", $_POST["skill"]) : "なし";  // 選択されたスキル名をカンマ区切りで保存

// 送信されたデータを行ごとにまとめる
$csdata =
    "name: " . $name . "\n" .
    "tel: " . $tel . "\n" .
    "mail: " . $mail . "\n" .
    "area: " . $area . "\n" .
    "language: " . $language . "\n" .
    "skills: " . $skills . "\n";  // 各データの後に改行を挿入
// データをファイルに書き込む
$file = fopen("data.txt", "a");
fwrite($file, $csdata . "\n");
fclose($file);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォーム完了画面</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php include("include/header.html"); ?>

    <main>
        <h1>書き込みしました。</h1>
        <a href="data.txt">データの確認</a>
        <p>今回追加されたデータの内容は下記</p>
        <div class="csd">
            <?php
            // 書き込んだデータを表示
            echo nl2br(htmlspecialchars($csdata));
            ?>
        </div>
    </main>

    <?php include("include/footer.html"); ?>

</body>

</html>