

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

<br><br>
@section('content')

<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                        <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">id</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Photo</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Nom</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Prénom</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Âge</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Date de Naissance</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Sexe</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Numéro de telephone</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Email</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">poste_occupé</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Action</th>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                                @if ($user->centre_id== $id)
                                <tr>
                                <td>{{$user->id}}</td>
                                <td><img src="{{asset('imgs/'.$user->photo)}}" width="100px" height="90px"></td>
                                <td>{{$user->nom}}</td>
                                <td>{{$user->prenom}}</td>
                                <td>{{$user->âge}}</td>
                                <td>{{$user->date_de_naissance}}</td>
                                <td>{{$user->sexe}}</td>
                                <td>{{$user->numéro_de_telephone}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->poste_occupé}}</td>
                                <td>
                                <form action="{{ route('admins.destroyUser',$user->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <div  class=""><button class="btn btn-danger btn-with-icon btn-block" type="submit" onclick="clickMe()"><i class="typcn typcn-trash" style='font-size:26px'></i> </button></div>
                                </form>
                                <form action="{{ route('admins.restoreUser',$user->id) }}" method="get">
                                    @csrf
                                        <div class=""><button class="btn btn-indigo btn-with-icon btn-block" type="submit" onclick="clickMee()"><i class="fas fa-trash-restore-alt" style='font-size:24px;align:center'></i> </button></div>
                                </form>
                             </td>
                            </tr>
                            @endif
                            @endforeach
                            </form>
                            </td>
                    </table>
                </div>
            </div>
        </div>
    </div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection
<script> 
    function clickMe(){
      swal({
              title: "La suppression a bien été effectuée",
              text: "!vous avez cliqué sur le boutton",
              icon: "success",
              
            });
      }
            
</script>   
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
<script> 
    function clickMee(){
      swal({
              title: "La restauration d'utilisateur a été effectuée avec succés",
              text: "!vous avez cliqué sur le boutton",
              icon: "success",
              
            });
      }
            
</script>   
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    