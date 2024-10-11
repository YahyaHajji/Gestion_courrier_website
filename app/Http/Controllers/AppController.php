<?php

namespace App\Http\Controllers;

use App\Models\CourierDepart;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    
    public function form(){
        return view('form');
    
    }

    public function connecter(Request $req)
    {
        $username = $req->user;
        $pass = $req->password;
        $admins = DB::select('SELECT name, password FROM admins WHERE password = ? AND name = ? LIMIT 1', [$pass, $username]);
    
        if (!empty($admins)) {
            if ($admins[0]->name == $username && $admins[0]->password == $pass) {
                $req->session()->put('login', $admins);
                return redirect()->route('app.courierD');
            }
        }
    
        return redirect()->route('app.form')->with('FormError', 'Utilisateur ou mot de passe est incorrect');
    }
    

    public function Deconnecter(){
        session()->flush();
        return redirect()->route('app.form');
    }

    public function acceuil()
    {
        $data = DB::table('courier_depart')->orderBy('numero', 'desc')->paginate(5);
       
        return view('CourierD', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

    public function Add_D(Request $req){
            $date   = $req->input('date');
            $des    = $req->input('Destinataire');
            $moyen  = $req->input('Moyen');
            $ref    = $req->input('réfèrence');
            $frais  = $req->input('Frais');
            $objet  = $req->input('objet');
            $observation= $req->input('observation');
        try {
                DB::insert('insert into courier_depart(date_env,destinataire,moyen,reference,frais,objet,observation)
            values (?,?,?,?,?,?,?)',[$date,$des,$moyen,$ref,$frais,$objet,$observation]);
            return redirect()->back()->with('success', 'Votre courier est bien ajoutée ');
              
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "Vous avez insérer un ancien référence de courrier  ");
        }

    }


    public function delete($id){
    $res = DB::delete('delete from courier_depart where numero = ?', [$id]);
    if ($res){
        return redirect()->back()->with('deleted', 'Votre courier est bien supprimer ');
    }else{
        return redirect()->back()->with('deletederror', "Il un problème au niveau de la suppression");
    }

    }

    public function search(Request $req){

    try {
        $srch = $req->validate(['search'=>'required']);          
        $courier = DB::select('select * from courier_depart where numero = ? or date_env = ? or reference = ? 
        or destinataire like ? or objet like ?', 
        [$srch['search'],$srch['search'],$srch['search'],'%'.$srch['search'].'%','%'.$srch['search'].'%']);

         return view('searchPage', ['data'=>$courier]);
    } catch (\Throwable $th) {
                throw $th;
    }


  
    }


    public function edit_D($id)
    {
            $courier = DB::select('select * from courier_depart where numero =?',[$id]);
            if($courier){
                return view('update_form',['couriers'=>$courier[0]]);
            }else{
                return redirect()->route('app.courierD')->with('UpdateStatus',"le courier que vous voulez modifier il n'existe pas !!") ;
            }      
    }

    public function update_D(Request $req)
    {
        try {

        $num    = $req->input('Numero');
        $date   = $req->input('date');
        $des    = $req->input('Destinataire');
        $moyen  = $req->input('Moyen');
        $ref    = $req->input('réfèrence');
        $frais  = $req->input('Frais');
        $objet  = $req->input('objet');
        $observation= $req->input('observation');

        DB::update('update courier_depart set numero = ?, date_env = ?, destinataire = ?, moyen = ?, reference = ?, frais = ?, objet = ?, observation = ? where numero = ?',
            [$num,$date,$des,$moyen,$ref,$frais,$objet,$observation,$num]);  
            return to_route('app.courierD')->with('successUpdate','Courier est bien modifier');
        } catch (\Throwable $th) {
            return to_route('app.courierD')->with('errorUpdate','Vérifier les champs !!');
        }
    }
    
    public function edit_A($id)
    {
            $courier = DB::select('select * from courier_arrivée where numero =?',[$id]);
            if($courier){
                return view('update_formA',['couriers'=>$courier[0]]);
            }else{
                return redirect()->route('app.courierA')->with('UpdateStatus',"le courier que vous voulez modifier il n'existe pas !!") ;
            }      
    }

public function update_A(Request $req)
    {
        try {
            $num    = $req->input('Numero');
            $date   = $req->input('date');
            $exp    = $req->input('Expiditeur');
            $moyen  = $req->input('Moyen');
            $date_exp  = $req->input('date_exp');
            $ref    = $req->input('réfèrence');
            $objet  = $req->input('objet');
            $observation= $req->input('observation');
            DB::update('update courier_arrivée set numero = ?, date_arv = ?, expéditeur = ?, moyen = ?, date_exp = ?,reference = ?,objet = ?, observation = ? where numero = ?',
                [$num,$date,$exp,$moyen,$date_exp,$ref,$objet,$observation,$num]);    
    
                return to_route('app.courierA')->with('successUpdate','Courier est bien modifier');
        } catch (\Throwable $th) {
            return to_route('app.courierA')->with('errorUpdate','Vérifier les champs !!');
        }

}


    public function edit_C($id)
    {
            $contact = DB::select('select * from contacts where code =?',[$id]);
            if($contact){
                return view('update_formC',['contact'=>$contact[0]]);
            }else{
                return redirect()->route('app.contact')->with('UpdateStatus',"le contact que vous voulez modifier il n'existe pas !!") ;
            }      
    }


    public function update_C(Request $req,$id)
    {
        try {
            $fullName   = $req->input('Raison');
            $org    = $req->input('Organisme');
            $type  = $req->input('type');
            $act  = $req->input('Activité');
            $adresse    = $req->input('Adresse');
            $ville  = $req->input('Ville');
            $email= $req->input('Email');
            $tel= $req->input('number');
             DB::update('update contacts set raison_social = ?, organisme = ?, type = ?, activite = ?, adresse = ?,ville = ?,email = ?, tel = ? where code = ?',
                 [$fullName,$org,$type,$act,$adresse,$ville,$email,$tel,$id]);  
                 
                 return to_route('app.contact')->with('successUpdate','Courier est bien modifier');
        } catch (\Throwable $th) {
            return to_route('app.contact')->with('errorUpdate','Vérifier les champs !!');
        }
    }

    public function courierA()
    {
    $data = DB::table('courier_arrivée')->orderBy('numero', 'desc')->paginate(5);
    return view('courierA', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    
    }




    public function Add_A(Request $req){
            $date   = $req->input('date');
            $exp    = $req->input('Expéditeur');
            $moyen  = $req->input('Moyen');
            $date_exp  = $req->input('date_exp');
            $ref    = $req->input('Réfèrence');
            $objet  = $req->input('objet');
            $observation= $req->input('observation');
        try {	

                 DB::insert('insert into courier_arrivée(date_arv,expéditeur,moyen,date_exp,reference,objet,observation)
                 values (?,?,?,?,?,?,?)',[$date,$exp,$moyen,$date_exp,$ref,$objet,$observation]);
                         return redirect()->back()->with('success', 'Votre courier est bien ajoutée');
    } catch (\Throwable $th) {
        return redirect()->back()->with('error', "Vous avez insérer un ancien référence de courrier");
    }

    }

    public function delete_A($id){
    $res = DB::delete('delete from courier_arrivée where numero = ?', [$id]);
    if ($res){
        return redirect()->back()->with('deleted', 'Votre courier est bien supprimer ');
    }else{
        return redirect()->back()->with('deletederror', "Il un problème au niveau de la suppression");
    }

    }


    public function search_A(Request $req){
       try {
        $srch = $req->validate(['search'=>'required']);          
        $courier = DB::select('select * from courier_arrivée where numero = ? or date_arv = ? or date_exp = ?  or reference = ? 
        or expéditeur like ? or objet like ?', 
        [$srch['search'],$srch['search'],$srch['search'],$srch['search'],'%'.$srch['search'].'%','%'.$srch['search'].'%']);
         return view('searchArrivePage', ['data'=>$courier]);
       } catch (\Throwable $th) {
            throw $th;
       }
          
    }




public function contact()
    {
    $data = DB::table('contacts')->orderBy('code', 'desc')->paginate(5);
    return view('contact', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

public function Add_C(Request $req){
        $fullName   = $req->input('Raison');
        $org    = $req->input('Organisme');
        $type  = $req->input('type');
        $act  = $req->input('Activité');
        $adresse    = $req->input('Adresse');
        $ville  = $req->input('Ville');
        $email= $req->input('Email');
        $tel= $req->input('number');
    try {	

             DB::insert('insert into contacts(raison_social,organisme,type,activite,adresse,ville,email,tel)
             values (?,?,?,?,?,?,?,?)',[$fullName,$org,$type,$act,$adresse,$ville,$email,$tel]);
                     return redirect()->back()->with('success', 'Contact est bien ajoutée');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "les champs Email , Adresse et Télephone doit être unique");
        }

}

public function delete_C($id){
    $res = DB::delete('delete from contacts where code = ?', [$id]);
    if ($res){
        return redirect()->back()->with('deleted', 'Contact est bien supprimer ');
    }else{
        return redirect()->back()->with('deletederror', "Il un problème au niveau de la suppression");
    }

    }

public function search_C(Request $req){
    try {
     $srch = $req->validate(['search'=>'required']);          
     $courier = DB::select('select * from contacts where code = ? or raison_social like ?',
     [$srch['search'],'%'.$srch['search'].'%']);
      return view('searchContactPage', ['data'=>$courier]);
    } catch (\Throwable $th) {
        throw $th;
    }
       
 }



}


