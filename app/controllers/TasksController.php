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
          $newTask = $this->task;
          $taskName = Input::get('taskName');
          if (!empty(Input::get('taskDueDate'))) {
            $taskDueDate = date('Y-m-d H:m:s', strtotime(Input::get('taskDueDate')));
          } else {
            $taskDueDate = null;
          }
          $newTask->taskName = $taskName;
          $newTask->taskDueDate = $taskDueDate;
          $newTask->save();
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
          $currentTask = $this->task->where('id', '=', $id)->first();
          return View::make('tasks.show')->with('task', $currentTask);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
          $currentTask = $this->task->where('id', '=', $id)->first();
          return View::make('tasks.edit')->with('task', $currentTask);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
          if (!$this->task->fill(Input::all())->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->task->errors);
          }
          $taskName = Input::get('taskName');
          if (!empty(Input::get('taskDueDate'))) {
            $taskDueDate = date('Y-m-d H:m:s', strtotime(Input::get('taskDueDate')));
          } else {
            $taskDueDate = null;
          }
          $taskComplete = Input::has('taskComplete') ? 1 : 0;
          $currentTask = $this->task->find($id);
          $currentTask->taskName = $taskName;
          $currentTask->taskDueDate = $taskDueDate;
          $currentTask->taskComplete = $taskComplete;
          $currentTask->save();
          return Redirect::route('tasks.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
          $this->task->destroy($id);
          return Redirect::route('tasks.index');
	}


}
