<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset Successfully</title>
</head>
<body>
    <div style="align: center; font-size: 25px">
        <p> Your new Passowrd is: <pre>{{ session('password') }}</pre></p>
    </div>
</body>
</html>