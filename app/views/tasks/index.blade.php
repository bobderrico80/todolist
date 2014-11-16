@extends('layouts.default')

@section('content')
  <h1>Task List</h1>
  <table>
    <thead>
      <tr>
        <td>Task</td>
        <td>Due Date</td>
        <td>Complete?</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($tasks as $task)
        <tr>
          <td>{{ link_to("tasks/{$task->id}/edit", $task->taskName) }}</td>
          <td>
            @if(empty($task->taskDueDate))
              None
            @else
              {{ date('n/j/Y',strtotime($task->taskDueDate)) }}
            @endif
          </td>
          <td>
            @if ($task->taskComplete)
              Yes
            @else
              No
            @endif
          </td>
          <td>{{Form::delete('tasks/'. $task->id, 'Delete')}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div>
    <a href="/tasks/create" title="New Task">New Task</a>
  </div>
  <script>
    $(document).on('submit', '.delete-form', function(){
      return confirm('Are you sure?');
    });
  </script>
@stop
