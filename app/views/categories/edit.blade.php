@extends('layouts.default')

@section('content')
  <h1>Edit Category</h1>
  {{ Form::open(['route'=>['categories.update', $category->id], 'method'=>'put'])}}
    <div>
      {{ Form::label('name', 'Name:') }}
      {{ Form::text('name', $category->name) }}
      {{ $errors->first('name') }}
    </div>
    <div>
      {{ Form::submit() }}
    </div>
  {{ Form::close() }}
  {{ Form::delete('categories/'. $category->id, 'Delete') }}
  <div>
    <a href="/categories" title="Cancel">Cancel</a>
  </div>
  <script>
    $(document).on('submit', '.delete-form', function(){
      return confirm('Are you sure?');
    });
  </script>
@stop
