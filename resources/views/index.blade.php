<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>
  <div class="background">
  <div class="container">
    <div class="header">
      <h1>Todo List</h1>
      <form action="/" method="POST" class="header_form">
        @if (count($errors) > 0)
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      @endif
        @csrf
        <input type="text" name="task" class="header_input">
        <input type="submit" value="追加" class="header_btn">
      </form>
    </div>
    <div class="todo">
      <table class="todolist">
        @csrf
        <tr>
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
        @foreach($tasks as $task)
        <tr>
          <form action="/edit/{{$task->id}}" method="POST">
            @csrf
            <td>{{$task->created_at}}</td>
            <td><input type="text" name="task" value="{{$task->task}}" class="todo_form"></td>
            <td><button class="edit_btn">更新</button></td>
          </form>
          <td><form action="/delete/{{$task->id}}" method="POST">@csrf<button class="delete_btn">削除</button></form></td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
  </div>
</body>
</html>