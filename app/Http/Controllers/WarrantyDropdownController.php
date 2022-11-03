<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class WarrantyDropdown extends Controller
{
    public function get_Warranty_Id(Request $request){
        $states = \DB::table('Project.project')
        ->where('project_id', $request->project_id)
        ->get();
        

        if (count($factories) > 0) {
            return response()->json($factories);
        }
    }

}


