<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Symfony!</title>
</head>
<body>
<h1><?= $page_title ?></h1>

<ul id="navigation">
    <?php foreach ($data as $item) { ?>
    <li><?= $item['source'] ?> - <?= $item['timestamp'] ?></li>
    <?php } ?>
</ul>
</body>
</html>