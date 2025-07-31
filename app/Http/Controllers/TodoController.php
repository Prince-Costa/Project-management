<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Work;
use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Quotation;
use App\Models\Transection;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!isAdmin()) {
            abort(404);
        }

        // Fetch all todos from the database
        $todos = Todo::all();

        // Return the todos to the view
        return view('admin.todos.index', compact('todos'));
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
      
        // Return the view to create a new todo
        return view('admin.todos.create', compact('contacts', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!isAdmin()) {
            abort(404);
        }

        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:urgent,normal,passed,repeat',
            'time' => 'nullable|date',
            'work_id' => 'nullable|exists:works,id',
            'contact_id' => 'nullable|exists:contacts,id',
        ]);

        // Create a new todo
        Todo::create($validatedData);
        // Redirect to the todos index page with a success message
        return redirect()->route('todos.index')->with('success', 'Todo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        // Fetch the todo by ID
        $todo = Todo::where('id', $id)->with(['work', 'contact'])->firstOrFail();

        // Return the todo to the view
        return view('admin.todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $todo = Todo::where('id', $id)->firstOrFail();

        $contacts = Contact::all();
        $projects = Work::all();

        // Return the view to edit the todo
        return view('admin.todos.edit', compact('todo', 'contacts', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:urgent,normal,passed,repeat',
            'time' => 'nullable|date',
            'work_id' => 'nullable|exists:works,id',
            'contact_id' => 'nullable|exists:contacts,id',
        ]);

        // Find the todo by ID and update it
        $todo = Todo::where('id', $id)->firstOrFail();
        $todo->update($validatedData);

        // Redirect to the todos index page with a success message
        return redirect()->route('todos.index')->with('success', 'Todo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        // Find the todo by ID and delete it
        $todo = Todo::where('id', $id)->firstOrFail();
        $todo->delete();

        // Redirect to the todos index page with a success message
        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully.');
    }
}
