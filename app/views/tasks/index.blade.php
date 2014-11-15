@extends('layouts.default')

@section('content')
  <h1>Task List</h1>
  <table>
    <thead>
      <tr>
        <td>Task</td>
        <td>Due Date</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($tasks as $task)
        <tr>
          <td>{{ link_to("tasks/{$task->taskName}", $task->taskName) }}</td>
          <td>{{ date('n/j/Y',strtotime($task->taskDueDate)) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div>
    <a href="/tasks/create" title="New Task">New Task</a>
  </div>
@stop
