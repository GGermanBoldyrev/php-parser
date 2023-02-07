<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/public/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
    <title>GB Project</title>
</head>
<body>
<div class="container">
    <header class="main_header">
        <?php include '../view/viewParts/header_view.php' ?>
    </header>
    <main class="main_content">
        <div class="select_block">
            <?php include '../view/viewParts/dropdown_view.php' ?>
        </div>
        <div class="items_block_empty">
            <?php include '../view/viewParts/items_block_empty.php' ?>
        </div>
        <div class="items_block_low_price">
            <?php include '../view/viewParts/items_block_low_price.php' ?>
        </div>
        <div class="items_block_top_price">
            <?php include '../view/viewParts/items_block_top_price.php' ?>
        </div>
        <div class="items_block_top_discount">
            <?php include '../view/viewParts/items_block_top_discount.php' ?>
        </div>
    </main>
</div>
<div class="button">
    <button class="up_button">↑</button>
</div>
<script src="js/index.js"></script>
</body>
</html>