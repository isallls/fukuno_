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
  @if (session()->has('item'))
      {{ session('item') }}
  @endif
    <table border="1">
        <tr>
            <td>product</td>
            <td>description</td>
            <td>stock</td>
            <td>price</td>
            <td>image</td>
            <td>actions</td>
        </tr>
        @foreach ($modell as $model)
            <tr>
                <td>{{ $model->name }}</td>
                <td>{{ $model->description }}</td>
                <td>{{ $model->stock }}</td>
                <td>{{ $model->price }}</td>
                <td>{{ $model->image }}</td>
                {{-- <td>{{ $model->id }}</td> --}}
                <td>
                  <a href="/dashboard/update-item/{{ $model->id }}">update</a>
                  <a href="">remove</a>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="/logout">Logout</a>
    <br>
    <a href="{{ route('addItem') }}">tambah barang</a>
</body>

</html>