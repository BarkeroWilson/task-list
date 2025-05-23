

@extends('layouts.app')

@section('title', 'Add Task')

@section('content')

@section('styles')
    <style>
        .error-message{
            color: rgb(255, 9, 9);
            font-size: 0.8rem;
        }

    </style>
@endsection



    <form action="{{route('tasks.update', ['task' => $task->id])}}" method="post">
        @csrf
        @method('PUT')

        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{$task->title}}">
            @error('title')
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea  name="description" id="description" rows="5" > {{$task->description}}</textarea>
            @error('description')
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">Long Description</label>
            <textarea  name="long_description" id="long_description" rows="10" >{{$task->long_description}}</textarea>
            @error('long_description')
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Edit Task</button>
        </div>


    </form>


@endsection
