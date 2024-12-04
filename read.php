<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>参加者管理リスト</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php include("include/header.html"); ?>

    <main>
        <?php
        // データファイルから読み込む
        $filename = "data.txt";
        $fp = fopen($filename, "r");

        // 読み込んだデータを表示
        while (!feof($fp)) {
            $txt = fgets($fp);
            $data = explode(", ", $txt);

            // 名前の表示
            foreach ($data as $line) {
                if (strpos($line, "name:") === 0) {
                    $name = str_replace("name: ", "", $line);
                    echo "ーーーーー" . "\n" .
                        "<section class='name'><strong>名前：</strong>" . htmlspecialchars($name) . "</section>";
                }

                // TELの表示
                if (strpos($line, "tel:") === 0) {
                    $tel = str_replace("tel: ", "", $line);
                    echo "<section class='contact'><strong>TEL：</strong><span class='tel'>" . htmlspecialchars($tel) . "</span></section>";
                }

                // メールの表示
                if (strpos($line, "mail:") === 0) {
                    $mail = str_replace("mail: ", "", $line);
                    echo "<section class='contact'><strong>メール：</strong><span class='mail'>" . htmlspecialchars($mail) . "</span></section>";
                }

                // エリアの表示
                if (strpos($line, "area:") === 0) {
                    $area = str_replace("area: ", "", $line);
                    echo "<section class='contact'><strong>エリア：</strong><span class='area'>" . htmlspecialchars($area) . "</span></section>";
                }

                // 言語の表示
                if (strpos($line, "language:") === 0) {
                    $language = str_replace("language: ", "", $line);
                    echo "<section class='language'><strong>言語：</strong>" . htmlspecialchars($language) . "</section>";
                }

                // スキルの表示
                if (strpos($line, "skills:") === 0) {
                    $skills = str_replace("skills: ", "", $line);
                    $skillsArray = explode(", ", $skills); // カンマ区切りでスキルを配列に分ける
                    echo "<section class='skill'><strong>スキル：</strong>";
                    foreach ($skillsArray as $skill) {
                        echo "<span class='skill-tag'>#" . htmlspecialchars($skill) . "</span> "; // 各スキルをタグ形式で表示
                    }
                    echo "</section>";
                }
            }
        }

        fclose($fp);
        ?>
    </main>

    <?php include("include/footer.html"); ?>

</body>

</html>