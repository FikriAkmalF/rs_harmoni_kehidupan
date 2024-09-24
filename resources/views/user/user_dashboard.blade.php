    <link rel="icon" type="image/png"
        href="https://vignette.wikia.nocookie.net/logopedia/images/6/64/Rumah_Sakit_Jakarta_Medical_Center.png/revision/latest/scale-to-width-down/2000?cb=20191012152118">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/pasien/user_dashboard.css">
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
<body>
    @include('layout.sidebar')
    <div id="app">
        <user></user>
        <sidebar></sidebar>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>
</body>

</html>
