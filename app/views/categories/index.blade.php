@extends('layouts.default')

@section('content')
  <h1>Category List</h1>
    <ul>
      @foreach ($categories as $category)
        <li>
            {{ link_to("categories/{$category->id}/edit",$category->name) }}
        </li>
      @endforeach
    </ul>
  <div>
    <a href="categories/create" title="New Category">New Category</a>
  </div>
@stop
