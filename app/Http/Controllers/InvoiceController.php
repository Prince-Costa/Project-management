<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Setting;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!isAdmin()) {
            abort(404);
        }
        
        $invoices = Invoice::with(['work', 'contact'])->get();

        return view('admin.invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!isAdmin()) {
            abort(404);
        }

        $projects = Work::whereNotIn('id', Invoice::pluck('work_id'))->get();

        return view('admin.invoices.create', compact('projects'));
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
            'work_id' => 'required|exists:works,id',
            'description' => 'required|string',
        ]);

        $validatedData['contact_id'] = Work::find($validatedData['work_id'])->pluck('contact_id')->first();
       
        Invoice::create($validatedData);

        return redirect()->route('invoices.index')->with(['success' => 'Invoice created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $invoice = Invoice::findOrFail($id);
        $settings = Setting::first();

        return view('admin.invoices.show', compact('invoice','settings'));
    }

    public function share(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $invoice = Invoice::findOrFail($id);
        $settings = Setting::first();
        
        return view('admin.invoices.share', compact('invoice','settings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $invoice = Invoice::findOrFail($id);
        $projects = Work::whereNotIn('id', Invoice::where('id', '!=', $id)->pluck('work_id'))->orWhere('id', $invoice->work_id)->get();

        return view('admin.invoices.edit', compact('invoice', 'projects'));
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
            'work_id' => 'required|exists:works,id',
            'description' => 'required|string',
        ]);

        $validatedData['contact_id'] = Work::find($validatedData['work_id'])->pluck('contact_id')->first();

        Invoice::where('id', $id)->update($validatedData);

        return redirect()->route('invoices.index')->with(['success' => 'Invoice updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoices.index')->with(['success' => 'Invoice deleted successfully.']);
    }
}
