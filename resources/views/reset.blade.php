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
            <h1>Reset Password </h1>

            <div class="card-body">
                <form class="row g-3" action="{{route('reset' , $token)}}" method="POST" >
                    @csrf

                    <div class="col-md-10">
                      <label for="inputPassword4" class="form-label">Password</label>
                      <input type="password" value="{{old('password')}}" name="password" class="form-control" id="inputPassword4">
                      @error('password')
                      <span class="text-danger" >{{$message}}</span>
                  @enderror
                    </div>


                <div class="col-md-10">
                  <label for="inputPassword4" class="form-label">Confirm Password</label>
                  <input type="password" name="password_confirm" class="form-control" id="inputPassword4">
                  @error('password_confirm')
                  <span class="text-danger" >{{$message}}</span>
              @enderror
                </div>



                    <div class="col-12">
                      <button type="submit" class="btn btn-primary">Reset Password</button>
                    </div>

                  </form>
            </div>
        </div>

    </div>
</body>
</html>
