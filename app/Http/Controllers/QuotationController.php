<?php

namespace App\Http\Controllers;

use Hamcrest\Core\Set;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!isAdmin()) {
            abort(404);
        }
        
        $quotations = Quotation::all();
        return view('admin.quotations.index', compact('quotations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!isAdmin()) {
            abort(404);
        }

        $contacts = Contact::all();
        
        return view('admin.quotations.create', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'nullable|email|max:255',
            'customer_company' => 'nullable|string|max:255',
            'customer_address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Quotation::create($validatedData);

        return redirect()->route('quotations.index')->with('success', 'Quotation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $quotation = Quotation::findOrFail($id);
        $settings = Setting::first();

        return view('admin.quotations.show', compact('quotation','settings'));
    }

    public function share(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $quotation = Quotation::findOrFail($id);
        $settings = Setting::first();
        
        return view('admin.quotations.share', compact('quotation','settings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $quotation = Quotation::findOrFail($id);
        $contacts = Contact::all();

        return view('admin.quotations.edit', compact('quotation', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'nullable|email|max:255',
            'customer_company' => 'nullable|string|max:255',
            'customer_address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $quotation = Quotation::findOrFail($id);
        $quotation->update($validatedData);

        return redirect()->route('quotations.index')->with('success', 'Quotation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $quotation = Quotation::findOrFail($id);
        $quotation->delete();

        return redirect()->route('quotations.index')->with('success', 'Quotation deleted successfully.');
    }
}
