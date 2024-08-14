@extends('layouts.app')

@section('content')
<div class="container">
    <h1>To-Do List</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Task Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Task Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Add Task</button>
    </form>

    <h2 class="mt-4">My Tasks</h2>
    @if($tasks && $tasks->count())
        <ul class="list-group">
            @foreach ($tasks as $task)
                <li class="list-group-item">
                    <form action="{{ route('tasks.update', $task) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('PATCH')
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="is_completed" {{ $task->is_completed ? 'checked' : '' }} onchange="this.form.submit()">
                            <input type="text" name="title" value="{{ $task->title }}" class="form-control d-inline-block w-50">
                            <textarea name="description" class="form-control d-inline-block w-25">{{ $task->description }}</textarea>
                            <button type="submit" class="btn btn-success btn-sm">Update</button>
                        </div>
                    </form>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline-block float-right">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary btn-sm float-right mr-2">Edit</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No tasks found.</p>
    @endif
</div>
@endsection
