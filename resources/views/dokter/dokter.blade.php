    @vite(['resources/js/app.js', 'resources/sass/app.scss'])

    <body>
        @include('layout.sidebar_dokter')

        <div id="app">
            <dokter></dokter>
            <sidebar></sidebar>
        </div>

        <script src="{{ asset('/js/app.js') }}"></script>
    </body>

    </html>
