<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    .latest-news {
    font-family: Arial, sans-serif;
    padding: 20px;
}

.news-item {
    margin-bottom: 20px;
    border-bottom: 1px solid #ccc;
}

.title {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

.date {
    font-style: italic;
    color: #666;
}

</style>
</head>
<body>
<div class="latest-news">
   <h1><?php echo e($tin->tieuDe); ?></h1>
   <h3><?php echo e($tin->tomTat); ?></h3>
    <div id="noidung"><?php echo $tin->noiDung; ?></div>
</div>
</body>
</html>
<?php /**PATH D:\Lập trình PHP3\lab\lab2\la2\resources\views/chitiettin.blade.php ENDPATH**/ ?>