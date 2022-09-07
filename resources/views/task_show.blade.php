<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/show_style.css')}}">
    <title>Document</title>
</head>
<body>
   <div class="block">
        <h1>{{$task->name}}</h1>
        <h3 class="borda priority">{{$task->priority}}</h3>
        <h5 class="borda description"><p>{{$task->description}}</p></h5>
        <div class="header">
            <a href="/task/update/{{$task->id}}" class="button">Edit</a>
            <a href="/task" class="button">Back</a>
        </div>
    </div>
</body>
</html>
