<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate and store the company data
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'nullable|email|unique:companies,email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming logo is an image file
            'website' => 'nullable|url',
        ]);
        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->storeAs('public', $logoName);
            // You can also store the image path in the database if needed
            // $imagePath = 'storage/' . $imageName;
            $company->logo = $logo;
        }
        $company->website = $request->website;
        $company->save();

        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'nullable|email|unique:companies,email,' . $company->id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming logo is an image file
            'website' => 'nullable|url',
        ]);


        $company = Company::find($company->id);
        $company->name = $request->name;
        $company->email = $request->email;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->storeAs('public', $logoName);
            // You can also store the image path in the database if needed
            // $imagePath = 'storage/' . $imageName;
            $company->logo = $logo;
        }
        $company->website = $request->website;
        $company->save();

        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        // Delete the company
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully');
    }
}
