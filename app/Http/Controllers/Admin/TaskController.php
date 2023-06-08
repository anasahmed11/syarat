<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use Auth;

class TaskController extends Controller
{
    public function __construct
    (
        TaskRepository $TaskRepository
    )
    {
        $this->TaskRepository = $TaskRepository;
    }

    public function index()
    {
        return $this->TaskRepository->index();
    }

    public function store(Request $request)
    {
        return $this->TaskRepository->store($request);
    }

    public function update(Request $request,$id)
    {
        return $this->TaskRepository->update($request,$id);
    }

}
