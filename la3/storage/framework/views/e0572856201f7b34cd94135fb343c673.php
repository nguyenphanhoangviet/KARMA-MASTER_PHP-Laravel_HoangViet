<head>
    <title><?php echo $__env->yieldContent('tieudetrang'); ?>
    </title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <style>
        .container>header {
            height: 220px
        }

        .container>nav {
            height: 60px
        }

        .container>footer {
            height: 90px
        }

        .container>main {
            display: flex;
            min-height: 500px
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="bg-primary"></header>
        <nav class="bg-warning">
            <?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
        </nav>
        <main>
            <article class="col-9 bg-light"> <?php echo $__env->yieldContent('noidung'); ?>

            </article>
            <aside class="col-3 bg-info">
                THÔNG TIN BỔ SUNG
            </aside>
        </main>
        <footer class="bg-dark">PHÁT TRIỂN BỞI XYZ</footers </div>
</body><?php /**PATH C:\xampp\htdocs\laravel\lab1\la3\resources\views/layout.blade.php ENDPATH**/ ?>