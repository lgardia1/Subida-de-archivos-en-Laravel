<?php

namespace App\Http\Controllers;

use App\Models\Subido;
use Exception;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SubidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subidos = Subido::orderBy("id", "asc")->get();

        if(!$subidos->isEmpty()) {
            return view('subido.index', ['subidos' => $subidos]);
        }
            
        return view('subido.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subido.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vadilateData = $request->validate([
            'originalName' => 'required|string|min:1|max:50',
            'file' => 'required|file|mimes:jpg,png,gif|max:2048',
        ]);


        $file  = $request->file('file');

        Carbon::setLocale('es');
        $timestamp = Carbon::now()->translatedFormat('d F \d\e Y');

        $uniqeID = Str::random(10);

        $filename = $timestamp . '_' . $uniqeID . '.' . $file->getClientOriginalExtension();
        $filename = str_replace(' ', '_', $filename);

        $path = $file->storeAs('images', $filename);
        $vadilateData['path'] = $path;

        try {
            Subido::create($vadilateData);
            return redirect('/')->with(['message' => 'The image has been uploaded']);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subido $subido)
    {
        if (!$subido) {
            abort(404); 
        }
    
        return view('subido.show', ['subido' => $subido]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subido $subido)
    {
        if (!$subido) {
            abort(404); 
        }
    
        return view('subido.edit', ['subido' => $subido]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subido $subido)
    {
        $vadilateData = $request->validate([
            'name' => 'required|string|max:50',
            'path' => 'required|string|max:50'
        ]);
        try {
            $subido->update($request->all());
            return back()->with(['message' => 'The image have been updated']);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subido $subido)
    {
        try {
            $subido->delete();
            return back()->with(['message' => 'The image is succesfully deleted']);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['message' => $e->getMessage()]);
        }
    }
}
