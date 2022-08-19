<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="/task/add">+</a>
    <ul>
        @foreach ($tasks as $task)
        <li>{{$task->name}} [<a href="/task/{{$task->id}}">></a>]
            <form action="/task/{{$task->id}}" method="post"> @csrf @method('DELETE') <button type="submit">X</button></form>
        </li>
        @endforeach
    </ul>
    <a href="/trash/index">trash</a>
</body>
</html>
