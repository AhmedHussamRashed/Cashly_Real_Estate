<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyDetail;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    // عرض جميع العقارات الخاصة بالبائع
    public function index()
    {
        $properties = Property::where('agent_id', auth()->id())->get();
        return view('agent.properties.index', compact('properties'));
    }

    // عرض صفحة إضافة عقار جديد
    public function create()
    {
        return view('agent.properties.create');
    }

    // تخزين عقار جديد
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
        ]);

        $property = Property::create([
            'agent_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location,
            'status' => 'available',
        ]);

        // إضافة التفاصيل الخاصة بالعقار
        $property->detail()->create([
            'listing_id' => $property->id,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'area' => $request->area,
            'year_built' => $request->year_built,
            'amenities' => $request->amenities,
        ]);

        return redirect()->route('agent.properties.index');
    }

    // عرض صفحة تعديل عقار
    public function edit(Property $property)
    {
        return view('agent.properties.edit', compact('property'));
    }

    // تحديث العقار
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
        ]);

        $property->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location,
        ]);

        // تحديث التفاصيل الخاصة بالعقار
        if ($property->detail) {
            $property->detail()->update([
                'bedrooms' => $request->bedrooms,
                'bathrooms' => $request->bathrooms,
                'area' => $request->area,
                'year_built' => $request->year_built,
                'amenities' => $request->amenities,
            ]);
        }

        return redirect()->route('agent.properties.index');
    }

    // حذف العقار
    public function destroy(Property $property)
    {
        // حذف تفاصيل العقار أولًا
        $property->detail()->delete();
        
        // حذف العقار نفسه
        $property->delete();
        return redirect()->route('agent.properties.index');
    }

    // عرض تفاصيل عقار معين
    public function show(Property $property)
    {
        $propertyDetail = $property->detail;  // جلب تفاصيل العقار
        return view('agent.properties.show', compact('property', 'propertyDetail'));
    }
}
