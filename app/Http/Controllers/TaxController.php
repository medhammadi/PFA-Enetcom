<?php
 
namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Tax;
 
class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taxes = Tax::latest()->paginate(5);
        return view('taxs.index',compact('taxes'))
                ->with('i', (request()->input('page',1) -1) * 5);

    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('taxs.create');
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:taxes|numeric',
        ]);

        $tax = new Tax();
        $tax->name = $request->name;
        $tax->slug = Str::slug($request->name);

        $tax->status = 1;
        $tax->save();

        return redirect()->back()->with('message', 'Tax Created Successfully');
    }

 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tax = Tax::findOrFail($id);
 
        return view('taxs.show', compact('tax'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tax = Tax::findOrFail($id);
 
        return view('taxs.edit', compact('tax'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|numeric',
        ]);

        $tax = Tax::findOrFail($id);
        $tax->name = $request->name;
        $tax->slug = Str::slug($request->name);
        $tax->save();

        return redirect()->back()->with('message', 'Tax Updated Successfully');
    }
 
    /**
       * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tax = Tax::findOrFail($id);
 
        $tax->delete();
 
        return redirect()->route('taxs')->with('success', 'tax deleted successfully');
    }
}