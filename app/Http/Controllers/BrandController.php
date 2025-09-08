<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brands', compact('brands'));
    }

    public function store(Request $request)
    {
        //store the user input
        $array =  request();

        $array->validate([
            'name' => 'string|min:2|max:20|unique:brand'
        ]);

        echo "<br>";
        echo "name :" . $array["name"] ."Created". "<br>";

        Brand::create([
            'name' => $array['name'],
        ]);
    }

    public function delete(Brand $brand)
    {
        // $array = request();

        // dd($brand);

        // Brand::where('name', $array['name'])->delete();
        $brand->delete();
        echo "Deleted";
    }

    public function update(Request $request, Brand $brand)
    {

        echo $brand->name;
        $validated = $request->validate([
            'name' => 'string|min:2|max:255|unique:brand'
        ]);

        $brand->update($validated);
        

        echo "<br>";
        echo "Updated";
        
    }

    public function edit(Brand $brand)
    {
        return view('brand-update', compact($brand));
    }

    public function show(Brand $brand)
    {
        // dd($brand);
        $brand->delete();
        echo "Deleted";
        // return view('index', compact('product'));
    }
}
