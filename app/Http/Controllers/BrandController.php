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

    public function delete(Request $request)
    {
        $array = request();

        Brand::where('name', $array['name'])->delete();
        echo $array['name']."Deleted";
    }

    public function update(Product $product)
    {
        $array = request();
        
        $array->validate([
            'name' => 'string|min:2|max:20|unique:brand',
            'new_name' => 'string|min:2|max:20|unique:brand'
        ]);

        echo "Previous name: ".$array['name']."<br>";
        echo "New name: ".$array['new_name']."<br>";

        Brand::where('name', $array['name'])
            ->update(['name' => $array['new_name']]);

        echo "<br>";
        echo "Updated";
        
    }

    public function show(Product $product)
    {
        return view('index', compact('product'));
    }
}
