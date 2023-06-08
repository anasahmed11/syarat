<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use Auth;

class EmployeeController extends Controller
{
    public function __construct
    (
        EmployeeRepository $EmployeeRepository
    )
    {
        $this->EmployeeRepository = $EmployeeRepository;
    }

    public function index()
    {
        return $this->EmployeeRepository->index();
    }

    public function store(Request $request)
    {
        return $this->EmployeeRepository->store($request);
    }

    public function update(Request $request,$id)
    {
        return $this->EmployeeRepository->update($request,$id);
    }

    public function destroy($id)
    {
        return $this->EmployeeRepository->destroy($id);
    }


}
