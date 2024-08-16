<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);

        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $request->validated();

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = date('Y-m-d-H-i-s') . '.' . $logo->getClientOriginalExtension();
            $logo->storeAs('logos', $logoName, 'public');
        }

        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $logoName,
            'website' => $request->website,
        ]);

        return redirect()->route('company.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $company = $company->load('employees');

        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $request->validated();

        if ($request->hasFile('logo')) {
            $oldLogo = public_path('storage/logos/' . $company->logo);
            if (file_exists($oldLogo)) {
                unlink($oldLogo);
            }
            $logo = $request->file('logo');
            $logoName = date('Y-m-d-H-i-s') . '.' . $logo->getClientOriginalExtension();
            $logo->storeAs('logos', $logoName, 'public');
        }

        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $logoName,
            'website' => $request->website,
        ]);

        return redirect()->route('company.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $logo = public_path('storage/logos/' . $company->logo);

        if (file_exists($logo) && is_file($logo)) {
            unlink($logo);
        }

        $company->delete();

        return redirect()->route('company.index')->with('success', 'Company deleted successfully.');
    }
}
