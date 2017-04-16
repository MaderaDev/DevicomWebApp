<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use App\Models\Modules;
use App\Models\DevisModule;
use Illuminate\Http\Request;

class PaiementsController extends Controller
{
    public function show()
    {
        $devis = Devis::all();
        return view('paiements', compact('devis'));
    }
    public function devis($id)
    {
        $data = Devis::findOrFail($id);
        $modules = DevisModule::where('id_devis', '=', $id)->get();
        $etapeDevis = $this->getEtapeDevis($data->etape);
        $montantAttendu = $this->getMontantAttendu($data->etape, $data->montant);
        $pourcentageAttendu = $this->getPourcentageAttendu($data->etape);
        return view('paiements_devis', compact('data', 'modules', 'etapeDevis', 'montantAttendu', 'pourcentageAttendu'));
    }
    public function getMontantAttendu($etape, $Montant)
    {
        switch ($etape) {
            case "Devis_ouvert":
                return strval (0.00*$Montant);
                break;
            case "Signature_devis":
                return strval (0.03*$Montant);
                break;
            case "Permis_construire":
                return strval (0.10*$Montant);
                break;
            case "Ouverture_chantier":
                return strval (0.15*$Montant);
                break;
            case "Achevement_fondation":
                return strval (0.25*$Montant);
                break;
            case "Achevement_mur":
                return strval (0.40*$Montant);
                break;
            case "Achevement_etanche":
                return strval (0.75*$Montant);
                break;
            case "Travaux_equipement":
                return strval (0.95*$Montant);
                break;
            case "Remise_cle":
                return strval (1.00*$Montant);
                break;
        }
    }
    public function getEtapeDevis($etape)
    {
        switch ($etape) {
            case "Devis_ouvert":
                return "Ouverture du devis avec le client";
                break;
            case "Signature_devis":
                return "Signature du devis par le client";
                break;
            case "Permis_construire":
                return "Obtention du permis de construire";
                break;
            case "Ouverture_chantier":
                return "Ouverture du chantier";
                break;
            case "Achevement_fondation":
                return "Achèvement des fondations";
                break;
            case "Achevement_mur":
                return "Achèvement des murs";
                break;
            case "Achevement_etanche":
                return "Mise hors d’eau / hors d’air";
                break;
            case "Travaux_equipement":
                return "Achèvement des travaux d'équipement";
                break;
            case "Remise_cle":
                return "Remise des clés au client";
                break;
        }
    }
    public function getPourcentageAttendu($etape)
    {
        switch ($etape) {
            case "Devis_ouvert":
                return "0";
                break;
            case "Signature_devis":
                return "3";
                break;
            case "Permis_construire":
                return "10";
                break;
            case "Ouverture_chantier":
                return "15";
                break;
            case "Achevement_fondation":
                return "25";
                break;
            case "Achevement_mur":
                return "40";
                break;
            case "Achevement_etanche":
                return "75";
                break;
            case "Travaux_equipement":
                return "95";
                break;
            case "Remise_cle":
                return "100";
                break;
        }
    }
    public function applyDevis($id, Request $request){
        //dd($request->all());
        $data = Devis::findOrFail($id);
        $amount = $request->input('inputPayment');
        $step = $request->input('inputStep');
        $state = $request->input('inputState');
        if($amount != "") Devis::where('id', $id)->update(['solde' => (floatval($amount) + floatval($data->solde))]);
        if($state != "") Devis::where('id', $id)->update(['status' => $state]);
        switch ($step){
            case "Ouverture du devis avec le client":
                Devis::where('id', $id)->update(['etape' => "Devis_ouvert"]);
                break;
            case "Signature du devis par le client":
                Devis::where('id', $id)->update(['etape' => "Signature_devis"]);
                break;
            case "Obtention du permis de construire":
                Devis::where('id', $id)->update(['etape' => "Permis_construire"]);
                break;
            case "Ouverture du chantier":
                Devis::where('id', $id)->update(['etape' => "Ouverture_chantier"]);
                break;
            case "Achèvement des fondations":
                Devis::where('id', $id)->update(['etape' => "Achevement_fondation"]);
                break;
            case "Achèvement des murs":
                Devis::where('id', $id)->update(['etape' => "Achevement_mur"]);
                break;
            case "Mise hors d’eau / hors d’air":
                Devis::where('id', $id)->update(['etape' => "Achevement_etanche"]);
                break;
            case "Achèvement des travaux d'équipement":
                Devis::where('id', $id)->update(['etape' => "Travaux_equipement"]);
                break;
            case "Remise des clés au client":
                Devis::where('id', $id)->update(['etape' => "Remise_cle"]);
                break;
        }
        return redirect(route('devis', ['id' => $data->id]));
    }
}
