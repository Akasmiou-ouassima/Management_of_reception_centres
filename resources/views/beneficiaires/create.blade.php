<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-UkVD+zxJKGsZP3s/JuRzapi4dQrDDuEf/kHphzg8P3v8wuQ6m9RLjTkPGeFcglQU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/js/coreui.bundle.min.js" integrity="sha384-n0qOYeB4ohUPebL1M9qb/hfYkTp4lvnZM6U6phkRofqsMzK29IdkBJPegsyfj/r4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity=" sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/js/coreui.min.js" integrity="sha384-2hww80ziDjQXYpFulPf5tfdCCXLTxn70HdSwL9MfeEvpS0kjfHd1iaBRsLpnuaSC" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@4.3.2/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-EeY9vKy5BpcvZvhMsXk8ZQ8iQPdGN/592RjtQrlRTa8fxPZovarAd02WR1WFFk+/" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@4.3.2/dist/js/coreui.bundle.min.js" integrity="sha384-AekAC2S7WX3JY6Z9cKOFyCsxgzI1Dq3i5zx2j7WhH3DdYA7/qHSzs4j90SCj9DJV" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity=" sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@4.3.2/dist/js/coreui.min.js" integrity="sha384-9YyzhF1YDvkAxcmP1IaT6h2nzFXLtlj9TXe8uMHDgl19KqYpnB9mBb9PfiIgxlXH" crossorigin="anonymous"></script>
<style>
.gradient-custom {
    /* fallback for old browsers */
   background: #84fab0;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
    }
@media (min-width: 1025px) {
.h-custom {
height: 300vh !important;
}
}
    .card-registration .select-input.form-control[readonly]:not([disabled]) {
    font-size: 1rem;
    line-height: 2.15;
    padding-left: .75em;
    padding-right: .75em;
    }
    .card-registration .select-arrow {
    top: 13px;
    }
 
