<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    function list($id=null)
    {
        return $id?Activity::find($id):Activity::all();
    }

    public function add(Request $request)
    {
        $activity = new Activity();
        $activity->theme = $request->input('theme');
        $activity->request = $request->input('request');
        $activity->place = $request->input('place');
        $activity->updated_at = $request->input('updated_at');
        $activity->created_at = $request->input('created_at');
        $activity->allocatedBudget = $request->input('allocatedBudget');

        return response()->json($activity->save());
    }

    function update(Request $req)
    {
        $activity= Activity::find($req->id);
        $activity->employees_id = $req->employees_id;
        $activity->theme = $req->theme;
        $activity->request = $req->request;
        $activity->place = $req->place;
        $activity->code = $req->code;
        $activity->creationDate = $req->creationDate;
        $activity->validationDate = $req->validationDate;
        $activity->validationDate = $req->validationDate;
        $activity->allocatedBudget = $req->allocatedBudget;
        $activity->unit = $req->unit;
        $activity->activityStates_id = $req->activityStates_id;
        $result=$activity->save();
        if($result)
        {
            return ["Resultat"=>"Données modifiées"];
        }
        else
        {
            return ["Resultat"=>"Modification échouée"];
        }

    }

    function delete($id)
    {
        $activity = Activity::find($id);
        $result=$activity->delete();
        if($result)
        {
            return ["Resultat"=>"Données supprimées"];
        }
        else
        {
            return ["Resultat"=>"suppression echouée"];
        }

    }
}
