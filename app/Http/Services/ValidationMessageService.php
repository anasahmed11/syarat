<?php

namespace App\Http\Services;

class ValidationMessageService
{
    public function messages($request)
    {
        return [
            'name.required' => __("validation.nameRequired", [], $request->header('lang')),
            'name.unique' => __("validation.nameUnique", [], $request->header('lang')),
            'phone.required' => __("validation.phoneRequired", [], $request->header('lang')),
            'phone.regex' => __("validation.phoneRegex", [], $request->header('lang')),
            'phone.min' => __("validation.phoneMin", [], $request->header('lang')),
            'phone.numeric' => __("validation.phoneNumeric", [], $request->header('lang')),
            'email.required' => __("validation.emailRequired", [], $request->header('lang')),
            'password.required' => __("validation.passwordRequired", [], $request->header('lang')),
            'password.min' => __("validation.passwordMin", [], $request->header('lang')),
            'password.regex' => __("validation.passwordRegex", [], $request->header('lang')),
            'first_name.required' => __("validation.firstNameRequired", [], $request->header('lang')),
            'last_name.required' => __("validation.lastNameRequired", [], $request->header('lang')),
            'salary.required' => __("validation.salaryRequired", [], $request->header('lang')),
            'salary.gt' => __("validation.salarygt", [], $request->header('lang')),
            'new_password.min' => __("validation.newPasswordMin", [], $request->header('lang')),
            'new_password.required' => __("validation.newPasswordRequired", [], $request->header('lang')),
            'confirm_new_password.required' => __("validation.confirmNewPasswordRequired", [], $request->header('lang')),
            'password.confirmed' => __("validation.passwordConfirmed", [], $request->header('lang')),
            'old_password.required' => __("validation.oldPasswordRequired", [], $request->header('lang')),
            'phone.unique' => __("validation.phoneUnique", [], $request->header('lang')),
            'email.unique' => __("validation.emailUnique", [], $request->header('lang')),
            'email.email' => __("validation.emailEmail", [], $request->header('lang')),
            'email.regex' => __("validation.emailEmail", [], $request->header('lang')),
            'employee_id.required' => __("validation.employeeRequired", [], $request->header('lang')),
            'employee_id.exists' => __("validation.employeeExists", [], $request->header('lang')),
            'message.required' => __("validation.messageRequired", [], $request->header('lang')),

            'image.required' => __("validation.imageRequired", [], $request->header('lang')),
            'image.image' => __("validation.imageImage", [], $request->header('lang')),
            'image.max' => __("validation.imageMax", [], $request->header('lang')),
            'icon.required' => __("validation.imageRequired", [], $request->header('lang')),
            'icon.image' => __("validation.imageImage", [], $request->header('lang')),
            'icon.max' => __("validation.imageMax", [], $request->header('lang')),
            'notes.required' => __("validation.notesRequired", [], $request->header('lang')),
            'department_id.required' => __("validation.departmentRequired", [], $request->header('lang')),
            'department_id.exists' => __("validation.departmentExists", [], $request->header('lang')),
            'id.exists' => __("validation.idExists", [], $request->header('lang')),
            'title.required' => __("validation.titleRequired", [], $request->header('lang')),
            'description.required' => __("validation.descriptionRequired", [], $request->header('lang')),
            'status.required' => __("validation.statusRequired", [], $request->header('lang')),
            'status.in' => __("validation.statusIn", [], $request->header('lang')),
        ];
    }

}
