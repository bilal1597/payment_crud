<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
            <h1>Add User </h1>
            <a href="{{route('view.login')}}" class="btn btn-success float-end">Login </a> <br> <br>
            </div>


                <div class="card-body">
                    <form action="{{route('user.save')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Full name *</label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control"  id="formGroupExampleInput" placeholder="Enter Full name">
                        @error('name')
                            <span class="text-danger">{{$message}} </span>
                        @enderror
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Mobile Number *</label>
                            <input name="mobile" type="number" value="{{ old('mobile') }}" class="form-control"  id="formGroupExampleInput" placeholder="Enter Full Mobile Number">
                        @error('mobile')
                            <span class="text-danger">{{$message}} </span>
                        @enderror
                        </div>

                          <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Email *</label>
                            <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="formGroupExampleInput2" placeholder="Enter Email">
                            @error('email')
                            <span class="text-danger">{{$message}} </span>
                        @enderror
                        </div>
                          <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Password *</label>
                            <input name="password" type="password" class="form-control" id="formGroupExampleInput2" placeholder="Enter Password">
                            @error('password')
                            <span class="text-danger">{{$message}} </span>
                        @enderror
                        </div>
                          <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Confirm Password *</label>
                            <input name="password_confirm" type="password" class="form-control" id="formGroupExampleInput2" placeholder="confirm Password">
                            @error('password_confirm')
                            <span class="text-danger">{{$message}} </span>
                        @enderror
                        </div>
                          <button type="submit" class="btn btn-primary">Save</button>
                    </form>

            </div>
        </div>
    </div>
</body>
</html>
