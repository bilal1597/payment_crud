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
        <div class="card">
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>

    @endif



        <div class="card-header ">
            <h1>Forgot Your Passowrd? </h1>
            <span>Enter your Email to change password</span>

            <div class="card-body">
                <form class="row g-3" action="{{route('user.forgot')}}" method="POST" >
                    @csrf

                    <div class="col-md-10">
                      <label for="inputEmail4" class="form-label">Email</label>
                      <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="inputEmail4">
                      @error('email')
                          <span class="text-danger" >{{$message}}</span>
                      @enderror

                    </div>


                    <div class="col-12">
                      <button type="submit" class="btn btn-primary">Send Paasword Reset Link</button>
                    </div>
                  </form>
            </div>
        </div>
        </div>

    </div>
</body>
</html>
