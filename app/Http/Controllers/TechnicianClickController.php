<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use App\Models\TechnicianClick;
use Illuminate\Http\Request;

class TechnicianClickController extends Controller
{
    public function store(Request $request, $id)
    {
        $technician = Technician::findOrFail($id);

        $click = TechnicianClick::create([
            'technician_id' => $technician->id,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return response()->json(['message' => 'Click registered', 'data' => $click], 201);
    }

}
