<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <a href="/{{$task->id}}">back</a>
    <form action="/update/{{$task->id}}" method="post">
    @csrf
        Name: <input type="text" name="name" id="" value="{{$task->name}}" required>
        Description: <input type="text" name="description" id="" value="{{$task->description}}" required>
        Priority: <input type="number" name="priority" id="" value="{{$task->priority}}" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
