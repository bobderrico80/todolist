<?php

class Task extends Eloquent {
  protected $fillable = ['taskName', 'taskDueDate'];

  public static $rules = [
    'taskName' => 'required',
    'taskDueDate' => 'date'
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
