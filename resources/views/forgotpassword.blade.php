<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Amir Hossein Abdeh" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot password</title>
    <link rel="stylesheet" href="/assets/style/forgot1.css">
    <link rel="icon" type="image/jpg" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="container text-center">
        <div>
            <p>
            <h5 style="color: rgb(33, 36, 41);">لطفا ایمیل خود را جهت بازیابی وارد کنید.</h5>
            </p>
        </div>
    </header>

    <div class="container text-center">
        <form action="/forgotPassword" method="post">
            @csrf
            <div class="form-group m-auto">
                <div class="form-control">
                    <input type="email" name="email" id="email" placeholder="پست الکترونیک" autofocus />
                </div>
                <div class="form-control">
                    <input class="btn btn-dark" type="submit" value="بعدی" />
                </div>
            </div>

            @session('message')
            <p style="color: green"> {{ session('message') }} </p>
            @endsession
        </form>

        @if ($errors->any())
            <div class="error-box">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
</body>

</html>
