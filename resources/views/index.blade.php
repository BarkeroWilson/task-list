@extends('layouts.app')

@section('title')
<h1>
    OUR TASKS
</h1>
@endsection

@section('content')
<div>

        @forelse ($tasks as $task)
            <div>
                <a href="{{route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
            </div>
            @empty
                <div>NO MORE TASKS</div>
        @endforelse

</div>
@endsection

