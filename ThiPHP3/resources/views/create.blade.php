<!DOCTYPE html>
<html>
<head>
    <title>Thêm Sách</title>
    <style>
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group span {
            color: red;
            font-style: italic;
        }
        .btn {
            background-color: blue;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: darkblue;
        }
        .alert {
            margin-top: 20px;
            padding: 10px;
            color: green;
            border: 1px solid green;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc;">
        <h1>Thêm sách</h1>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Tên sách</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}">
                @error('title')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="text" id="price" name="price" value="{{ old('price') }}">
                @error('price')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Hình</label>
                <input type="file" id="image" name="image">
                @error('image')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="publisher">Nhà xuất bản</label>
                <input type="text" id="publisher" name="publisher" value="{{ old('publisher') }}">
                @error('publisher')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn">Thêm</button>
        </form>
    </div>
</body>
</html>
