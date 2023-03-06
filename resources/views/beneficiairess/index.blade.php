
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
        <form action="{{ route('userss.archiveBene',$id) }}" method="get">
            @csrf
            <button type="submit"class="btn btn-success btn-with-icon btn-block"><i class="typcn typcn-document">Voir Archive</i></button>
        </form>
    </div>
</div>
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example">
                        <thead>
                            <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Photo</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">CIN</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Nom</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Prénom</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Âge</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Date de Naissance</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Sexe</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Situation Familiale</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Etat Sanitaire</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Date d'entrée</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">date_sortie</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Les services</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Action</th>
                                <th class=" border-bottom-0" style="color:purple;font-weight:bolder;">Remarques</th>

                        </thead>

                        <tbody>

                            @foreach($beneficiaires as $beneficiaire)
                            @if($beneficiaire->date_sortie == null || ($beneficiaire->date_sortie > $date && $beneficiaire->date_entrée < $date))
                            @if ($beneficiaire->centre_id== $id)
                            <tr>
                            <td><img src="{{asset('imgs/'.$beneficiaire->photo)}}" width="200px" height="100px" style="border-radius: 50%"></td>
                            <td>{{$beneficiaire->cin}}</td>
                            <td>{{$beneficiaire->nom}}</td>
                            <td>{{$beneficiaire->prenom}}</td>
                            <td>{{$beneficiaire->âge}}</td>
                            <td>{{$beneficiaire->date_de_naissance}}</td>
                            <td>{{$beneficiaire->sexe}}</td>
                            <td>{{$beneficiaire->situation_familiale}}</td>
                            <td>{{$beneficiaire->état_sanitaire}}</td>
                            <td>{{$beneficiaire->date_entrée}}</td>
                            <td>{{$beneficiaire->date_sortie}}</td>
                            <td>{{$beneficiaire->services_bénéficier}}</td>

                            <td>
                            <a href="{{route('userss.editBene',$beneficiaire->id)}}"><div  class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><button class="btn btn-indigo btn-with-icon btn-block" type="submit" ><i class="typcn typcn-edit"></i> </button></div>
                            </a><br>
                           
                            </td>
                            <td>{{$beneficiaire->remarques}}</td>

                            </tr>
                            @endif
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