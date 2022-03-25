<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Supply- Signup</title>
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
            <form action="{{route("user.signup")}}" method="POST">
                @csrf
                <div class="wrapper">
                    <div class="title">
                        <div class="display-inline justify-center">
                            <img src="{{asset("frontend/assets/logo.png")}}" alt="logo">
                            <h2>Water Supply</h2>
                        </div>
                        <h1>Create an Account</h1>
                        <p>{{session("msg")}}</p>
                        <p>Already have an account? <a href="./login.html">Login</a></p>
                    </div>
                    <div class="form">
                        <div class="inputfield">
                            <label>Username: <span>*</span></label>
                            <input type="text" name="username" class="input" required>
                        </div>
                        <div class="inputfield">
                            <label>Email Id: <span>*</span></label>
                            <input type="text" name="email" class="input" required>
                        </div>
                        <div class="inputfield">
                            <label>Phone No: <span>*</span></label>
                            <input type="number" name="phone_no" class="input" required>
                        </div>
                        <div class="inputfield">
                            <label>Pin No: <span>*</span></label>
                            <input type="number" name="pin_no" class="input" required>
                        </div>
                        <div class="inputfield">
                            <label>City <span>*</span></label>
                            <div class="custom_select">
                                <select name="city" required>
                                    <option value="">Select</option>
                                    <option value="Kolkata">Kalkata</option>
                                    <option value="Burdwan">Burdwan</option>
                                </select>
                            </div>
                        </div>
                        <div class="inputfield">
                            <label>Country <span>*</span></label>
                            <div class="custom_select">
                                <select name="country" required>
                                    <option value="">Select</option>
                                    <option value="India">India</option>
                                </select>
                            </div>
                        </div>
                        <div class="inputfield"> 
                            <label>State <span>*</span></label>
                            <div class="custom_select">
                                <select name="state" required>
                                    <option value="">Select</option>
                                    <option value="Bihar">Behir</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                            </div>
                        </div>
                        <div class="inputfield">
                            <label>password <span>*</span></label>
                            <input type="password" name="password" class="input" required>
                        </div>
                        <div class="inputfield">
                            <label>Confirm Password <span>*</span></label>
                            <input type="password" name="confirm_password" class="input" required>
                        </div>
                        <div class="inputfield">
                            <label>Full Address1 <span>*</span></label>
                            <textarea class="textarea" name="full_address_1" required></textarea>
                        </div>
                        <div class="inputfield">
                            <label>Full Address2</label>
                            <textarea class="textarea" name="full_address_2"></textarea>
                        </div>
                        <div class="inputfield terms">
                            <label class="check">
                                <input type="checkbox" required>
                                <span class="checkmark"></span>
                            </label>
                            <p>Agreed to terms and conditions</p>
                        </div>
                        <p class="note">Note:Your personal data will be used to support your experience throughout this
                            website, to manage access to your account, and for other purposes described in our privacy
                            policy</p>
                        <div class="inputfield">
                            <input type="submit" value="Register" class="btn">
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
