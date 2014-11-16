@extends('layouts.default')
@section('content')
  <ul>
    <li>Task: {{ $task->taskName }}</li>
    <li>Due Date: {{ date('n/j/Y', strtotime($task->taskDueDate)) }}</li>
  </ul>
  <div>
    <a href="/tasks" title="Back">Back</a>
    <a href="/tasks/{{ $task->id }}/edit" title="Edit">Edit</a>
  </div>
@stop
