<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/form_style.css')}}">
    <title>Document</title>
</head>
<body>
   <div class="block">
        <h1>Create Task</h1>
        <form action="/task/update/{{$task->id}}" method="post">
        @csrf
            <input type="text" name="name" id="" placeholder="Name" class="input name" value="{{$task->name}}" required>
            <textarea name="description" id="" placeholder="Description" class="input description" required>{{$task->description}}</textarea>
            <input type="number" name="priority" id="" placeholder="LV" class="input number" value="{{$task->priority}}" required>
            <div class="header">
                <button type="submit" class="button">Enviar</button>
                <a href="/task/{{$task->id}}" class="button">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
