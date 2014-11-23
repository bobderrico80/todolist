<?php

class Category extends Eloquent {
  protected $fillable = ['name'];

  public static $rules = [
    'name' => 'required|unique:categories',
  ];

  public function isValid() {
    $validation = Validator::make($this->attributes, static::$rules);
    if ($validation->passes()) {
      return true;  
    }
    $this->errors = $validation->messages();
    return false;
  }
}
