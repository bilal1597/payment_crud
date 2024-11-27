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
    <div class="card-header">
        <h1>Welcome to Product Page </h1>
        <h1> {{Auth::user()->name }} </h1>

        <a href="{{route('logout')}}" class="btn btn-danger float-end">Sign Out</a><br> <br>
  </div>
  <div class="card-body">
    <a href="{{route('viewAdd.product')}}" class="btn btn-success float-start ">Add product</a>
    <br><br>
    <form action="" method="POST">
        @csrf
        <table class="table table-bordered table-sm table-striped " >
            <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Details</th>
                  <th scope="col">Price</th>
                  <th scope="col" colspan="2">Actions</th>
                </tr>
                <tbody>
                    @foreach ($collection as $item)
                    <tr>
                        <td>{{$loop ->iteration}} </td>
                        <td>{{$item ->product_name}} </td>
                        <td>{{$item ->details}} </td>
                        <td>${{$item ->price}}</td>

                        <td> <a class="btn  btn-info" href="{{route('view.product',$item->id)}}">Edit</a></td>
                        <td> <form action="{{route('delete.product', $item ->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this Product?');" >Delete</button>
                        </form> </td>
                    </tr>
                    @endforeach
                </tbody>
              </thead>
        </table>
    </form>
    <form action="{{route('checkout')}}" method="POST">
        @csrf
        <button href="" class="btn btn-success float-end ">Check Out</button>
    </form>
  </div>
</div>


</body>
</html>

