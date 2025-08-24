<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;
use Geocoder\Query\GeocodeQuery;
use Illuminate\Validation\ValidationException;
use App\Services\GeocodingService;

class TechnicianController extends Controller
{
    public function index(Request $request)
    {
        try {
            $request->validate([
                'lat' => 'nullable|numeric',
                'lng' => 'nullable|numeric',
                'term' => 'nullable|string',
            ]);   
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Erro de validação.',
                'errors' => $e->errors(),
            ], 422);
        }
        
        if(isset($request->lat) && isset($request->lng)){
            $userLat = $request->lat;
            $userLng = $request->lng;
            $term = $request->term;
        
            $technicians = Technician::with(['services', 'clicks'])->get()->filter(function ($tech) use ($userLat, $userLng, $term) {
                $techLat = $tech->latitude;
                $techLng = $tech->longitude;
        
                $distance = $this->haversine($userLat, $userLng, $techLat, $techLng);
             
                if ($distance > 5) return false;

                $tech->distance = (int) $distance;
        
                if ($term) {
                    $matchTech = str_contains(strtolower($tech->name), strtolower($term));
                    $matchService = $tech->services->contains(function ($service) use ($term) {
                        return str_contains(strtolower($service->name), strtolower($term));
                    });
        
                    return $matchTech || $matchService;
                }
        
                return true;
            })->values();
    
            return response()->json([
                "data" => array_values($technicians->toArray()),
                "message" => "Tecnicos listados com sucesso."
            ], 200);
        }

        return response()->json([
            "data" => Technician::with(['services', 'clicks'])->get(),
            "message" => "Tecnicos listados com sucesso."
        ], 200);
       
    }
    
    private function haversine($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 3959; // milhas
    
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
    
        $a = sin($dLat / 2) ** 2 +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLon / 2) ** 2;
    
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    
        return $earthRadius * $c;
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required',
                'description' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required',
                'fone' => 'required',
                'email' => 'required|email|unique:technicians',
                'ssn' => 'required|unique:technicians',
                'dmv' => 'nullable',
                'state_id' => 'nullable',
                'services' => 'array',
                'services.*.name' => 'required|string',
            ]);    
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Erro de validação.',
                'errors' => $e->errors(),
            ], 422);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/images'), $imageName);

            $validated['image'] = 'uploads/images/' . $imageName;
        }

        $fullAddress = "{$validated['address']}, {$validated['city']}, {$validated['state']}";

        $results = app(GeocodingService::class)->getCoordinates($fullAddress);

        if ($results) {
            $validated['latitude'] = $results["lat"];
            $validated['longitude'] = $results["lng"];
        }

        $technician = Technician::create($validated);

        if (isset($validated['services'])) {
            foreach ($validated['services'] as $service) {
                $technician->services()->create($service);
            }
        }

        return response()->json([
            "data" => $technician->load('services'),
            "message" => "Tecnico cadastrado com sucesso."
        ], 201);
    }

    public function show(Technician $technician)
    {
        return response()->json([
            "data" => $technician->load(['services', 'clicks']),
            "message" => "Tecnico listado com sucesso."
        ], 200);
    }

    public function update(Request $request, Technician $technician)
    {
        try {
            $validated = $request->validate([
                'name' => 'sometimes|required',
                'description' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'state' => 'sometimes|required',
                'city' => 'sometimes|required',
                'address' => 'sometimes|required',
                'fone' => 'sometimes|required',
                'email' => 'sometimes|required|email|unique:technicians,email,' . $technician->id,
                'ssn' => 'nullable',
                'dmv' => 'nullable',
                'state_id' => 'nullable',
                'services' => 'array',
                'services.*.name' => 'required|string',
            ]);   
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Erro de validação.',
                'errors' => $e->errors(),
            ], 422);
        }

        if ($request->hasFile('image')) {
            // Deleta o antigo
            if ($technician->image && file_exists(public_path($technician->image))) {
                unlink(public_path($technician->image));
            }
        
            $file = $request->file('image');
            $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/images'), $imageName);

            $validated['image'] = 'uploads/images/' . $imageName;
        }

        $fullAddress = "{$validated['address']}, {$validated['city']}, {$validated['state']}";
     
        $results = app(GeocodingService::class)->getCoordinates($fullAddress);

        if ($results) {
            $validated['latitude'] = $results["lat"];
            $validated['longitude'] = $results["lng"];
        }

        $technician->update($validated);

        if (isset($validated['services'])) {
            $technician->services()->delete(); // Remove antigos
            foreach ($validated['services'] as $service) {
                $technician->services()->create($service);
            }
        }

        return response()->json([
            "data" => $technician->load(['services', 'clicks']),
            "message" => "Tecnico atualizado com sucesso."
        ], 200);
    }

    public function destroy(Technician $technician)
    {
        $technician->delete();

        return response()->json([
            "data" => $technician,
            "message" => "Tecnico deletado com sucesso."
        ], 200);
    }
}
