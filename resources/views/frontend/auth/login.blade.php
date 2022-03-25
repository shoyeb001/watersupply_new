<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Supply - Login</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap"
        rel="stylesheet">
    <!-- animate aos -->
    <link rel="stylesheet" href="{{asset("frontend/aos/aos.css")}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset("frontend/styles/main.styles.css")}}">
</head>

<body>
    <div class="root">
        <section class="sign">
            <form action="{{route("user.login")}}" method="POST">
                @csrf
                <div class="wrapper">
                    <div class="title">
                        <div class="display-inline justify-center">
                            <img src="{{asset("frontend/assets/logo.png")}}" alt="logo">
                            <h2>Water Supply</h2>
                        </div>
                        <h1>Login</h1>
                        <p>Don't have an account? <a href="./sign_up.html"> Create here</a></p>
                    </div>
                    <div class="form">
                        <div class="inputfield">
                            <label>Phone No: <span>*</span></label>
                            <input type="number" class="input" name="phone_no" required>
                        </div>
                        <div class="inputfield">
                            <label>password <span>*</span></label>
                            <input type="password" class="input" name="password" required>
                        </div>
                        <div>
                            <div class="inputfield terms">
                                <label class=" check">
                                <input type="checkbox" name="remember_me">
                                <span class="checkmark"></span>
                                </label>
                                <p>Remember me</p>
                            </div>
                        </div>
                        <div class="inputfield">
                            <input type="submit" value="Login" class="btn">
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>

    <!-- font-icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- animate -->
    <script src="{{asset("frontend/aos/aos.js")}}"></script>
    <!-- main cript -->
    <script src="{{asset("frontend/script/main.script.js")}}"></script>
</body>

</html>
