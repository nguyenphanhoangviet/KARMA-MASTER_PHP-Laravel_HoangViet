<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sách</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div style="max-width: 800px; margin: 0 auto; padding: 20px;">
        <h1>Danh sách sách</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sách</th>
                    <th>Giá</th>
                    <th>Hình</th>
                    <th>Nhà xuất bản</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->price }}</td>
                        <td><img src="{{ asset($book->image) }}" alt="{{ $book->title }}" style="width: 100px;"></td>
                        <td>{{ $book->publisher }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
