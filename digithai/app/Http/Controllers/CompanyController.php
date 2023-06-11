<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index')->with(['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $validatedData = $request->validated();

        $company = Company::create($validatedData);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = $logo->storeAs('logos', $company->id . '.' . $logo->getClientOriginalExtension());
            $company->logo = $path;
            $company->save();
        }

        return redirect()->route('companies.show', $company->id)->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show')->with(['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit')->with(['company' => $company]);
    }

    /**
     * Update the specified company in storage.
     *
     * @param  UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $company->update($request->validated());

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = $logo->storeAs('logos', $company->id . '.' . $logo->getClientOriginalExtension());
            $company->logo = $path;
            $company->save();
        }

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
