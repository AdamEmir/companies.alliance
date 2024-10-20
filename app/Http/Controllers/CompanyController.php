<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('companies.index');
    }

    public function create()
    {
        return view('companies.create');
    }

    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));
    }

    public function show(Company $company)
    {
        return view('companies.show',compact('company'));
    }
}
