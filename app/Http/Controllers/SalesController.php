<?php


namespace App\Http\Controllers;
use App\Models\Sale;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::with('product')->get(); // Include products related to sales

        return view('sales.index', compact('sales'));
    }
}
