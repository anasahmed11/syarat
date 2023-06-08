<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table='tasks';
    protected $fillable=['title','description','employee_id','status'];
    protected $with =['employee'];

    public function employee(){
        return $this->belongsTo(User::class,'employee_id');
    }
}
