<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
  {{ $user }}
  {{-- @dd($token) --}}
    <table border="1">
        <tr>
            <td>product</td>
            <td>description</td>
            <td>stock</td>
            <td>image</td>
            <td>actions</td>
        </tr>
        @foreach ($modell as $model)
            <tr>
                <td>{{ $model->name }}</td>
                <td>{{ $model->description }}</td>
                <td>{{ $model->stock }}</td>
                <td>{{ $model->image }}</td>
                <td>
                  <a href="">update</a>
                  <a href="">remove</a>
                </td>
            </tr>
        @endforeach
    </table>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button>
            logout
        </button>
    </form>
</body>

</html>
