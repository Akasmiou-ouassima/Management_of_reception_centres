<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Centre;
use App\Models\Service;
use App\Models\Beneficiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreCentreRequest;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\StoreBeneficiaireRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:admin')->except('logout');
    // }
    
    public function logoutAdmin(Request $request){

             Auth::guard('admin')->logout();

             $request->session()->invalidate();

             $request->session()->regenerateToken();
             
            return redirect("/");
    }

    public function index()
    { 
         
        $centres = Centre::all();
        return view('admins.index',compact('centres'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    /********************************B??n??ficiaire************************************ */
    public function archiveBene($id)
    {
       $beneficiaires = Beneficiaire::onlyTrashed()->get();
       return view('beneficiaires.Softdelete', compact('beneficiaires','id'));
    }

    public function destroyBene($id)
    {
        Beneficiaire::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
    }
    public function restoreBene($id) {
        $beneficiaire = Beneficiaire::onlyTrashed()->where('id',$id)->get();
        Beneficiaire::withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }
    public function liste($id)
    {
        return view('admins.liste',compact('id'));
    }
    public function indexBene($id)
    {
            $beneficiaires = Beneficiaire::all();
            return view('beneficiaires.index',compact('beneficiaires','id'));
    }
    public function AjoutBene($id)
    {
      $services = Service::all();
      return view('beneficiaires.create',compact('id','services'));
    }
    public function storeBene(StoreBeneficiaireRequest $request)
    {
        $beneficiaire= new Beneficiaire();
            $beneficiaire->centre_id=$request->centre_id;
            $beneficiaire->nom = $request->nom;
            $beneficiaire->prenom = $request->prenom;
            $beneficiaire->??ge = $request->age;
            $beneficiaire->date_de_naissance= $request->date_naissance;
            $beneficiaire->sexe= $request->sexe;
            $beneficiaire->situation_familiale= $request->situation;
            $beneficiaire->??tat_sanitaire= $request->etat;
            $beneficiaire->date_entr??e= $request->date_entr??e;
            $beneficiaire->date_sortie= $request->date_sortie;
            $beneficiaire->cin= $request->cin;
            $beneficiaire->services_b??n??ficier= implode(',',$request->service);
            $beneficiaire->remarques= $request->remarques;
            $image=$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('beneficiaires',$image,'ouassima');
            $beneficiaire->photo=$path;
            $beneficiaire->save();
            return redirect()->back()->with('message', 'le b??n??ficiaire a ??t?? bien enregistr??!');
    }
    public function editBene($id)
    {    
        $services = Service::all();             
        $beneficiaire = Beneficiaire::findorfail($id);
        return view('beneficiaires.edit', compact('beneficiaire','services'));
    }
    public function updateBene(StoreBeneficiaireRequest $request, $id)
    {

        $beneficiaire = Beneficiaire::findorfail($id);
        $beneficiaire->update([
             'nom' => $request->nom,
             'prenom' => $request->prenom,
             '??ge' => $request->age,
             'date_de_naissance' => $request->date_naissance,
             'sexe' => $request->sexe,
             'situation_familiale' => $request->situation,
             '??tat_sanitaire' => $request->etat,
             'date_entr??e' => $request->date_entr??e,
             'date_sortie' => $request->date_sortie,
             'cin'=> $request->cin,
             'services_b??n??ficier'=> implode(',',$request->service),
             'remarques' => $request->remarques,
             $image=$request->file('photo')->getClientOriginalName(),
             $path = $request->file('photo')->storeAs('beneficiaires',$image,'ouassima'),
             'photo' => $path
        ]);
        return redirect()->back()->with('message', 'les modifications ont bien ??t?? enregistr??es!');

    }
    public function SoftDeleteBene($id)
    {
        Beneficiaire::findorfail($id)->delete();
        return redirect()->back();
    }


/********************************Service************************************ */
    public function AjoutSer($id){
        return view('services.create',compact('id'));
    }
    public function storeSer(StoreServiceRequest $request){
        $service= new Service();
        $service->centre_id=$request->centre_id;
        $service->nom = $request->nom;
        $service->type= $request->type;
        $service->disponibilit?? = $request->disponibilit??;
        $service->description= $request->description;
        $service->save();
        return redirect()->back()->with('message', 'le service a ??t?? bien enregistr??!');

    }
    public function indexSer($id)
    {
            $services = Service::all();
            return view('services.index',compact('services','id'));
    }
    public function editSer($id)
    {
        $service = Service::findorfail($id);
        return view('services.edit', compact('service'));
    }
    public function updateSer(StoreServiceRequest $request, $id)
    {

        $service = Service::findorfail($id);
        $service->update([
             'nom' => $request->nom,
             'type' => $request->type,
             'disponibilit??' => $request->disponibilit??,
             'description' => $request->description
        ]);
        return redirect()->back()->with('message', 'les modifications ont bien ??t?? enregistr??es!');


    }
    public function SoftDeleteSer($id)
    {
        Service::findorfail($id)->delete();
        return redirect()->back();
    }
    public function archiveSer($id)
    {
       $services = Service::onlyTrashed()->get();
       return view('services.Softdelete', compact('services','id'));
    }

    public function destroySer($id)
    {
        Service::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
    }
    public function restoreSer($id) {
        $service = Service::onlyTrashed()->where('id',$id)->get();
        Service::withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }

/********************************User*************************************/
public function AjoutUser($id){
    return view('users.create',compact('id'));
}
public function storeUser(StoreUserRequest $request){
    $user= new User();
    $user->centre_id=$request->centre_id;
    $user->nom = $request->nom;
    $user->prenom= $request->prenom;
    $user->date_de_naissance = $request->date;
    $user->??ge= $request->??ge;
    $user->num??ro_de_telephone= $request->num;
    $user->sexe= $request->sexe;
    $user->poste_occup??= $request->poste;
    $user->email= $request->email;
    $user->password= Hash::make($request->password);
    $image=$request->file('photo')->getClientOriginalName();
    $path = $request->file('photo')->storeAs('users',$image,'ouassima');
    $user->photo=$path;
    $user->save();
    return redirect()->back()->with('message', 'l\'utilisateur a ??t?? bien enregistr??!');


}
public function indexUser($id)
{
        $users = User::all();
        return view('users.index',compact('users','id'));
}
public function editUser($id)
{
    $user = User::findorfail($id);
    return view('users.edit', compact('user'));
}
public function updateUser(StoreUserRequest $request, $id)
{

    $user = User::findorfail($id);
    $user->update([
         'nom' => $request->nom,
         'prenom' => $request->prenom,
         'date_de_naissance' => $request->date,
         '??ge' => $request->??ge,
         'num??ro_de_telephone' => $request->num,
         'sexe' => $request->sexe,
         'poste_occup??' => $request->poste,
         'email' => $request->email,
         'password' => Hash::make($request->password),
         $image=$request->file('photo')->getClientOriginalName(),
         $path = $request->file('photo')->storeAs('users',$image,'ouassima'),
         'photo' => $path
    ]);
    return redirect()->back()->with('message', 'les modifications ont bien ??t?? enregistr??es!');
}
public function SoftDeleteUser($id)
    {
        User::findorfail($id)->delete();
        return redirect()->back();
    }
    public function archiveUser($id)
    {
       $users = User::onlyTrashed()->get();
       return view('users.Softdelete', compact('users','id'));
    }

    public function destroyUser($id)
    {
        User::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
    }
    public function restoreUser($id) {
        $user = User::onlyTrashed()->where('id',$id)->get();
        User::withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }
/********************************Centre*************************************/
    public function AjoutCentre(){
        
        return view('centres.create');
    }
    public function storeCentre(Request $request){
        $centre= new Centre();
        $centre->nom = $request->nom;
        $centre->adresse= $request->adresse;
        $centre->email= $request->email;
        $centre->num??ro_telephone= $request->num??ro_telephone;
        $centre->disponibilit?? = $request->disponibilit??;
        $centre->capacit?? = $request->capacit??;
        $centre->description= $request->description;
        $centre->save();
        return redirect()->route('admins.index');
    }
    public function editCentre($id)
    {
        $centre = Centre::findorfail($id);
        return view('centres.edit', compact('centre'));
    }
    public function updateCentre(StoreCentreRequest $request, $id)
    {

        $centre = Centre::findorfail($id);
        $centre->update([
             'nom' => $request->nom,
             'adresse' => $request->adresse,
             'email' => $request->email,
             'num??ro_telephone' => $request->num??ro_telephone,
             'disponibilit??' => $request->disponibilit??,
             'capacit??' => $request->capacit??,
             'description' => $request->description,
        ]);
        return redirect()->back()->with('message', 'les modifications ont bien ??t?? enregistr??es!');

    }
    public function SoftDeleteCentre($id)
    {
        Centre::findorfail($id)->delete();
        return redirect()->route('admins.index');
    }
    public function archiveCentre()
    {
       $centres = Centre::onlyTrashed()->get();
       return view('centres.Softdelete', compact('centres'));
    }

    public function destroyCentre($id)
    {
        Centre::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('admins.index');
    }
    public function restoreCentre($id) {
        $centre = Centre::onlyTrashed()->where('id',$id)->get();
        Centre::withTrashed()->where('id',$id)->restore();
        return redirect()->route('admins.index');
    }
}