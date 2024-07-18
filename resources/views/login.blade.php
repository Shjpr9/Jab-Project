<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="This is log in page." />
    <meta name="keywords" content="Log in" />
    <meta name="author" content="Amir Hossein Abdeh & Shayan Jafarpour" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log in</title>
    <link rel="icon" type="image/jpg" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style/login.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <header class="container text-center">
        <p>
        <h5>لطفا اطلاعات خود را وارد نمایید.</h5>
        </p>
    </header>

    <div class="container text-center w-50">
        <form action="/login" method="POST">
            <div class="form-group m-auto">
                @csrf
                <div class="form-control">
                    <input class="form-control w-2" type="email" name="email" id="email" placeholder="پست الکترونیک"
                        required autofocus />
                    @error('email')
                    <div class="error-box">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-control">
                    <input class="form-control" type="password" name="password" id="password" placeholder="گذرواژه"
                        required />
                    @error('password')
                    <div class="error-box">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-control">
                    <input class="form-check-input" type="checkbox" onclick="myFunction()"> نمایش گذرواژه
                </div>
                <div class="form-control">
                    <a href="forgotpassword1.html" target="_blank">گذرواژه خود را
                        فراموش کرده اید؟</a>
                </div>
                <div class="form-control">
                    <input class="btn btn-dark" type="submit" value="ورود" /></a>
                </div>

                <div class="g-recaptcha m-auto" data-sitekey="6LfuWeYpAAAAAJXkLuOHVBtQw9ZD3jIZuCbc4dgH"></div>

                @if ($errors->any())
                <div class="error-box">
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <p>حساب کاربری ندارید؟ <a href="/signup">ثبت نام</a></p>
                @if (session('successSignup'))
                    <p style="color: green">با موفقیت ثبت نام شدید.</p>
                @endif

            </div>
        </form>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            }
            else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>