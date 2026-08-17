<?php

// セッションを開始
session_start();

// POSTリクエストから入力データを取得
$employee_name = $_POST['employee_name'];
$employee_age = $_POST['employee_age'];
$department = $_POST['department'];

// エラーメッセージを格納する配列
$errors = []; // 最初はエラーなし

// 社員名のバリデーション
if (empty($employee_name) ) {
    $errors[] = '社員名を入力してください';
}

// 年齢のバリデーション
if (empty($employee_age) ) {
    $errors[] = '年齢を入力してください。';
} elseif ((!is_numeric($employee_age) ) ) {
    $errors[] = '年齢は数値で入力してください。';
}

//入力項目に問題なければセッション・クッキーを保存
if (empty($errors)) {
    // セッション変数を保存
    $_SESSION['employee_name'] = $employee_name;
    $_SESSION['employee_age'] = $employee_age;
    $_SESSION['department'] = $department;

    // クッキーを登録（有効期限は1時間）
    setcookie('employee_name', $employee_name, time() + 3600 );
    setcookie('employee_age', $employee_age, time() + 3600 );
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>PHP基礎編</title>
</head>

<body>
    <h2>入力内容をご確認ください。</h2>
    <p>問題なければ「確定」、修正する場合は「キャンセル」をクリックしてください。</p>

    <table border="1">
        <tr>
            <th>項目</th>
            <th>入力内容</th>
        </tr>
        <tr>
            <td>社員名</td>
            <td><?php echo $employee_name; ?></td>
        </tr>
        <tr>
            <td>年齢</td>
            <td><?php echo $employee_age; ?></td>
        </tr>
        <tr>
            <td>所属部署</td>
            <td><?php echo $department; ?></td>
        </tr>
    </table>

    <p>
        <button id="confirm-btn" onclick="location.href='complete.php';">確定</button>
        <button id="cancel-btn" onclick="history.back();">キャンセル</button>
    </p>
    <?php
    // 入力項目にエラーがある場合の処理
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<font color="red">' . $error . '</font><br>';
        }
        echo '<script>document.getElementById("confirm-btn").disabled = true;</script>';
    }
    ?>
</body>

</html>