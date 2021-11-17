<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deliveboo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <searchbar></searchbar>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-4 col-md-3 col-lg-2 border">
                    <sidebar></sidebar>
                </div>
                <div class="col-8 col-md-9 col-lg-10 border">

                    <results></results>

                </div>
            </div>
        </div>
    </div>


</body>

</html>
