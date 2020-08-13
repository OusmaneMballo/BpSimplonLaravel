<?php


namespace App\Http\Controllers;


use App\Entity\ClientMoral;
use \App\TypeClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {

        $data['resultat']=0;
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
        $data['result']=$this->addCM($request);
        return redirect()->route('beignet');
    }
    
    public function addCM(Request $request)
    {
        /*$client=new ClientMoral();
        $client->setEmail($request->emailCM);
        $client->setPasswd($request->passwdCM);
        $client->setLogin($request->loginCM);
        $client->setNom($request->nomCM);
        $client->setAddresse($request->adresseCM);
        $client->setTelephone($request->telephoneCM);
        $client->setNinea($request->identifiantCM);
        $client->setRaisonSocial($request->raisonSocialCM);*/

        $id = DB::table('clientmoral')->insertGetId(
                        ['email' => $request->emailCM,
                            'passwd' => $request->passwdCM,
                            'login' => $request->loginCM,
                            'nom' => $request->nomCM,
                            'adresse' => $request->adresseCM,
                            'telephone' => $request->telephoneCM,
                            'ninea' => $request->identifiantCM,
                            'raison_social' => $request->raisonSocialCM]
                            );
        return $id;
    }
    
}
