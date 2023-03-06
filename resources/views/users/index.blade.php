

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
<div class="row row-xs wd-xl-70p">
    <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
        <form action="{{ route('admins.archiveUser',$id) }}" method="get">
            @csrf
            <button type="submit"class="btn btn-success btn-with-icon btn-block"><i class="typcn typcn-document">Voir Archive</i></button>
        </form>
    </div>
</div>

</div>
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
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

                            <a href="{{route('admins.editUser',$user->id)}}"><div  class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><button class="btn btn-primary btn-with-icon btn-block" type="submit" ><i class="typcn typcn-edit"></i> </button></div>
                            </a><br>
                            <form action="{{ route('admins.SoftDeleteUser',$user->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><button class="btn btn-danger btn-with-icon btn-block" type="submit" onclick="clickMe()"><i class="typcn typcn-archive"></i></button></div>
                            </form>
                            </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
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
    