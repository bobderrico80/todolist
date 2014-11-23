<?php

class CategoriesController extends \BaseController {

        protected $category;

        public function __construct(Category $category) {
          $this->category = $category;
        }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
          $categories = $this->category->all();
          return View::make('categories.index')->withCategories($categories);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
          return View::make('categories.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
          if (!$this->category->fill(Input::all())->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->category->errors);
          }
          $this->category->save();
          return Redirect::route('categories.index');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
          return View::make('categories.edit')->with('category',$this->category->where('id', '=', $id)->first()); 
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
          if (!$this->category->fill(Input::all())->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->category->errors); 
          }
          $name = Input::get('name');
          $currentCategory = $this->category->find($id);
          $currentCategory->name = $name;
          $currentCategory->save();
          return Redirect::route('categories.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
          $this->category->destroy($id);
          return Redirect::route('categories.index');
	}


}
