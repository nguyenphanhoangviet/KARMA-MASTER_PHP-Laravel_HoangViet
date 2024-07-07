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
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($book->id); ?></td>
                        <td><?php echo e($book->title); ?></td>
                        <td><?php echo e($book->price); ?></td>
                        <td><img src="<?php echo e(asset($book->image)); ?>" alt="<?php echo e($book->title); ?>" style="width: 100px;"></td>
                        <td><?php echo e($book->publisher); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\lab1\ThiPHP3\resources\views/index.blade.php ENDPATH**/ ?>