  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="icon" type="image/png"
          href="https://vignette.wikia.nocookie.net/logopedia/images/6/64/Rumah_Sakit_Jakarta_Medical_Center.png/revision/latest/scale-to-width-down/2000?cb=20191012152118">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="/css/login.css">
      <title>Rs Harmoni Kehidupan</title>
      @vite(['resources/js/app.js', 'resources/sass/app.scss'])
  </head>

  <body>
      <div id="app">
          <login></login>
          <div class="container">
              <div class="row justify-content-center align-items-center vh-100">
                  <h1><b>RS Harmoni Kehidupan</b></h1>
                  <div class="col-md-8">
                      <img src="/img/bg_login.png" alt="Medical Staff" class="img-login">
                  </div>
                  <div class="col-md-4">
                      <div class="card-login">
                          <img src="/img/heartbeat.png" alt="Rumah Sakit Logo" class="mx-auto d-block">
                          @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $item)
                                          <li>{{ $item }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif
                          <form action="" method="POST">
                              @csrf
                              <div class="mb-3">
                                  <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                      placeholder="Email" id="email">
                              </div>
                              <div class="mb-3">
                                  <input type="password" name="password" class="form-control" placeholder="Password"
                                      id="password">
                              </div>
                              <button name="submit" type="submit" class="btn btn-primary w-100">Login</button>
                          </form>
                          <p class="mt-2" style="font-size: 15px;">Don't have an account yet? <a href="/register"
                                  class="login"><b>Register</b></a>
                          </p>
                      </div>
                  </div>
              </div>
          </div>
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script src="{{ asset('/js/app.js') }}"></script>

          @if ($message = Session::get('success'))
              <script>
                  Swal.fire("Berhasil logout!");
              </script>
          @endif
  </body>

  </html>
