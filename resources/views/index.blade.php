<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website Under Maintenance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="col-lg-12">
        <div class="container text-center">
            <img src="{{ asset('web_maintenance.gif') }}" class="img-fluid" style="padding-top:30px; ">
            <h1 class="text-light" style="padding-top:20px;">Under Construction - Will be back</h1>
            <p class="text-light">Our website is currently undergoing scheduled maintenance. <br> Should be back shortly. Thank you for your patience. <br> </p>
            <p class="text-light">我們的網站目前正在進行定期維護。 <br>應該很快就會回來。 感謝您的耐心等待。</p>
            <p class="text-light">Your IP Address: <strong>{{ $ip ?? request()->ip() }}</strong></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>

