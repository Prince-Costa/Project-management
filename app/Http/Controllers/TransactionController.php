<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Contact;
use App\Models\Transection;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        if (!isAdmin()) {
            abort(404);
        }

        $transections = Transection::with('work','contact','user')->get();

        return view('admin.transections.index', compact('transections'));
    }


    public function dues()
    { 
        if (!isAdmin()) {
            abort(404);
        }

        $transections = Transection::selectRaw('work_id, SUM(amount) as total_paid')
            ->groupBy('work_id')
            ->with('work')
            ->get()
            ->map(function ($transection) {
            $transection->total_due = $transection->work->total_charge - $transection->total_paid;
            return $transection;
            });

        return view('admin.transections.dues', compact('transections'));
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
        $projects = Work::all();

        return view('admin.transections.create', compact('contacts', 'projects'));
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
            'description' => 'nullable|string|max:255',
            'amount' => 'required|numeric',
            'work_id' => 'required|exists:works,id',
            'payment_type' => 'required|string|in:mobile_banking,cash,bank_transfer',
            'tansection_number' => 'nullable|string|max:255',
            'date' => 'required|date',
        ]);

        $validatedData['user_id'] = auth()->id();
        $validatedData['type'] = 'instalment';
        $validatedData['contact_id'] = Work::where('id', $request->work_id)->pluck('contact_id')->first();

        // Save the transaction to the database
        Transection::create($validatedData);

        return redirect()->route('transections.index')->with('success', 'Transaction created successfully.');
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
    public function edit(string $id)
    { 
        if (!isAdmin()) {
            abort(404);
        }

        $contacts = Contact::all();
        $projects = Work::all();
        $transection = Transection::find($id);

        return view('admin.transections.edit', compact('contacts', 'projects','transection'));
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
            'description' => 'nullable|string|max:255',
            'amount' => 'required|numeric',
            'work_id' => 'required|exists:works,id',
            'payment_type' => 'required|string|in:mobile_banking,cash,bank_transfer',
            'tansection_number' => 'nullable|string|max:255',
            'date' => 'required|date',
        ]);

        $validatedData['contact_id'] = Work::where('id', $request->work_id)->pluck('contact_id')->first();
        $validatedData['user_id'] = auth()->id();

        $transection = Transection::find($id);
        $transection->update($validatedData);

        return redirect()->route('transections.index')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { 
        if (!isAdmin()) {
            abort(404);
        }

        $transection = Transection::find($id);

        
        $transection->delete();
        return redirect()->route('transections.index')->with('success', 'Transaction deleted successfully.');        
    }
}
