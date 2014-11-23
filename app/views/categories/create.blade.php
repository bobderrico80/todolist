@extends('layouts.default')

@section('content')
<h1>New Category</h1>
{{ Form::open(['route' => 'categories.store']) }}
  <div>
    {{ Form::label('name', 'Category') }}
    {{ Form::text('name') }}
    {{ $errors->first('name') }}
  </div>
  <div>
    {{ Form::submit() }}
  </div>
{{ Form::close() }}
<div>
  <a href="/categories" title="Cancel">Cancel</a>
</div>
