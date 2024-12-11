<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        use App\Models\Client;
        use Illuminate\Support\Facades\Hash;
        var_dump(Client::auth("robin@icloud.com", "robin"));
    ?>
</body>
</html>