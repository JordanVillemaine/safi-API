<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;

class VisitController extends Controller
{
    function list($id=null)
    {
        return $id?Visit::find($id):Visit::all();
    }

    function add(Request $req)
    {
        $visit = new Visit;
        $visit->practitioners_id = $req->practitioners_id;
        $visit->employees_id = $req->employees_id;
        $visit->attendedDate = $req->attendedDate;
        $visit->visitStates_id = $req->visitStates_id;
        $result = $visit->save();
        if ($result)
        {
            return ["Resultat" => "Les données ont été enregistrées"];
        }
        else
        {
            return ["Resultat" => "Opération refusée"];
        }
    }

    function update(Request $req)
    {
        $visit= Visit::find($req->id);
        $visit->practitioners_id = $req->practitioners_id;
        $visit->employees_id = $req->employees_id;
        $visit->attendedDate = $req->attendedDate;
        $visit->visitStates_id = $req->visitStates_id;
        $result=$visit->save();
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
        $visit = Visit::find($id);
        $result=$visit->delete();
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
