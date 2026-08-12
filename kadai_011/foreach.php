<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- 基本設定 -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO対策 -->
    <title>課題011</title>
    
</head>
<body>
        <?php
        $shop_items = ["名前" => "玉ねぎ", "値段" => "200", "産地" => "北海道"];

        foreach ($shop_items as $key => $value) {
            echo "{$key}:{$value}<br>";
        }

        ?>
</body>
</html>