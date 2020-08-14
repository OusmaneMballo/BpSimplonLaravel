<?php

namespace App\Http\Controllers;

use App\Entity\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompteController extends Controller
{
    public function index()
    {
        $data['resultat']=0;
        $data['clientMorals']=DB::select('select * from clientmoral');
        $data['clientPhysiques']=DB::select('select * from clientphysique');
        $data['typefrais']=DB::select('select * from typefrais');

        return view('compte/index',$data);
    }

    /**
     * fonction d'ajout d'un compte client
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request)
    {
        if($request->client != 0)
        {
            if($request->typecp != 0)
            {
                $comptes=['solde'=>$request->solde,
                    'etat'=>'Actif',
                    'date_creat'=>date('d-m-y')];
                $comptes['id_type']=$request->typecp;
                $tab=explode('-',$request->client);
                if($tab[1]=="cm")
                {
                    //ajout de compte pour un client moral
                    $clientMoral=DB::table('clientmoral')->find($tab[0]);
                    //generation du numero de compte et du cle rip
                    $numCmpte=$clientMoral->nom[0].$clientMoral->nom[1].date('d-m-y');
                    $clerib=$numCmpte.$clientMoral->ninea;

                    $comptes['id_clientMoral']=$clientMoral->id;
                    $comptes['numero']=$numCmpte;
                    $comptes['cle_rip']=$clerib;
                }
                elseif ($tab[1]=="cp")
                {
                    //ajout de compte pour un client physique

                    $clientPhysique=DB::table('clientphysique')->find($tab[0]);

                    //generation du numero de compte et du cle rip
                    $numCmpte=$clientPhysique->prenom[0].$clientPhysique->nom[1].date('d-m-y');
                    $clerib=$numCmpte.$clientPhysique->nci[0].$clientPhysique->nci[1].$clientPhysique->nci[2].$clientPhysique->nci[3];

                    $comptes['id_clientPhysique']=$clientPhysique->id;
                    $comptes['numero']=$numCmpte;
                    $comptes['cle_rip']=$clerib;
                }
                DB::table('compte')->insertGetId($comptes);

            }
        }

        return redirect()->route('couddou');
    }
}
