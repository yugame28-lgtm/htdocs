<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>PHP基礎編</title>
</head>

<body>
    <p>
        <?php
        // ここにコードを書いていく
        function sort_2way($array, $order) {
    if ($order) {
        echo '昇順でソートします。<br>';
        sort($array);
    } else {
        echo '降順でソートします。<br>';
        rsort($array);
    }

    foreach ($array as $num) {
        echo $num . '<br>';
    }
}
$nums = [15, 4, 18, 23, 10];

// 昇順呼び出し（第2引数: true）
sort_2way($nums, true);

// 降順呼び出し（第2引数: false）
sort_2way($nums, false);
        ?>
    </p>
</body>

</html>