<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>応募フォーム</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <?php include("include/header.html"); ?>

    <main>
        <div class="htu">
            <h1>How to use!</h1>
            <p>
                参加者管理リスト。入力した人のデータがリスト化して見れるようにしました。
            </p>
        </div>

        <div>
            <form action="write.php" method="post" id="form">
                <label for="name">Name：</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="tel">TEL：</label>
                <input type="tel" id="tel" name="tel" required>
                <br>
                <label for="mail">Mail：</label>
                <input type="email" id="mail" name="mail" required>
                <br>
                <label for="area">Area：</label>
                <input type="text" id="area" name="area" required>
                <br>
                <label for="language">Language：</label>
                <select id="language" name="language" required>
                    <option value="japanese">Japanese</option>
                    <option value="english">English</option>
                    <option value="other">Other</option>
                </select>
                <br>
                <label>Skill:</label>
                <br>
                ・HTML <input type="checkbox" name="skill[]" value="HTML">
                ・CSS <input type="checkbox" name="skill[]" value="CSS">
                ・JavaScript <input type="checkbox" name="skill[]" value="JavaScript">
                ・PHP <input type="checkbox" name="skill[]" value="PHP">
                <br>
                <input type="submit" value="送信する">
            </form>
        </div>
    </main>

    <?php include("include/footer.html"); ?>

    <script>
        $(document).ready(function() {
            $('#form').on('keydown', function(event) {
                if (event.key === 'Enter' && event.target.tagName !== 'TEXTAREA') {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>

</html>