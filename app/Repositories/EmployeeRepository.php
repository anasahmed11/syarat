<?php

namespace App\Repositories;

use App\Http\Resources\EmployeeResource;
use App\Http\Services\ValidationMessageService;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;
use View;

class EmployeeRepository
{
    use ImageTrait;

    public function __construct
    (
        ValidationMessageService $ValidationMessageService
    )
    {
        $this->ValidationMessageService = $ValidationMessageService;
    }

    public function search(Request $request)
    {
        $data = User::
        when($request->get('first_name'), function ($data) use ($request) {
            return $data->where('first_name', 'like', '%' . $request->query->get('first_name') . '%');
        })->when($request->get('last_name'), function ($data) use ($request) {
            return $data->where('last_name', 'like', '%' . $request->query->get('last_name') . '%');
        })->when($request->get('phone'), function ($data) use ($request) {
            return $data->where('phone', '=', $request->query->get('phone'));
        });
        return $data;
    }

    public function index()
    {
        $data = $this->search(request())
            ->where('manager_id', auth()->user()->id)
            ->where('type', 2)
            ->paginate(10);
        $data->appends(request()->all());
        $departments = Department::pluck('name', 'id');
        return View::make('admin.pages.employees',
            [
                'data' => $data,
                'departments' => $departments
            ]);

    }

    public function validate($request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'email' => $id ? 'required|unique:users,email,' . $id : 'required|unique:users',
            'phone' => $id ? 'required|unique:users,phone,' . $id : 'required|unique:users',
            'department_id' => 'required|exists:departments,id',
            'image' => 'image',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => $id ? '' : 'required|string|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'salary' => 'required',
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
        $data = new User();
        $data->manager_id = auth()->user()->id;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->salary = $request->salary;
        $data->department_id = $request->department_id;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->type = '2';
        $data->password = Hash::make($request->password);
        //save-image
        if (isset($request['image'])) {
            $data->image = $this->upload_image($request->file('image'), 'employees', $data->image);
        }

        $data->save();
        return response()->json(new EmployeeResource($data));
    }

    public function update(Request $request, $id)
    {
        //validate-request
        $validate = $this->validate($request, $id);
        if (isset($validate)) {
            return $validate;
        }
        //update-data
        $data = User::where('id', $id)->where('manager_id', auth()->user()->id)->first();
        if (!$data) {
            $data = ['message' => 'you dont have permission'];
        }
        $data->manager_id = auth()->user()->id;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->salary = $request->salary;
        $data->department_id = $request->department_id;
        $data->email = $request->email;
        $data->phone = $request->phone;
        //save-image
        if (isset($request['image'])) {
            $data->image = $this->upload_image($request->file('image'), 'employees', $data->image);
        }

        $data->save();
        return response()->json(new EmployeeResource($data));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $data = User::where('id', $id)->where('manager_id', auth()->user()->id)->first();
        if (!$data) {
            $data = ['message' => 'you dont have permission'];
        } else {
            $data->tasks->delete();
            $data->delete();
        }
        return response()->json($data);

    }

}
