<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    private $company, $companies;
    public function add()
    {
        return view('admin.company.add');
    }

    public function manage()
    {
        $this->companies = Company::paginate(10);
        return view('admin.company.manage', ['companies' => $this->companies]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name'            => 'required',
            'email'           => 'required',
            'website'         => 'required',
            'image'           => 'required',
        ]);

        Company::newCompany($request);
        return redirect('/company/add')->with('message', 'Company Created Successfully!');
    }

    public function edit($id)
    {
        $this->company = Company::find($id);
        return view('admin.company.edit', ['company' => $this->company]);
    }

    public function update(Request $request, $id)
    {
        Company::updateCompany($request, $id);
        return redirect('/company/manage')->with('message', 'Company Info Updated Successfully');
    }

    public function delete($id)
    {
        Company::deleteCompany($id);
        return redirect('/company/manage')->with('message2', 'Company Info Deleted Successfully');
    }
}
