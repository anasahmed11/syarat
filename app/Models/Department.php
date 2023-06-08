<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table='departments';
    protected $fillable=['name'];
    protected $appends =['employees_num','employees_salaries'];

    public function employees(){
        return $this->hasMany(User::class,'department_id');
    }

    public function getEmployeesSalariesAttribute(){
        return $this->employees()->sum('salary');
    }

    public function getEmployeesNumAttribute(){
        return $this->employees()->count();
    }
}
