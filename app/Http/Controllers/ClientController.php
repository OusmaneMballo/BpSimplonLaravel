<?php


namespace App\Http\Controllers;


use App\Entity\ClientMoral;
use App\Entity\ClientPhysique;
use \App\TypeClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {

        $data['resultat']=0;
        $data['employeurs']=DB::select('select * from clientmoral');
        $data['typeclient']=DB::select('select * from typeclient');

        return view('client/index',$data);
    }

    /**
     * fonction ajout client moral et client physique
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request)
    {
        if($request->typeclient==2)
        {
            //Cas d'un client moral
            $data['result']=$this->addCM($request);
            return redirect()->route('beignet');
        }
        else{
            //Cas d'un client moral
            $data['result']=$this->addCP($request);
            return redirect()->route('beignet');
        }
        $data['result']=$this->addCM($request);
        return redirect()->route('beignet');
    }

    /**
     * function d'ajout d'un client moral et
     * retourne son id
     * @param Request $request
     * @return int
     */
    public function addCM(Request $request)
    {
        $id = DB::table('clientmoral')->insertGetId(
                        ['email' => $request->emailCM,
                            'passwd' => $request->passwdCM,
                            'login' => $request->loginCM,
                            'nom' => $request->nomCM,
                            'adresse' => $request->adresseCM,
                            'telephone' => $request->telephoneCM,
                            'ninea' => $request->identifiantCM,
                            'raison_social' => $request->raisonSocialCM
                        ]);
        return $id;
    }

    /**
     * function d'ajout de client physique et
     * retourne son id
     * @param Request $request
     * @return int
     */
    public function addCP(Request $request)
    {
        $typeclt=DB::table('typeclient')->find($request->statutcp);
        $clientPhysique=[
            'nom'=>$request->nomcp,
            'prenom'=>$request->prenomcp,
            'nci'=>$request->cnicp,
            'profession'=>$request->professioncp,
            'telephone'=>$request->telephonecp,
            'adresse'=>$request->adressecp,
            'login'=>$request->logincp,
            'passwd'=>$request->passwdcp,
            'email'=>$request->emailcp,
            'id_typeclient'=>$typeclt->id
        ];
        if($request->statutcp==1)
        {
            /*===========Cas d'un salarier==========*/

            $clientPhysique['salaire']=$request->salairecp;

            if($request->employeur==-1)
            {
                /*cas d'un salarier dont son employeur n'est pas
                un client de la banque*/

                $idEmp=$this->addCM($request);
                $clientPhysique['id_employeur']=$idEmp;
            }
            else{
                /*============================================*
                 * cas d'un salarier dont son employeur est
                 *   un client de la banque
                 *============================================*/
                $clientPhysique['id_employeur']=$request->employeur;
            }
        }

        return DB::table('clientphysique')->insertGetId($clientPhysique);
    }
    
}
