<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function all()
    {
        $employees = Company::all();

        return new JsonResponse($employees);
    }

    public function item(Company $company)
    {
        return new JsonResponse($company);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
        ]);

        $company = new Company();
        $company->name = $data['name'];
        $company->save();

        return new JsonResponse($company);
    }

    public function update(Request $request, Company $company)
    {
        $data = $request->validate([
            'name' => ['required'],
        ]);

        $company->name = $data['name'];
        $company->save();

        return new JsonResponse($company);
    }

    public function delete(Company $company)
    {
        $company->delete();
    }
}
