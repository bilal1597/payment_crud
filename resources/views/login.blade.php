<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Crud</title>
</head>
<body>
    <div class="container">
        <div class="card-header ">
            <h1>Login Page </h1>
            <a href="register" class="btn btn-success float-end">Registeration</a> <br> <br>
            <div class="card-body">
                <form class="row g-3" action="{{route('user.auth')}}" method="POST" >
                    @csrf
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif


                    <div class="col-md-10">
                      <label for="inputEmail4" class="form-label">Email</label>
                      <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="inputEmail4">
                      @error('email')
                          <span class="text-danger" >{{$message}}</span>
                      @enderror

                    </div>
                    <div class="col-md-10">
                      <label for="inputPassword4" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="inputPassword4">
                      @error('password')
                      <span class="text-danger" >{{$message}}</span>
                  @enderror
                    </div>

                    {{-- <div class="col-md-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                    </div> --}}


                    <div class="col-12">
                      <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                    <div class="col-12">
                        <a href="/forgot" class="btn btn-primary float-end">Forgot Your Password</a>
                      </div>
                  </form>
            </div>
        </div>

    </div>
</body>
</html>
