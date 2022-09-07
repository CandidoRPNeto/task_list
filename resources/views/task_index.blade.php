<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/index_style.css')}}">
    <title>TO-DO:task</title>
</head>
<body>
    <div class="block">
        <h1>Tasks To Do</h1>
        <div class="header">
            <a href="/task/add" class="button">add</a>
            <a href="" class="button">finished</a>
        </div>
        @foreach ($tasks as $task)
        <div class="task">
            <div class="name">{{$task->name}}</div>
            <div class="buttons">
                <a href="/task/{{$task->id}}" class="button">></a>
                <form action="/task/{{$task->id}}" method="post">
                    @csrf @method('DELETE')
                    <button type="submit" class="button">X</button>
                </form>
            </div>
        </div>
        @endforeach
        <div class="header">
            <a href="/trash/index" class="button">trash</a>
        </div>
    </div>
</body>
</html>
