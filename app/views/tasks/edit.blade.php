@extends('layouts.default')

@section('content')
<h1>Edit Task</h1>
{{ Form::model($task, ['route'=>['tasks.update', $task->id], 'method'=>'put'])}}
  <div>
    {{ Form::label('taskName', 'Task Name:') }}
    {{ Form::text('taskName') }}
    {{ $errors->first('taskName') }}
  </div>
  <div>
    {{ Form::label('taskDueDate', 'Due Date:') }}
    {{ Form::text('taskDueDate') }}
    {{ $errors->first('taskDueDate') }}
  </div>
  <div>
    {{ Form::label('taskComplete', 'Complete?:') }}
    {{ Form::checkbox('taskComplete', 1)}}
  <div>
    {{ Form::submit() }}
  </div>
{{ Form::close() }}
<div>
  <a href="/tasks" title="Cancel">Cancel</a>
</div>
