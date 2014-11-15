<?php

class TasksController extends \BaseController {

        protected $task;

        public function __construct(Task $task) {
          $this->task = $task;
        }
        
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
          $tasks = $this->task->all();
          return View::make('tasks.index')->withTasks($tasks);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
          return View::make('tasks.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
          if (!$this->task->fill(Input::all())->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->task->errors);
          }
          $taskName = Input::get('taskName');
          $taskDueDate = date('Y-m-d H:m:s', strtotime(Input::get('taskDueDate')));
          $this->task->taskName = $taskName;
          $this->task->taskDueDate = $taskDueDate;
          $this->task->save();
          return Redirect::route('tasks.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
