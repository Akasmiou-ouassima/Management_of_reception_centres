<?php

namespace App\Http\Controllers;
use Session;
use Carbon\Carbon;
use App\Models\Beneficiaire;
use App\Models\Centre;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\StoreBeneficiaireRequest;
use App\Http\Requests\StoreCentreRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $centres = Centre::all();
        return view('userss.index',compact('centres'));
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
    public function show($id)
    {
        //
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
        //
    }
    /********************************Bénéficiaire************************************ */
    public function liste($id)
    {   
        $centres = Centre::all();
        return view('userss.liste',compact('id','centres'));
    }
    public function indexBene($id)
    { 
            $date=Carbon ::now()->toDateString();
            $centres = Centre::all(); 
            $beneficiaires = Beneficiaire::all();
            return view('beneficiairess.index',compact('beneficiaires','id','centres','date'));
    }
    public function AjoutBene($id)
    {
      $services = Service::all();
      return view('beneficiairess.create',compact('id','services'));
    }
    public function storeBene(StoreBeneficiaireRequest $request)
    {
        $beneficiaire= new Beneficiaire();
             $beneficiaire->centre_id=$request->centre_id;
            $beneficiaire->nom = $request->nom;
            $beneficiaire->prenom = $request->prenom;
            $beneficiaire->âge = $request->age;
            $beneficiaire->date_de_naissance= $request->date_naissance;
            $beneficiaire->sexe= $request->sexe;
            $beneficiaire->situation_familiale= $request->situation;
            $beneficiaire->état_sanitaire= $request->etat;
            $beneficiaire->date_entrée= $request->date_entrée;
            $beneficiaire->date_sortie= $request->date_sortie;
            $beneficiaire->cin= $request->cin;
            $beneficiaire->services_bénéficier= implode(',',$request->service);
            $beneficiaire->remarques= $request->remarques;
            $image=$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('beneficiaires',$image,'ouassima');
            $beneficiaire->photo=$path;
            $beneficiaire->save();
            return redirect()->back()->with('message', 'le bénéficiaire a été bien enregistré!');

    }
    public function editBene($id)
    {   
        $services = Service::all(); 
        $beneficiaire = Beneficiaire::findorfail($id);
        return view('beneficiairess.edit', compact('beneficiaire','services'));
    }
    public function updateBene(Request $request, $id)
    {

        $beneficiaire = Beneficiaire::findorfail($id);
        $beneficiaire->update([
             'nom' => $request->nom,
             'prenom' => $request->prenom,
             'âge' => $request->age,
             'date_de_naissance' => $request->date_naissance,
             'sexe' => $request->sexe,
             'situation_familiale' => $request->situation,
             'état_sanitaire' => $request->etat,
             'date_entrée' => $request->date_entrée,
             'date_sortie' => $request->date_sortie,
             'cin'=>$request->cin,
             'services_bénéficier'=> implode(',',$request->service),
             'remarques' => $request->remarques,
             $image=$request->file('photo')->getClientOriginalName(),
             $path = $request->file('photo')->storeAs('beneficiaires',$image,'ouassima'),
             'photo' => $path
        ]);
        return redirect()->back()->with('message', 'les modifications ont bien été enregistrées!');

    }
   
    public function archiveBene($id)
    {
       $centres = Centre::all();   
       $beneficiaires = Beneficiaire::all();
       return view('beneficiairess.Softdelete', compact('beneficiaires','id','centres'));
    }
   

/********************************Service************************************ */
    public function AjoutSer($id){
        return view('servicess.create',compact('id'));
    }
    public function storeSer(StoreServiceRequest $request){
        $service= new Service();
        $service->centre_id=$request->centre_id;
        $service->nom = $request->nom;
        $service->type= $request->type;
        $service->disponibilité = $request->disponibilité;
        $service->description= $request->description;
        $service->save(); 
        return redirect()->back()->with('message', 'le service a été bien enregistré!');
      
    }
    public function indexSer($id)
    {  
            $centres = Centre::all();             
            $services = Service::all();
            return view('servicess.index',compact('services','id','centres'));
    }
    public function editSer($id)
    {
        $service = Service::findorfail($id);
        return view('servicess.edit', compact('service'));
    }
    public function updateSer(StoreServiceRequest $request, $id)
    {

        $service = Service::findorfail($id);
        $service->update([
             'nom' => $request->nom,
             'type' => $request->type,
             'disponibilité' => $request->disponibilité,
             'description' => $request->description
        ]);
        return redirect()->back()->with('message', 'les modifications ont bien été enregistrées!');

    }
    public function SoftDeleteSer($id)
    {
        Service::findorfail($id)->delete();
        return redirect()->back();
    }
    public function archiveSer($id)
    { 
       $centres = Centre::all();          
       $services = Service::onlyTrashed()->get();
       return view('servicess.Softdelete', compact('services','id','centres'));
    }
    public function restoreSer($id) {
        $service = Service::onlyTrashed()->where('id',$id)->get();
        Service::withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }

/********************************Centre*************************************/

public function editCentre($id)
{
    $centre = Centre::findorfail($id);
    return view('centress.edit', compact('centre'));
}
public function updateCentre(StoreCentreRequest $request, $id)
{

    $centre = Centre::findorfail($id);
    $centre->update([
         'nom' => $request->nom,
         'adresse' => $request->adresse,
         'email' => $request->email,
         'numéro_telephone' => $request->numéro_telephone,
         'disponibilité' => $request->disponibilité,
         'capacité' => $request->capacité,
         'description' => $request->description,
    ]);
    return redirect()->back()->with('message', 'les modifications ont bien été enregistrées!');


}
}