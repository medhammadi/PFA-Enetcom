<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Commande;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        $customers = Customer::all();
        $invoices = Commande::all();
        return view('commandes.index', compact('invoices','customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('commandes.create', compact('customers','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $request->validate([

            'customer_id' => 'required',
            'product_id' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'dis' => 'required',
            'amount' => 'required',
        ]);
        $total = array_sum($request->input('amount'));
        $invoice = new Commande();
        $invoice->customer_id = $request->customer_id;
        $invoice->total = $total;
        $invoice->save();
        

 
         

         return redirect('commandes/')->with('message','Commmande created Successfully');

    }
    

    public function findPrice(Request $request){
        $data = DB::table('products')->select('price')->where('id', $request->id)->first();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $customers = Customer::all();
        $invoice = Commande::findOrFail($id);
        return view('commandes.show', compact('invoice','customers'));

    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customer::all();
        $products = Product::orderBy('id', 'DESC')->get();
        $invoice = Commande::findOrFail($id);
    
        return view('commandes.edit', compact('customers','products','invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

        'customer_id' => 'required',
        'product_id' => 'required',
        'qty' => 'required',
        'price' => 'required',
        'dis' => 'required',
        'amount' => 'required',
        'date' => 'required',
    ]);

     $total = array_sum($request->input('amount'));
        $invoice = Commande::findOrFail($id);
        $invoice->customer_id = $request->customer_id;
        $invoice->total = $total;
        $invoice->updated_at = $request->date;
        $invoice->save();


         return redirect('commandes')->with('message','commande created Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $invoice = Commande::findOrFail($id);
        $invoice->delete();
        return redirect()->back();

    }
}
