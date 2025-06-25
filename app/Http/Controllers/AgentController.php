<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Property;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    // عرض لوحة التحكم الخاصة بالبائع
    public function dashboard()
    {
        return view('agent.dashboard');
    }

    // عرض الرسائل الخاصة بالبائع
    public function messages()
    {
        return view('agent.messages.index');
    }

    // عرض جميع الوكلاء
    public function index()
    {
        return Agent::all();
    }

    // إضافة وكيل جديد
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'   => 'required|exists:users,id',
            'agency_id' => 'required|exists:agencies,id',
            'license'   => 'required|string',
        ]);

        return Agent::create($data);
    }

    // عرض تفاصيل وكيل معين
    public function show(Agent $agent)
    {
        return $agent;
    }

    // تحديث بيانات وكيل معين
    public function update(Request $request, Agent $agent)
    {
        $data = $request->validate([
            'user_id'   => 'sometimes|exists:users,id',
            'agency_id' => 'sometimes|exists:agencies,id',
            'license'   => 'sometimes|string',
        ]);

        $agent->update($data);

        return $agent;
    }

    // حذف وكيل معين
    public function destroy(Agent $agent)
    {
        $agent->delete();
        return response()->json(['message' => 'Deleted']);
    }

    // عرض جميع العقارات الخاصة بالبائع
    public function properties()
    {
        $properties = Property::where('agent_id', auth()->id())->get();
        return view('agent.properties.index', compact('properties'));
    }

    // إضافة عقار جديد
    public function createProperty()
    {
        return view('agent.properties.create');
    }

    // تخزين العقار الجديد
    public function storeProperty(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'agent_id'    => 'required|exists:agents,id',
        ]);

        Property::create($data);

        return redirect()->route('agent.properties.index');
    }

    // عرض تفاصيل عقار معين
    public function showProperty(Property $property)
    {
        return view('agent.properties.show', compact('property'));
    }

    // تحديث بيانات العقار
    public function updateProperty(Request $request, Property $property)
    {
        $data = $request->validate([
            'title'       => 'sometimes|string',
            'description' => 'sometimes|string',
            'price'       => 'sometimes|numeric',
        ]);

        $property->update($data);

        return redirect()->route('agent.properties.index');
    }

    // حذف عقار معين
    public function destroyProperty(Property $property)
    {
        $property->delete();
        return response()->json(['message' => 'Property deleted successfully']);
    }
}
