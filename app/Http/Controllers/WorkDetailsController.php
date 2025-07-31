<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Transection;
use App\Models\WorkDetails;
use Illuminate\Http\Request;

class WorkDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string',
            'screenshort' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('screenshort')) {
            $file = $request->file('screenshort');
            $filename = time() . '_' . $file->getClientOriginalName();
        }

        // Save data to the database
        $data = [
            'title' => $request->input('title'),
            'details' => $request->input('details'),
            'screenshort' => $filename ?? null,
            'work_id' => $id,
        ];

        // Assuming you have a model named WorkDetail
        $result = WorkDetails::create($data);

        if($result && $filename){
            $file->move(public_path('project_details'), $filename);
        }

        return redirect()->back()->with(['success' => 'Work details saved successfully.']);
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

        return view('admin.projects.share', compact('project', 'projectDetails','transections','transectionTotal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $project, string $detail)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string',
            'screenshort' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the existing work detail
        $workDetail = WorkDetails::findOrFail($detail);

        // Handle file upload
        if ($request->hasFile('screenshort')) {
            $file = $request->file('screenshort');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Delete the old file if it exists
            if ($workDetail->screenshort && file_exists(public_path('project_details/' . $workDetail->screenshort))) {
            unlink(public_path('project_details/' . $workDetail->screenshort));
            }
        } else {
            $filename = $workDetail->screenshort;
        }

        // Update data in the database
        $workDetail->update([
            'title' => $request->input('title'),
            'details' => $request->input('details'),
            'screenshort' => $filename,
        ]);

        if ($request->hasFile('screenshort')) {
            $file->move(public_path('project_details'), $filename);
        }

        return redirect()->back()->with(['success' => 'Work details updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $project, string $detail)
    {
        // Find the existing work detail
        $workDetail = WorkDetails::findOrFail($detail);

        // Delete the file if it exists
        if ($workDetail->screenshort && file_exists(public_path('project_details/' . $workDetail->screenshort))) {
            unlink(public_path('project_details/' . $workDetail->screenshort));
        }

        // Delete the work detail from the database
        $workDetail->delete();

        return redirect()->back()->with(['success' => 'Work details deleted successfully.']);
    }
}
