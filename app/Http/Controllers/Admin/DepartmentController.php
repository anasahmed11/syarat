<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\DepartmentRepository;
use Illuminate\Http\Request;
use Auth;

class DepartmentController extends Controller
{
    public function __construct
    (
        DepartmentRepository $DepartmentRepository
    )
    {
        $this->DepartmentRepository = $DepartmentRepository;
    }

    public function index()
    {
        return $this->DepartmentRepository->index();
    }

    public function store(Request $request)
    {
        return $this->DepartmentRepository->store($request);
    }

    public function update(Request $request,$id)
    {
        return $this->DepartmentRepository->update($request,$id);
    }

    public function destroy($id)
    {
        return $this->DepartmentRepository->destroy($id);
    }


}
