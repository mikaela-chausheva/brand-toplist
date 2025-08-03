<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // VIEW - http://localhost:8000/brands
    public function index(Request $request)
    {
        $country = $request->header('CF-IPCountry', null);

        if ($country) {
            $brands = Brand::where('country_code', $country)->get();

            if ($brands->isEmpty()) {
                $brands = Brand::whereNull('country_code')->get();
            }
        } else {
            $brands = Brand::whereNull('country_code')->get();
    }
    return view('index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    // API - tested in Postman
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_image' => 'required|url',
            'rating' => 'required|integer|min:1|max:5',
            'country_code' => 'nullable|string|size:2',
        ]);


        $validated['country_code'] = $request->header('CF-IPCountry', null);


        $brand = Brand::create($validated);

        return response()->json([
            'message' => 'Brand created successfully',
            'brand' => $brand
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Brand $brand)
    {


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_image' => 'required|url',
            'rating' => 'required|integer|min:1|max:5',
            'country_code' => 'sometimes|nullable|string|size:2',
        ]);

        // $validated['country_code'] = $request->header('CF-IPCountry', null);

        $brand = Brand::find($id);
        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }

        $brand->update($validated);

        return response()->json([
            'message' => 'Brand edited successfully',
            'brand' => $brand
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }

        $brand->delete();

        return response()->json([
            'message' => 'Brand deleted successfully'
        ], 200);
    }
}
