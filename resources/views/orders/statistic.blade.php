<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <title>Statistics</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center my-5">Statistiche Ristorante</h2>
        <div class="m-5">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // === include 'setup' then 'config' above ===

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

</body>
