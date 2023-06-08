<?php

namespace App\Repositories;

use App\Http\Resources\DepartmentResource;
use App\Http\Services\ValidationMessageService;
use App\Models\Department;
use Illuminate\Http\Request;
use Validator;
use View;
use Auth;

class DepartmentRepository
{
    public function __construct
    (
        ValidationMessageService $ValidationMessageService
    )
    {
        $this->ValidationMessageService = $ValidationMessageService;
    }

    //validate-request
    public function validate($request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'name' => $id ? 'required|unique:departments,name,' . $id : 'required|unique:departments',
        ],
            $this->ValidationMessageService->messages($request)
        );

        if ($validator->fails()) {
            return response()->json(
                array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray())
                , 400);
        }
    }

    //search
    public function search(Request $request)
    {
        $data = Department::
        when($request->get('department_name'), function ($data) use ($request) {
            return $data->where('name', 'like', '%' . $request->query->get('department_name') . '%');
        });
        return $data;
    }

    public function index()
    {
        $data = $this->search(request())->paginate(10);
        $data->appends(request()->all());
        return View('admin.pages.departments', ['data' => $data]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate-request
        $validate = $this->validate($request);
        if (isset($validate)) {
            return $validate;
        }
        //store-data
        $data = new Department();
        $data->name = $request->input('name');
        $data->save();
        return response()->json(new DepartmentResource($data));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //validate-request
        $validate = $this->validate($request, $id);
        if (isset($validate)) {
            return $validate;
        }
        //update-data
        $data = Department::find($id);
        $data->name = $request->input('name');
        $data->save();
        return response()->json(new DepartmentResource($data));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Department::find($id);
        if (!$data->employees) {
            $data->delete();
        } else {
            $data = ['message' => 'department cant be deleted'];
        }
        return response()->json($data);

    }


}
