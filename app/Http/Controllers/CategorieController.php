<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Categorie;
 
class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorie = Categorie::latest()->paginate(5);
        return view('categories.index',compact('categorie'))
                ->with('i', (request()->input('page',1) -1) * 5);

    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Categorie::create($request->all());
 
        return redirect()->route('categories')->with('success', 'Categorie added successfully');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categorie = Categorie::findOrFail($id);
 
        return view('categories.show', compact('categorie'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorie = Categorie::findOrFail($id);
 
        return view('categories.edit', compact('categorie'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categorie = Categorie::findOrFail($id);
 
        $categorie->update($request->all());
 
        return redirect()->route('categories')->with('success', 'categorie updated successfully');
    }
 
    /**
       * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = Categorie::findOrFail($id);
 
        $categorie->delete();
 
        return redirect()->route('categories')->with('success', 'categorie deleted successfully');
    }
}