</style>
</head>
<body>
<section class="vh-67 gradient-custom h-custom">
    <div class="container py-5 h-67">
      <div class="row justify-content-center align-items-center h-200">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="font-weight: bold;font-family::'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;text-align:center;color: #84fadc;font-size:45">Ajouter Bénéficiaire</h3>
                @if(session()->has('message'))
                <div class="alert alert-success">
                 {{ session()->get('message')}}
                </div>
                @endif
              <form action="{{ route('admins.storeBene') }}" method="post" enctype="multipart/form-data" >
                @csrf

                <div class="row">
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <label class="form-label"><h6 class="mb-2 pb-1">Nom :</h6></label>
                    <input type="hidden"  name="centre_id" value="{{$id}}">
                    <input type="text"  name="nom" placeholder="Entrer nom" class="form-control form-control-lg" value="{{old('nom')}}"class="@error('nom') is-invalid @enderror" >
                    @error('nom')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                  </div>

                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" ><h6 class="mb-2 pb-1">Prénom :</h6></label>
                      <input type="text"  name="prenom" placeholder="Entrer prenom" class="form-control form-control-lg" value="{{old('prenom')}}" class="@error('prenom') is-invalid @enderror">
                      @error('prenom')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <label class="form-label" ><h6 class="mb-2 pb-1">CIN/Carte d'identité :</h6></label>
                  <div class="col-md-6 mb-6">
                      <div class="form-outline">
                        <input type="text" name="cin"   placeholder="Ex : LG12895" class="form-control typcn-calendar-outline form-control-lg fc-datepicker"  value="{{old('cin')}}" class="@error('cin') is-invalid @enderror">
                        @error('cin')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                          </div>
                      </div>
              </div>
                <br>          
                <div class="row">
                    <div class="col-md-6 mb-6">
                        <div class="form-outline">
                          <label class="form-label"><h6 class="mb-2 pb-1">Âge : </h6></label>
                          <input type="text"  name="age" placeholder="Âge" class="form-control form-control-lg" value="{{old('age')}}" class="@error('age') is-invalid @enderror">
                          @error('age')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                    </div>
                    </div>
                       <div class="col-md-6 mb-6">
                            <div class="form-outline">
                              <label class="form-label" ><h6 class="mb-2 pb-1">Date de Naissance :</h6></label>

                              <input type="date" name="date_naissance" placeholder="MM/DD/YYYY" class="form-control typcn-calendar-outline form-control-lg fc-datepicker" value="{{old('date_naissance')}}"class="@error('date_naissance') is-invalid @enderror" >
                              @error('date_naissance')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                                </div>
                            </div>
                 </div>
                 <br>
                 <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="mb-2 pb-1">Sexe : </h6>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="sexe" id="femaleGender"
                        value="Femme"  value="{{old('sexe')}}" class="@error('sexe') is-invalid @enderror"/>
                        @error('sexe')
                        <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      <label class="form-check-label" for="femaleGender">Femme</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="sexe" id="maleGender"
                        value="Homme" value="{{old('sexe')}}" class="@error('sexe') is-invalid @enderror"/>
                        @error('sexe')
                        <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      <label class="form-check-label" for="maleGender">Homme</label>
                    </div>

                  </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <label class="form-label" ><h6 class="mb-2 pb-1">Situation familiale :</h6></label>
                          <input type="text"  name="situation" placeholder="Situation familiale" class="form-control form-control-lg" value="{{old('situation')}}"class="@error('situation') is-invalid @enderror">
                          @error('situation')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6 mb-6">
                        <div class="form-outline">
                          <label class="form-label" ><h6 class="mb-2 pb-1">Etat sanitaire:</h6></label>
                          <input type="text" name="etat" placeholder="Etat sanitaire"  class="form-control form-control-lg" value="{{old('etat')}}"class="@error('etat') is-invalid @enderror"  >
                          @error('etat')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                        </div>
                    </div>
                </div>
             <br>
                <div class="row">
                    <div class="col-md-6 mb-6">
                        <div class="form-outline">
                          <label class="form-label"><h6 class="mb-2 pb-1">Date d'entrée :</h6></label>

                          <input type="date"  name=" date_entrée" placeholder="MM/DD/YYYY" class="form-control typcn-calendar-outline form-control-lg fc-datepicker" value="{{old('date_entrée')}}"  class="@error('date_entrée') is-invalid @enderror">
                          @error('date_entrée')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-6">
                            <div class="form-outline">
                              <label class="form-label" ><h6 class="mb-2 pb-1">Date de sortie :</h6></label>

                              <input type="date"  name="date_sortie" placeholder="MM/DD/YYYY" class="form-control typcn-calendar-outline form-control-lg fc-datepicker" value="{{old('date_sortie')}}"class="@error('date_sortie') is-invalid @enderror">
                              @error('date_sortie')
                              <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                                </div>
                            </div>
                </div>
                <br>
                <div class="row ">                 
                  <div class="form-group">
              <label lass="form-label"><h6 class="mb-2 pb-1">Les services : </h6></label>
              <select class="form-control form-control-lg selectpicker form-multi-select"  data-coreui-search="true" name="service[]" multiple="multiple" value="{{old('service')}}" class="@error('service') is-invalid @enderror">        
                @foreach ($services as $service)
                <option value="{{$service->nom}}">{{$service->nom}}</option>
                @endforeach             
              </select>
              @error('service')
                    <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                 </div>             
              </div>
             
         <br>
                <div class="row">
                    <label class="form-label" ><h6 class="mb-2 pb-1">Les Remarques :</h6></label>
                    <div class="col-md-10 mb-4">
                        <div class="form-outline">

                          <textarea type="text"  name="remarques" placeholder="Les remarques" class="form-control typcn-calendar-outline form-control-lg fc-datepicker" value="{{old('remarques')}}" class="@error('remarques') is-invalid @enderror">
                         </textarea>
                         @error('remarques')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                            </div>
                        </div>
                </div>
                
                        <label  class="form-label"><h6 class="mb-2 pb-1">Photo :</h6></label>
                        <input class="form-control" type="file"  name="photo" id="formFile" value="{{old('photo')}}"  class="@error('photo') is-invalid @enderror">
                        @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
               <br>
                <div class="mt-4 pt-2" style="text-align:center;">
                    <input class="btn btn-primary btn-lg" type="submit" style="text-align:center;"value="Ajouter" />
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </section>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</body>
 