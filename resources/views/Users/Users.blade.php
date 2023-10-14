<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>

            <th scope="col">city</th>
            <th scope="col">Address</th>
            <th scope="col">gender</th>
            <th scope="col">phone</th>
            <th scope="col">img</th>
            <th scope="col">role</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            {{-- {{dd($data)}} --}}
            @foreach ($data as $index)


          <tr>
            
            <td>{{$index["id"]}}</td>
            <td>{{$index["name"]}}</td>
            <td>{{$index["email"]}}</td>
            <td>{{$index["city"]}}</td>
            <td>{{$index["address"]}}</td>
            <td>{{$index["gender"]}}</td>
            <td>{{$index["phone"]}}</td>
            <td>{{$index["img"]}}</td>
            <td>{{$index["role"]}}</td>
            <td><button type="button" class="btn btn-primary">add</button>
                <button type="button" class="btn btn-success">Edit</button>
                <button type="button" class="btn btn-danger">Delete</button>

            </td>

          </tr>
          @endforeach
        </tbody>
      </table>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
