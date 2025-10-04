<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Str;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        return view('offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name'  => 'required|string|min:1|max:255',
            'config.value' => 'required|integer',
            'config.base_price' => 'required|numeric|min:0',
            'config.start_at' => 'nullable|date|required_with:config.end_at',
            'config.end_at' => 'nullable|date|required_with:config.start_at|after_or_equal:config.start_at',
            'config.percent' => 'required|integer',
            'count' => 'nullable|integer|min:1',
            'token' => 'string|max:255'
        ]);

        // Offer::create($validate);   
        Offer::create([
            'name' => $validated['name'],
            'config' => $validated['config'],
            'count' => $validated['count'],
            'token' => $validated['token']
        ]); 

        return redirect()->route('offers.index')->with('success', 'Offer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        return view('offers.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        $validated = $request->validate([
            'name'  => 'required|string|min:1|max:255',
            'config.value' => 'required|integer',
            'config.base_price' => 'required|numeric|min:0',
            'config.start_at' => 'nullable|date|required_with:config.end_at',
            'config.end_at' => 'nullable|date|required_with:config.start_at|after_or_equal:config.start_at',
            'config.percent' => 'required|integer',
            'count' => 'nullable|integer|min:1',
            'token' => 'string|max:255',
        ]);

        $offer->update([
            'name' => $validated['name'],
            'config' => $validated['config'],
            'count' => $validated['count'],
            'token' => $validated['token']
        ]);

        return redirect()->route('offers.index')->with('success', 'Offer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('offers.index')->with('success', 'Offers Deleted successfully.');
    }
}
