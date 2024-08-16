<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);

        return view('pages.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $company = Company::create([
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website,
            ]);

            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = date('Y-m-d-H-i-s') . '.' . $logo->getClientOriginalExtension();
                $logo->storeAs('logos', $logoName, 'public');
                $company->update(['logo' => $logoName]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Company creation failed.');
        }

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

        return view('pages.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $company->update([
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website,
            ]);

            if ($request->hasFile('logo')) {
                $oldLogo = public_path('storage/logos/' . $company->logo);
                if (file_exists($oldLogo) && is_file($oldLogo)) {
                    unlink($oldLogo);
                }
                $logo = $request->file('logo');
                $logoName = date('Y-m-d-H-i-s') . '.' . $logo->getClientOriginalExtension();
                $logo->storeAs('logos', $logoName, 'public');
                $company->update(['logo' => $logoName]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Company update failed.');
        }

        return redirect()->route('company.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        try {
            DB::beginTransaction();

            $logo = public_path('storage/logos/' . $company->logo);

            if (file_exists($logo) && is_file($logo)) {
                unlink($logo);
            }

            $company->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Company deletion failed.');
        }

        return redirect()->route('company.index')->with('success', 'Company deleted successfully.');
    }
}
