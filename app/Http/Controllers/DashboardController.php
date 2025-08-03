<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Technician;
use App\Models\TechnicianClick;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalTechnicians = Technician::count();
        $totalClicks = TechnicianClick::count();

        $topTechnician = Technician::withCount('clicks')
            ->orderByDesc('clicks_count')
            ->first();

        return response()->json([
            'data'  => [
                'total_users' => $totalUsers,
                'total_technicians' => $totalTechnicians,
                'total_clicks' => $totalClicks,
                'top_technician' => $topTechnician
                    ? [
                        'id' => $topTechnician->id,
                        'name' => $topTechnician->name,
                        'clicks_count' => $topTechnician->clicks_count
                    ]
                    : null
            ]
        ], 200);
    }
}
