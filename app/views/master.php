<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master template</title>
</head>
<body>
    <h1>Aqui é o <?php echo $name; ?></h1>

    <div class="container">
        <?php require $view; ?>
    </div>
</body>
</html>