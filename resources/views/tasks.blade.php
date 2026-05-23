<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <style>
        body { font-family: Arial; max-width: 600px; margin: 50px auto; }
        input { padding: 8px; width: 70%; }
        button { padding: 8px 15px; background: blue; color: white; border: none; cursor: pointer; }
        ul { list-style: none; padding: 0; }
        li { padding: 10px; border-bottom: 1px solid #ddd; display: flex; justify-content: space-between; }
        .delete { background: red; color: white; border: none; padding: 5px 10px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Edison's Tasks</h1>

    {{-- Add Task Form --}}
    <form method="POST" action="/tasks">
        @csrf
        <input type="text" name="title" placeholder="Enter a task..." required>
        <button type="submit">Add</button>
    </form>

    {{-- Task List --}}
    <ul>
        @foreach($tasks as $task)
        <li>
            {{ $task->title }}
            <form method="POST" action="/tasks/{{ $task->id }}">
                @csrf
                @method('DELETE')
                <button class="delete" type="submit">Delete</button>
            </form>
        </li>
        @endforeach
    </ul>
</body>
</html>