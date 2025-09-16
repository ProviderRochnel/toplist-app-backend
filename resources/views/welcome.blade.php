<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Top List Rest Api </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class=" d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Top List Rest Api</h5>
            <p class="card-text">That is a scramble tools use for visualize a different routes of our api.</p>
            <a href="{{ url('/docs/api') }}" class="btn btn-outline-info">Go to documentation</a>
        </div>
    </div>

</body>

</html>