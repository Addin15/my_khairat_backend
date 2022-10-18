<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <form action="{{ route('admin.login') }}" method="post">
        @csrf
        <section class="vh-100" style="background-color: #508bfc;">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
          
                      <h3 class="mb-5">Sign in</h3>
                      
                      @if(isset($error))
                      <div class="alert alert-danger" role="alert">
                        {{ $error }}
                      </div>
                      @endif
          
                      <div class="form-outline mb-4">
                        <label class="form-label" >Email</label>
                        <input type="email" id="typeEmailX-2" class="form-control form-control-lg" name="email" value="{{old('email')}}"/>
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                      </div>
          
                      <div class="form-outline mb-4">
                        <label class="form-label" >Password</label>
                        <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password"/>
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                      </div>
          
                      <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                      
          
                      <hr class="my-4">
                      <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item ms-3">
            <button class="btn"><a href="{{ route('admin.register') }}">Register</a></button>
          </li>
        </ul>
          
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    </form>
</body>
</html>