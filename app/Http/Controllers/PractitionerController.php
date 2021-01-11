<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practitioner;

class PractitionerController extends Controller
{
    function list($id=null)
    {
        return $id?Practitioner::find($id):Practitioner::all();
    }

    function add(Request $req)
    {
        $practitioner = new Practitioner;
        $practitioner->lastname = $req->lastname;
        $practitioner->firstname = $req->firstname;
        $practitioner->address = $req->address;
        $practitioner->tel = $req->tel;
        $practitioner->notorietyCoeff = $req->notorietyCoeff;
        $practitioner->complementarySpeciality = $req->complementarySpeciality;
        $practitioner->district_id = $req->district_id;
        $result = $practitioner->save();
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
        $practitioner= Practitioner::find($req->id);
        $practitioner->lastname = $req->lastname;
        $practitioner->firstname = $req->firstname;
        $practitioner->address = $req->address;
        $practitioner->tel = $req->tel;
        $practitioner->notorietyCoeff = $req->notorietyCoeff;
        $practitioner->complementarySpeciality = $req->complementarySpeciality;
        $practitioner->district_id = $req->district_id;
        $result=$practitioner->save();
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
        $practitioner = Practitioner::find($id);
        $result=$practitioner->delete();
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
