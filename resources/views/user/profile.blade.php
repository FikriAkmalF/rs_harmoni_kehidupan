<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/pasien/profile.css">
    <title>Harmoni Kehidupan</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>
    @include('layout.sidebar')
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3 mx-auto mt-4">
            <input type="text" class="form-control" name="name" id="name" placeholder="Nama" required>
            <label for="name">{{ Auth::user()->name }}</label>
        </div>
        <div class="form-floating mb-3 mx-auto">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            <label for="email">{{ Auth::user()->email }}</label>
        </div>
        <div class="form-floating mb-3 mx-auto">
            <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="no_hp" required>
            <label for="no_hp">{{ Auth::user()->no_hp }}</label>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>


    <!-- Button trigger modal -->
    <div class="d-flex justify-content-center mt-4">
        <a type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Reset Password
        </a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Notifications -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success text-center">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <form action="{{ route('password.reset') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="form-floating mb-3 mx-auto">
                                <input type="password" class="form-control" name="old_password" id="old_password"
                                    placeholder="Old Password" required>
                                <label for="old_password">Password Lama</label>
                            </div>
                            <div class="form-floating mb-3 mx-auto">
                                <input type="password" class="form-control" name="new_password" id="new_password"
                                    placeholder="New Password" required>
                                <label for="new_password">Password Baru</label>
                            </div>
                            <div class="form-floating mb-3 mx-auto">
                                <input type="password" class="form-control" name="new_password_confirmation"
                                    id="new_password_confirmation" placeholder="Confirm New Password" required>
                                <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="app">
        <sidebar></sidebar>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('/js/app.js') }}"></script>

    @if ($message = Session::get('failed'))
        <script>
            Swal.fire(' {{$message }} ');
        </script>
    @endif
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "Profile Anda berhasil diperbarui!",
                icon: "success"
            });
        </script>
    @endif
    @if ($message = Session::get('berhasil'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "Password Anda berhasil diperbarui!",
                icon: "success"
            });
        </script>
    @endif
</body>

</html>
