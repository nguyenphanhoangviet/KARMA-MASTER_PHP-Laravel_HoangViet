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
    <h1>Tin mới nhất</h1>
    @php 
    foreach($data as $tin){
        echo "<div class='news-item'>";
        echo "<p class='title'>{$tin->tieuDe}</p>";
        echo "<p class='date'><em> Ngày đăng: {$tin->ngayDang}</em></p>";
        echo "</div>";
    }
    @endphp
</div>
</body>
</html>
