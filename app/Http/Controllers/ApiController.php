<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Devis;
use App\Models\DevisModule;
use App\Models\Gamme;
use App\Models\LigneProduit;
use App\Models\Module;
use App\Models\Reference;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ApiController extends Controller
{
    const VERSION = 'O.0.1';

    /**
     * @api {get} / Status de l'application
     * @apiName check
     * @apiGroup Application
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "status": "ok",
     *       "version": "0.0.1"
     *     }
     */
    public function check()
    {
        return response()
            ->json([
                'status' => 'ok',
                'version' => self::VERSION
            ]);
    }

    /**
     * @api {get} /synchronisation Données pour utilisation offlines
     * @apiName synchronisation
     * @apiGroup Synchronisation
     *
     * @apiDescription Les données sont à sauvegarder dans le local Storage de la tablette android pour un traitment offline.
     * @apiSuccess {Object} gammes Liste des gammes
     * @apiSuccess {Object} ligneProduit Liste des produits
     * @apiSuccess {Object} reference Liste des références
     * @apiSuccess {Object} modules Liste des modules
     *
     */
    public function synchronisation()
    {
        $gammes = Gamme::all();
        $ligneProduit = LigneProduit::all();
        $reference = Reference::all();
        $modules = Module::all();

        return response()
            ->json(compact('gammes', 'ligneProduit', 'reference', 'modules'));
    }

    /**
     * @api {get} /client Liste des clients
     * @apiName Liste
     * @apiGroup Client
     *
     * @apiDescription Renvoie la liste de touts les clients
     * @apiSuccess {Object} Client Liste des clients
     */
    public function client()
    {
        $clients = Client::all();
        return response()->json($clients);
    }

    /**
     * @api {post} /client Crée un nouveau client
     * @apiGroup Client
     *
     * @apiDescription Crée un nouveau client
     * @apiSuccess (Success 201) {Object}  client Retourne les information du client
     *
     *
     * @apiParam {Number} id     ID du client
     * @apiParam {String} civilite  Sexe du client
     * @apiParam {String} nom     Nom du client
     * @apiParam {String} nom     Nom du client
     * @apiParam {String} prenom  Prénom du client
     * @apiParam {String} adresse Adresse du client
     * @apiParam {Number} codepostal  Code Postal
     * @apiParam {String} ville     Ville
     * @apiParam {String} email     Adresse email
     * @apiParam {String} telephone Téléphone
     * @apiParam {String} created_at Date de création
     * @apiParam {String} created_at Date de derniere modification
     *
     * @apiError (Error 500) {Object}  message Message erreur
     *
     */
    public function storeClient(Request $request)
    {
        $data = $request->all();
        try {
            $create = Client::create($data);

            return response()->json(Client::find($create->id));
        } catch (\Exception $e) {
            return $this->error($e);
        }
    }

    /**
     * @api {post} /devis Crée un devis
     * @apiGroup Devis
     *
     * @apiDescription Crée un nouveau devis valider par le client
     * @apiSuccess (Success 201) {Object}  devis Information sur le devis
     * @apiSuccess (Success 201) {Object}  modules Liste des modules du devis
     *
     * @apiParam {String} nom       Intitule du devis
     * @apiParam {Number} montant   Montant du devis
     * @apiParam {String} id_utilisateur   Id du commercial
     * @apiParam {String} id_client   Id du client
     * @apiParam {String} status    Status du devis : 'Brouillon','En attente','Refusé','Accepté','En commande','En faturation','Clôturé'
     * @apiParam {String} etape     Etape du devis : 'Devis_ouvert','Signature_devis','Permis_construire','Ouverture_chantier','Achevement_fondation','Achevement_mur','Achevement_etanche','Travaux_equipement','Remise_cle'
     * @apiParam {Object} modules   ID des modules séparer par un ";"
     * @apiError (Error 500) {Object}  message Message erreur
     *
     */
    public function storeDevis(Request $request)
    {

        try {
            $createDevis = Devis::create([
                'nom' => $request->input('nom'),
                'montant' => $request->input('montant'),
                'id_utilisateur' => $request->input('id_utilisateur'),
                'id_client' => $request->input('id_client'),
                'status' => $request->input('status'),
                'etape' => $request->input('etape'),
            ]);


            $modules = collect(explode(';', $request->input('modules')));
            $modules->each(function ($module, $key) use ($createDevis) {
                $created = DevisModule::create([
                    'id_devis' => $createDevis->id,
                    'id_module' => $module
                ]);
            });

            return response()->json([
                'devis' => $createDevis,
                'modules' => DevisModule::where('id_devis', $createDevis->id)->get()
            ]);

        } catch (\Exception $e) {
            return $this->error($e);
        }


    }

    /**
     * @api {get} /devis Liste de tous les devis
     * @apiGroup Devis
     *
     * @apiDescription Récupéré la liste de tout les devis
     * @apiSuccess (Success 200) {Object}  devis Liste des devis
     *
     * @apiParam {String} nom       Intitule du devis
     * @apiParam {Number} montant   Montant du devis
     * @apiParam {String} id_utilisateur   Id du commercial
     * @apiParam {String} id_client   Id du client
     * @apiParam {String} status    Status du devis : 'Brouillon','En attente','Refusé','Accepté','En commande','En faturation','Clôturé'
     * @apiParam {String} etape     Etape du devis : 'Devis_ouvert','Signature_devis','Permis_construire','Ouverture_chantier','Achevement_fondation','Achevement_mur','Achevement_etanche','Travaux_equipement','Remise_cle'
     * @apiParam {Object} modules   ID des modules séparer par un ";"
     * @apiError (Error 500) {Object}  message Message erreur
     *
     */
    public function DevisList(Request $request)
    {

        return response()->json(Devis::all());

    }

    /**
     * @api {post} /auth Login
     * @apiName Login
     * @apiGroup Auth
     * @apiDescription Connexion à API via login / password
     * @apiParam {String} email     Adresse email
     * @apiParam {String} password  Mot de passe
     * @apiSuccess {Object} user Information sur l'utilisateur
     * @apiError (Error 401) {Object} connected  Si false, mauvais login / password de connexion
     */
    public function auth(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return response()->json(Auth::getUser());
        } else {
            return response()->json(['connected' => false], 401);
        }
    }

    /**
     * Erreur survenue dans l'application
     *
     * @param $e \Exception
     * @param int $statusCode defaut 500
     * @return \Illuminate\Http\JsonResponse
     */
    private function error($e, $statusCode = 500)
    {
        return response()->json([
            'error' => true,
            'message' => $e->getMessage()
        ], $statusCode);
    }
}