




<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
.gradient-custom {
    /* fallback for old browsers */
   background: #fa84bf;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(250, 132, 224, 0.5), rgba(143, 211, 244, 0.5));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(250, 132, 138, 0.5), rgba(143, 211, 244, 0.5))
    }
    @media (min-width: 1025px) {
.h-custom {
height: 200vh !important;
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
<section class="vh-67 gradient-custom h-custom">
    <div class="container py-5 h-67">
      <div class="row justify-content-center align-items-center h-200">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 50px;">
            <div class="card-body p-4 p-md-5">

              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="font-weight: bold;font-family::'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;text-align:center;color: rgba(250, 132, 138, 0.5);font-size:45" >Editer Utilisateur</h3>
              @if(session()->has('message'))
                <div class="alert alert-success">
                 {{ session()->get('message')}}
                </div>
                @endif
              <form action="{{route('admins.updateUser',$user->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label"><h6 class="mb-2 pb-1">Nom :</h6></label>
                      <input type="text" name="nom" class="form-control form-control-lg" value="{{$user->nom}}" class="@error('nom') is-invalid @enderror">
                      @error('nom')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" ><h6 class="mb-2 pb-1">Prénom :</h6></label>
                      <input type="text"  name="prenom" class="form-control form-control-lg" value="{{$user->prenom}}" class="@error('prenom') is-invalid @enderror">
                      @error('prenom')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" ><h6 class="mb-2 pb-1">Âge :</h6></label>
                        <input type="text" name="âge" value="{{$user->âge}}" class="form-control form-control-lg" class="@error('âge') is-invalid @enderror">
                        @error('âge')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div>
                    </div>

                    <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" ><h6 class="mb-2 pb-1">Date de Naissance :</h6></label>
                        <input type="date" name="date" value="{{$user->date_de_naissance}}" class="form-control form-control-lg" class="@error('date') is-invalid @enderror">
                        @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                      <h6 class="mb-2 pb-1">Sexe: </h6>
  
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexe" id="femaleGender"
                          value="Femme"  checked class="@error('sexe') is-invalid @enderror"/>
                          @error('sexe')
                          <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        <label class="form-check-label" for="femaleGender">Femme</label>
                      </div>
  
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexe" id="maleGender"
                          value="Homme"  class="@error('sexe') is-invalid @enderror"/>
                          @error('sexe')
                          <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        <label class="form-check-label" for="maleGender">Homme</label>
                      </div>
  
                    </div>
                    </div><br>
                <div class="row">
                    <div class="col-md-12 mb-6">
                    <div class="form-outline">
                        <label class="form-label" ><h6 class="mb-2 pb-1">Numéro de telephone :</h6></label>
                        <input type="text" name="num" value="{{$user->numéro_de_telephone}}" class="form-control form-control-lg" class="@error('num') is-invalid @enderror">
                        @error('num')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div>
                    </div>
                </div><br>
                    <div class="row">
                        <div class="col-md-12 mb-6">
                        <div class="form-outline">
                            <label class="form-label" ><h6 class="mb-2 pb-1">Poste occupé :</h6></label>
                            <input type="text" name="poste" value="{{$user->poste_occupé}}" class="form-control form-control-lg" class="@error('poste') is-invalid @enderror">
                            @error('poste')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                          </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" ><h6 class="mb-2 pb-1">Email :</h6></label>
                            <input type="email" name="email" value="{{$user->email}}" class="form-control form-control-lg" class="@error('email') is-invalid @enderror">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                          </div>
                        </div>
                        <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" ><h6 class="mb-2 pb-1">Mot de passe :</h6></label>
                            <input type="password" name="password" value="{{$user->password}}" class="form-control form-control-lg" class="@error('password') is-invalid @enderror">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                          </div>
                        </div>
                    </div><br>
                   
                  


                            <label class="form-label" ><h6 class="mb-2 pb-1">Photo :</h6></label>
                            <input type="file" name="photo" value="{{$user->photo}}" class="form-control form-control-lg" class="@error('photo') is-invalid @enderror">
                            @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                            <br>
                <div class="mt-0 pt-2" style="text-align:center">
                    <input class="btn btn-primary btn-lg" type="submit" value="Modifier" />
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
