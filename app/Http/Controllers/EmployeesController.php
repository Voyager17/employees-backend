<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function all()
    {
        $employees = Employee::query()->with('company')->get();

        return new JsonResponse($employees);
    }

    public function item(Employee $employee)
    {
        return new JsonResponse($employee->load('company'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'age' => ['required'],
            'department' => ['required'],
            'company_id' => ['required'],
        ]);

        $employee = new Employee();
        $employee->first_name = $data['first_name'];
        $employee->last_name = $data['last_name'];
        $employee->age = $data['age'];
        $employee->department = $data['department'];
        $employee->company()->associate($data['company_id']);
        $employee->save();

        return new JsonResponse($employee->load('company'));
    }

    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'age' => ['required'],
            'department' => ['required'],
            'company_id' => ['required'],
        ]);

        $employee->first_name = $data['first_name'];
        $employee->last_name = $data['last_name'];
        $employee->age = $data['age'];
        $employee->department = $data['department'];
        $employee->company()->associate($data['company_id']);
        $employee->save();

        return new JsonResponse($employee->load('company'));
    }

    public function delete(Employee $employee)
    {
        $employee->delete();
    }
}
