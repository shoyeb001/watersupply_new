<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous"
  />
    <link rel="stylesheet" href="{{asset("backend2/styles/main.style.css")}}">
    <title>Document</title>
</head>
<body>

  @include("admin2.body.header");



    <div id="wrapper">

        <!-- Sidebar -->
        @include("admin2.body.sidebar");
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        @yield("admin");
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>
<script src="https://kit.fontawesome.com/9fafafc83d.js" crossorigin="anonymous"></script>
  <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
  ></script>
<script src="{{asset("backend2/script/main.script.js")}}"></script>
</html>
