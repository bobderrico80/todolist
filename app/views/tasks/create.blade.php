@extends('layouts.default')

@section('content')
<h1>New Task</h1>
{{ Form::open(['route' => 'tasks.store']) }}
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
    {{ Form::submit() }}
  </div>
{{ Form::close() }}
<div>
  <a href="/tasks" title="Cancel">Cancel</a>
</div>
