<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Work;
use App\Models\Contact;
use App\Models\Transection;
use App\Models\WorkDetails;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Work::with('contact','user')->get();
        
        return view('admin.projects.index' ,compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $developers = User::where('role', 'developer')->get();
        $contacts = Contact::all();
        return view('admin.projects.create', compact('developers','contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedWork = $request->validate([
            'title' => 'required|string|max:255',
            'contact_id' => 'required|exists:contacts,id',
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


        $work = Work::create($validatedWork);

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
                'contact_id' => $request->contact_id,
            ];


             // Save the transaction to the database
            Transection::create($validatedTransection);
        }

        return redirect()->route('projects.index')->with('success', 'Project added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Work::with('contact', 'user')->where('id', $id)->first();
        $projectDetails = WorkDetails::where('work_id', $id)->get();
        $transections = Transection::where('work_id', $id ?? null)->get();
        $transectionTotal = Transection::where('work_id', $id ?? null)->sum('amount');
      
     
        return view('admin.projects.show', compact('project','projectDetails','transections','transectionTotal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $developers = User::where('role', 'developer')->get();
        $contacts = Contact::all();
        $project = Work::findOrFail($id);

        return view('admin.projects.edit', compact('project', 'developers', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Work::findOrFail($id);

        $validatedWork = $request->validate([
            'title' => 'required|string|max:255',
            'contact_id' => 'required|exists:contacts,id',
            'status' => 'nullable|string|max:50',
            'user_id' => 'nullable|integer|exists:users,id',
            'total_charge' => 'nullable|string|max:255',
            // 'advance' => 'nullable|string|max:255',
            'date_line' => 'nullable|date',
            'domain' => 'nullable|string|max:255',
            'cpanel_url' => 'nullable|string|max:255',
            'cpanel_user' => 'nullable|string|max:255',
            'cpanel_password' => 'nullable|string|max:255',
            'admin_panel_user' => 'nullable|string|max:255',
            'admin_panel_password' => 'nullable|string|max:255',
            'details' => 'nullable|string|max:1000',
        ]);


        $project->update($validatedWork);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Work::findOrFail($id);

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project removed successfully.');
    }
}
