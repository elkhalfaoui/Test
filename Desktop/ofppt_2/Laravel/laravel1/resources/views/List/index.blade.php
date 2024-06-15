<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    try {
        //code...
        DB::connection()->getPdo();
        if (DB::connection()-> getDatabaseName()) {
            echo "Successfully connected to the db" . DB::connection()->getDatabaseName();
        } else {
            die('Could not find the database');
        }
    } catch (\Exception $e) {
        //throw $th;
        die('Could not find the database'. $e);

    }    
    ?>
</body>
</html>