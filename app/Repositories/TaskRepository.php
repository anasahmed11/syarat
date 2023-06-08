<?php

namespace App\Repositories;

use App\Http\Resources\TaskResource;
use App\Http\Services\ValidationMessageService;
use App\Models\Task;
use Illuminate\Http\Request;
use Validator;
use Auth;
use View;

class TaskRepository
{
    public function __construct
    (
        ValidationMessageService $ValidationMessageService
    )
    {
        $this->ValidationMessageService = $ValidationMessageService;
    }

    public function search(Request $request)
    {
        $data = Task::
        when($request->get('title'), function ($data) use ($request) {
            return $data->where('title', 'like', '%' . $request->query->get('title') . '%');
        })->when($request->get('employee'), function ($data) use ($request) {
            return $data->WhereHas('employee', function ($data) use ($request) {
                $data->where('first_name', 'like', '%' . $request->query->get('employee') . '%');
            });
        });
        return $data;
    }

    public function index()
    {
        if(auth()->user()->type==1){
            $data = $this->search(request())
                ->whereHas('employee', function ($query) {
                    $query->where('manager_id', auth()->user()->id);
                })
                ->paginate(10);
        }else{
            $data = $this->search(request())
               ->where('employee_id',auth()->user()->id)
                ->paginate(10);
        }

        $data->appends(request()->all());
        return View::make('admin.pages.tasks',
            [
                'data' => $data,
            ]);

    }

    public function validate($request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'title' =>'required',
            'description' =>'required',
            'employee_id' =>$id?'':'required|exists:users,id',
            'status'=>$id?'required|in:new,progress,completed':''
        ],
            $this->ValidationMessageService->messages($request));

        if ($validator->fails()) {
            return response()->json(
                array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray())
                , 400);
        }
    }


    public function store(Request $request)
    {
        //validate-request
        $validate = $this->validate($request);
        if (isset($validate)) {
            return $validate;
        }
        //store-data
        $data = new Task();
        $data->title=$request->title;
        $data->description=$request->description;
        $data->employee_id=$request->employee_id;
        $data->save();

        $data->save();
        return response()->json(new TaskResource($data));
    }

    public function update(Request $request, $id)
    {
        //validate-request
        $validate = $this->validate($request, $id);
        if (isset($validate)) {
            return $validate;
        }
        //update-data
        $data = Task::find($id);
        $data->title=$request->title;
        $data->description=$request->description;
        $data->status=$request->status;
        $data->save();
        return response()->json(new TaskResource($data));
    }


}
