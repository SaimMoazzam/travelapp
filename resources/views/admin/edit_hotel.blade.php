<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hotels</title>
</head>
<body>
    <form action="{{ route('admin_update.hotel') }}" method="post">
        @csrf
        <input value="{{$data->id}}" type="text" name="id" id="" hidden placeholder="Name">
        <input value="{{$data->name}}" type="text" name="name" id="" placeholder="Name">
        <input value="{{$data->location}}" type="text" name="location" id="" placeholder="Location">
        <input type="submit" value="update">
    </form>

</body>
</html>