<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\StoreCompany;
use App\Http\Requests\UpdateCompany;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        $companies = $company->latest()->paginate(10);

        return view('companies.index', compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
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
     * Store the incoming company.
     *
     * @param  StoreCompany $request
     * @return Response
     */
    public function store(StoreCompany $request, Company $company)
    {
        $storagePath = Storage::disk('public')->put('logos', $request->logo);

        $storageName = basename($storagePath);

        $validatedData = [
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $storageName,
            'website' => $request->website
        ];

        $company->create($validatedData);

        return redirect()->route('companies.index')
            ->with('success', 'Company successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCompany $request
     * @return Response
     */
    public function update(UpdateCompany $request, Company $company)
    {
        $storagePath = Storage::disk('public')->put('logos', $request->logo);

        $storageName = basename($storagePath);

        $validatedData = [
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $storageName,
            'website' => $request->website
        ];

        $company->update($validatedData);

        return redirect()->route('companies.index')
            ->with('success', 'Company successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company successfully deleted!');
    }
}
