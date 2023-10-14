<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <form action="{{ route('create.hotel') }}" method="post">
        @csrf
        @method('post')
        <input type="text" name="name" id="" placeholder="Name">
        <input type="text" name="location" id="" placeholder="Location">
        <input type="submit" value="Create">
    </form>
    <hr>

    <table>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th colspan="2"></th>
        </tr>
        @foreach($hotels as $key => $hotel)
        <tr>
            <td>{{$hotel->name}}</td>
            <td>{{$hotel->location}}</td>
            <td>
                <a href="hotel/{{$hotel->id}}/edit">Edit</a>
            </td>
            <td>
                <a href="{{route('admin_delete.hotel',$hotel->id)}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>