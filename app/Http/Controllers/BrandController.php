<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // VIEW - http://localhost:8000

    public function index(Request $request)
    {
        $country = $request->header('CF-IPCountry', null);

        $brands = Brand::where('country_code', $country)->get();

        if ($brands->isEmpty()) {
            $brands = Brand::whereNull('country_code')->get();
        }

    return view('index', compact('brands'));
    }

    // API - http://localhost:8000/api/brands
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_image' => 'required|url',
            'rating' => 'required|integer|min:1|max:5',
        ]);


        $countryCode = $request->header('CF-IPCountry', null);

        $validated['country_code'] = $countryCode;

        $brand = Brand::create($validated);

        return response()->json([
            'message' => 'Brand created successfully',
            'brand' => $brand
        ], 201);

    }
      // RESTful API - http://localhost:8000/api/brands/$id
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_image' => 'required|url',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $validated['country_code'] = $request->header('CF-IPCountry', null);

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

      // RESTful API - http://localhost:8000/api/brands/$id
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
