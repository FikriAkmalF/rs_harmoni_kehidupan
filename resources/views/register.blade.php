<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png"
        href="https://vignette.wikia.nocookie.net/logopedia/images/6/64/Rumah_Sakit_Jakarta_Medical_Center.png/revision/latest/scale-to-width-down/2000?cb=20191012152118">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/css/register.css">
    <title>RS Harmoni Kehidupan</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>
    <div id="app">
        <register></register>

        <div class="card-register">
            <img src="img/heartbeat.png" alt="Rumah Sakit Logo" style="margin-top: -20px">
            <h4 style="margin-left: 20px; margin-top: -22px;">Harmoni Kehidupan</h4>
            <!-- Notifikasi Sukses -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- Notifikasi Error -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('register-proses') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Nama"
                        value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email"
                        value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <input type="text" name="no_hp" class="form-control" placeholder="Nomor HP"
                        value="{{ old('no_hp') }}">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Konfirmasi Password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100">Register</button>
            </form>

            <p style="text-align: center;">Already have an account? <a href="/rs_login"
                    class="register"><b>Login</b></a>
            </p>
        </div>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>

</body>

</html>
