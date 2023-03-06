@extends('layouts.master2')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')

@if(auth('admin')->check()))
<form action="{{ route('logoutAdmin') }}" method="get" >
                                <div class=" mt-3 mb-0" style="padding-top:10%;padding-right:40%" ><button class="btn btn-danger btn-with-icon btn-block" type="submit" style="width:30%;font-weight:bolder;font-size:15px">.... Se Déconnecter </button></div>
</form>
		

@elseif(auth()->user()))
<form action="{{ route('logout') }}" method="get">
                                <div class=" mt-3 mb-0" style="padding-top:10%;padding-right:40%" ><button class="btn btn-danger btn-with-icon btn-block" type="submit" style="width:30%;font-weight:bolder;font-size:15px;">.... Se Déconnecter</button></div>
</form>
		

@else			  

		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-4 col-lg-6 col-xl-6 d-none d-md-flex bg-white">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-90p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
			   <div class=" bg-white col-md-12 col-lg-6 col-xl-6">
					<div class="login d-flex align-items-center">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
							<div class="col-md-10 col-lg-10 col-xl-8 h-50 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28" style="font-family:initial;color:rgb(12, 100, 158)" >Gestion Des Centres D'accueil</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>!! Bienvenue</h2>
												<h5 class="font-weight-semibold mb-4">... Veuillez vous connecter pour continuer</h5>

                                                <form action="{{route('login')}}" method="post">
                                                    @csrf
													<div class="form-group">
														<label>Email</label> <input class="form-control" placeholder="Entrez votre email" name="email" type="text">
													</div>
													<div class="form-group">
														<label>Mot de passe</label> <input class="form-control" placeholder="Entrez votre mot de passe" name="password" type="password">
													</div><button class="btn btn-main-primary btn-block">S'identifier</button>

												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endif
@endsection
@section('js')
@endsection
