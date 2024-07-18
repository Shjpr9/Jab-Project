<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="This is sign up page." />
    <meta name="keywords" content="Sign up" />
    <meta name="author" content="Amir Hossein Abdeh & Shayan Jafarpour" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign up</title>
    <link rel="icon" type="image/jpg" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style/signup.css">
</head>

<body>
    <header class="container text-center">
        <p>
        <h5>لطفا اطلاعات خود را وارد نمایید.</h5>
        </p>
    </header>

    <div class="container text-center w-50">
        <form action="/signup" method="post">
            @csrf
            <div class="form-group m-auto">
                <div class="form-control">
                    <input class="form-control" type="email" value="{{ old('email') }}" name="email" id="email" placeholder="پست الکترونیک"
                        required autofocus />
                </div>
                <div class="form-control">
                    <input class="form-control" type="text" value="{{ old('phone') }}" name="phone" id="phoneNumber"
                        inputmode="numeric" placeholder="شماره تماس" required />
                </div>
                <div class="form-control">
                    <input class="form-control" type="text" value="{{ old('username') }}" name="username" id="username" placeholder="نام کاربری"
                        required />
                </div>
                <div class="form-control">
                    <input class="form-control" type="password" name="password" id="password" placeholder="گذرواژه"
                        required />
                </div>
                <div class="form-control">
                    <input class="form-check-input" type="checkbox" onclick="myFunction()"> نمایش گذرواژه
                </div>
                <div class="form-control">
                    <select class="form-control" name="state" id="state" onchange="ChangeStateList()" required>
                        <option value="0" selected>لطفا استان را انتخاب کنید</option>
                        <option value="1">آذربایجان شرقی</option>
                        <option value="2">آذربایجان غربی</option>
                        <option value="3">اردبیل</option>
                        <option value="4">اصفهان</option>
                        <option value="5">البرز</option>
                        <option value="6">ایلام</option>
                        <option value="7">بوشهر</option>
                        <option value="8">تهران</option>
                        <option value="9">چهارمحال و بختیاری</option>
                        <option value="10">خراسان جنوبی</option>
                        <option value="11">خراسان رضوی</option>
                        <option value="12">خراسان شمالی</option>
                        <option value="13">خوزستان</option>
                        <option value="14">زنجان</option>
                        <option value="15">سمنان</option>
                        <option value="16">سیستان و بلوچستان</option>
                        <option value="17">فارس</option>
                        <option value="18">قزوین</option>
                        <option value="19">قم</option>
                        <option value="20">کردستان</option>
                        <option value="21">کرمان</option>
                        <option value="22">کرمانشاه</option>
                        <option value="23">کهگیلویه و بویراحمد</option>
                        <option value="24">گلستان</option>
                        <option value="25">گیلان</option>
                        <option value="26">لرستان</option>
                        <option value="27">مازندران</option>
                        <option value="28">مرکزی</option>
                        <option value="29">هرمزگان</option>
                        <option value="30">همدان</option>
                        <option value="31">یزد</option>
                    </select>
                </div>
                <div class="form-control">
                    <select class="form-control" name="city" id="city" required>
                        <option value="0">لطفا شهر را انتخاب کنید</option>
                    </select>
                </div>
                <div class="form-control">
                    <input class="btn btn-dark" type="submit" value="ثبت نام" /></a>
                </div>

                @if ($errors->any())
                <div class="error-box" style="direction: ltr;">
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif


            </div>
        </form>
    </div>
    <script>
        var statesAndCities = {};
        statesAndCities['0'] = ['لطفا شهر را انتخاب کنید'];
        statesAndCities['1'] = ['تبریز', 'مراغه', 'مرند', 'میانه'];
        statesAndCities['2'] = ['ارومیه', 'خوی', 'میاندوآب', 'مهاباد'];
        statesAndCities['3'] = ['اردبیل', 'پارس آباد', 'مشگین شهر', 'خلخال'];
        statesAndCities['4'] = ['اصفهان', 'کاشان', 'خمینی شهر', 'نجف آباد'];
        statesAndCities['5'] = ['کرج', 'هشتگرد', 'نظر آباد', 'محمد شهر'];
        statesAndCities['6'] = ['ایلام', 'ایوان', 'دهلران', 'آبدانان'];
        statesAndCities['7'] = ['بوشهر', 'برازجان', 'گناوه', 'خورموج'];
        statesAndCities['8'] = ['تهران', 'اسلام شهر', 'گلستان', 'قدس'];
        statesAndCities['9'] = ['شهر کرد', 'بروجن', 'فرخ شهر', 'فارسان'];
        statesAndCities['10'] = ['بیرجند', 'قائن', 'فردوس', 'نهبندان'];
        statesAndCities['11'] = ['مشهد', 'سبزوار', 'نیشابور', 'تربت حیدریه'];
        statesAndCities['12'] = ['بجنورد', 'شیروان', 'اسفراین', 'گرمه جاجرم'];
        statesAndCities['13'] = ['اهواز', 'دزفول', 'آبادان', 'خرمشهر'];
        statesAndCities['14'] = ['زنجان', 'ابهر', 'خرمدره', 'قیدار'];
        statesAndCities['15'] = ['سمنان', 'شاهرود', 'دامغان', 'گرمسار'];
        statesAndCities['16'] = ['زاهدان', 'زابل', 'ایرانشهر', 'چابهار'];
        statesAndCities['17'] = ['شیراز', 'کازرون', 'جهرم', 'لار', 'مرودشت'];
        statesAndCities['18'] = ['قزوین', 'تاکستان', 'الوند', 'اقبالیه'];
        statesAndCities['19'] = ['قم', 'قنوات', 'جعفریه', 'کهک'];
        statesAndCities['20'] = ['سنندج', 'سقز', 'مریوان', 'بانه'];
        statesAndCities['21'] = ['کرمان', 'سیرجان', 'رفسنجان', 'جیرفت'];
        statesAndCities['22'] = ['کرمانشاه', 'اسلام آباد غرب', 'هرسین', 'کنگاور'];
        statesAndCities['23'] = ['یاسوج', 'دوگنبدان', 'دهدشت', 'لیکک'];
        statesAndCities['24'] = ['گرگان', 'گنبد کاووس', 'علی آباد کتول', 'بندر ترکمن'];
        statesAndCities['25'] = ['رشت', 'بندر انزلی', 'لاهیجان', 'لنگرود'];
        statesAndCities['26'] = ['خرم آباد', 'بروجرد', 'دورود', 'کوهدشت'];
        statesAndCities['27'] = ['ساری', 'بابل', 'آمل', 'قائم شهر'];
        statesAndCities['28'] = ['اراک', 'ساوه', 'خمین', 'محلات'];
        statesAndCities['29'] = ['بندرعباس', 'میناب', 'دهبارز', 'بندر لنگه'];
        statesAndCities['30'] = ['همدان', 'ملایر', 'نهاوند', 'تویسرکان'];
        statesAndCities['31'] = ['یزد', 'میبد', 'اردکان', 'بافق'];

        function ChangeStateList() {
            var stateList = document.getElementById("state");
            var cityList = document.getElementById("city");
            var selState = stateList.options[stateList.selectedIndex].value;
            while (cityList.options.length) {
                cityList.remove(0);
            }
            var states = statesAndCities[selState];
            if (states) {
                var i;
                for (i = 0; i < states.length; i++) {
                    var state = new Option(states[i], i);
                    cityList.options.add(state);
                }
            }
        }
    </script>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type == "password") {
                x.type = "text";
            }
            else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>