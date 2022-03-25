<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Supply</title>
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
    <link href="toast.style.min.css" rel="stylesheet">

</head>

<body>
    <div class="root">
        <!-- header section -->
        <header>
            <!-- navigation bar -->
            @include("frontend.body.header");
            @yield("slider")
        </header>
            @yield("frontend");
            <!-- header section -->
     

    <!-- font-icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- animate -->
    <script src="{{asset("frontend/aos/aos.js")}}"></script>
    <!-- main cript -->
    <script src="{{asset("frontend/script/main.script.js")}}"></script>
</body>

</html>
