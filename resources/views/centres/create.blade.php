
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
.gradient-custom {
    /* fallback for old browsers */
   background: #fa848a;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(250, 132, 197, 0.5), rgba(143, 211, 244, 0.5));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(250, 132, 224, 0.5), rgba(143, 211, 244, 0.5))
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

              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="font-weight: bold;font-family::'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;text-align:center;color:cornflowerblue;font-size:45">Ajouter Centre</h3>
              @if(session()->has('message'))
                <div class="alert alert-success">
                 {{ session()->get('message')}}
                </div>
              @endif
              <form action="{{ route('admins.storeCentre') }}" method="post">
                @csrf

                <div class="row">
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <label class="form-label"><h6 class="mb-2 pb-1">Nom :</h6></label>
                    <input type="text"  name="nom" placeholder="Entrer nom" class="form-control form-control-lg" value="{{old('nom')}}"class="@error('nom') is-invalid @enderror" >
                    @error('nom')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                   </div>
                    <div class="col-md-6 mb-4">
                      <h6 class="mb-2 pb-1">Disponibilité: </h6>

                      <div class="form-check form-check-inline">

                        <input class="form-check-input" type="radio" name="disponibilité"
                          value="1" value="{{old('disponibilité')}}"class="@error('disponibilité') is-invalid @enderror"/>
                          @error('disponibilité')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        <label class="form-check-label" >Oui</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="disponibilité"
                          value="0" value="{{old('disponibilité')}}" class="@error('disponibilité') is-invalid @enderror"/>
                          @error('disponibilité')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        <label class="form-check-label" >Non</label>
                      </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-10 mb-6">
                    <div class="form-outline">
                      <label class="form-label" ><h6 class="mb-2 pb-1">Adresse :</h6></label>
                      <input type="text"  name="adresse" placeholder="Entrer adresse"  class="form-control form-control-lg" value="{{old('adresse')}}"class="@error('adresse') is-invalid @enderror" >
                      @error('adresse')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                </div>
  <br>
                <div class="row">
                    <div class="col-md-10 mb-6">

                          <label class="form-label"><h6 class="mb-2 pb-1">Email : </h6></label>
                          <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="height: 50px">@</div>
                            </div>
                          <input type="email"  name="email" placeholder="nom@example.com"  class="form-control form-control-lg" value="{{old('email')}}"class="@error('email') is-invalid @enderror">
                            </div>
                          @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                       <div class="col-md-10 mb-6">
                            <div class="form-outline">
                              <label class="form-label" ><h6 class="mb-2 pb-1">Numéro de telephone :</h6></label>
                              <div class="input-group mb-6">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" style="height: 50px">tél</div>
                                </div>
                              <input type="text" name="numéro_telephone" placeholder="+(212)"class="form-control form-control-lg " value="{{old('numéro_telephone')}}"class="@error('numéro_telephone') is-invalid @enderror"><br><br>
                              </div>
                              @error('numéro_telephone')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                 </div>
<br>
                <div class="row">
                    <label class="form-label" ><h6 class="mb-2 pb-1">Capacité :</h6></label>
                    <div class="col-md-4 mb-2 ">
                        <div class="form-outline">
                          <input type="text" name="capacité" placeholder="capacité" class="form-control  form-control-lg "  value="{{old('capacité')}}"class="@error('capacité') is-invalid @enderror">
                          @error('capacité')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <label class="form-label" ><h6 class="mb-1 pb-1">Description :</h6></label>
                    <div class="col-md-10 mb-1">
                        <div class="form-outline">
                          <textarea type="text" name="description" placeholder="Description"  class="form-control  form-control-lg " value="{{old('description')}}"class="@error('description') is-invalid @enderror">
                         </textarea><br><br>
                         @error('description')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                            </div>
                        </div>
                </div>
                <div class="mt-0 pt-2" style="text-align:center">
                    <input class="btn btn-primary btn-lg" type="submit" value="Ajouter" />
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
