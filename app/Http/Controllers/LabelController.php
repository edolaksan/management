<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function home()
    {
        $labels = Label::all();
        return view('home', compact('labels'));
    }

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return Label::with('categories')->get();
    }

    public function create()
    {
        return view('create-label');
    }

    public function store(Request $request)
    {
        dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'categories' => 'array',
            'categories.*.name' => 'string|max:255',
        ]);

        $label = Label::create($request->only('name'));

        foreach ($request->categories ?? [] as $category) {
            $label->categories()->create($category);
        }

        return redirect()->route('labels.create')->with('success', 'Label created successfully!');
    }

    public function show($id)
    {
        return Label::with('categories')->findOrFail($id);
    }

    public function edit($id)
    {
        $label = Label::with('categories')->findOrFail($id);
        return view('edit-label', compact('label'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'categories' => 'array',
            'categories.*.name' => 'string|max:255',
        ]);

        $label = Label::findOrFail($id);
        $label->update($request->only('name'));

        $label->categories()->delete();
        foreach ($request->categories ?? [] as $category) {
            $label->categories()->create($category);
        }

        return redirect()->route('labels.edit', $id)->with('success', 'Label updated successfully!');
    }

    public function destroy($id)
    {
        $label = Label::findOrFail($id);
        $label->delete();

        return response()->json(null, 204);
    }
}
