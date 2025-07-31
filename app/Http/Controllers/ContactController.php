<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Work;
use App\Models\Contact;
use App\Models\Transection;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $contacts = Contact::all();
        
        return view('admin.contacts.index' ,compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!isAdmin()) {
            abort(404);
        }

        $developers = User::where('role', 'developer')->get();
        return view('admin.contacts.create', compact('developers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $validatedContact = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'required|email|unique:contacts,email',
            'whats_app_number' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'designetion' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);


        
        $contact = Contact::create($validatedContact);

        if($request->work){
            $validatedWork = $request->validate([
                'title' => 'required|string|max:255',
                'status' => 'nullable|string|max:50',
                'user_id' => 'nullable|integer|exists:users,id',
                'total_charge' => 'nullable|integer',
                'advance' => 'nullable|integer',
                'date_line' => 'nullable|date',
                'domain' => 'nullable|string|max:255',
                'cpanel_url' => 'nullable|string|max:255',
                'cpanel_user' => 'nullable|string|max:255',
                'cpanel_password' => 'nullable|string|max:255',
                'admin_panel_user' => 'nullable|string|max:255',
                'admin_panel_password' => 'nullable|string|max:255',
                'details' => 'nullable|string|max:1000',
            ]);

            $work = Work::create(array_merge($validatedWork, ['contact_id' => $contact->id]));
        }

        if($request->advance){

            $validatedTransection= [
                'user_id' => auth()->id(),
                'description' => 'Advance Payment', 
                'amount' => $request->advance,
                'work_id' => $work->id,
                'payment_type' => $request->payment_type,
                'tansection_number' => $request->tansection_number,
                'date' => now(),
                'type' => 'advance',
                'contact_id' => $contact->id,
            ];


             // Save the transaction to the database
            Transection::create($validatedTransection);
        }
        
        return redirect()->route('contacts.index')->with('success', 'Contact added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $contact = Contact::with('work')->find($id);
        
    
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $contact = Contact::findOrFail($id);

        return view('admin.contacts.edit', compact('contact'));
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
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'required|email|unique:contacts,email,' . $id,
            'whats_app_number' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'designetion' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($validatedData);

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }
        
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
