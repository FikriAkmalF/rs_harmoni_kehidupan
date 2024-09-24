<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png"
    href="https://vignette.wikia.nocookie.net/logopedia/images/6/64/Rumah_Sakit_Jakarta_Medical_Center.png/revision/latest/scale-to-width-down/2000?cb=20191012152118">
    <link rel="stylesheet" href="/css/perawat/perawat.css">
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>
    @include('layout.sidebar_perawat')


    
    <div id="app">
        <perawat></perawat>
        <sidebar></sidebar>
    </div>
    
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>