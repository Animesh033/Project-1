<h3 class="text-center" style="font-size: 30px; font-weight: bold;">Welcome to <span class="display-5" style="color: #18dcff; border-bottom: 2px solid #18dcff;">KWCIPL</span> ESI Portal</h3> 

<p class="text-center">
	<strong>ESI Temporary Identity Card Services. Get Your TIC needs from here</strong>
</p>

<div class="container py-4 text-center">
	<div class="row">
		<div class="col-md-4 animated fadeInUp fast">
			@guest('admin')
			<a href="" class="centered round" data-toggle="modal" data-target="#loginAdminModalCenter">
				<i class="fas fa-users fa-3x"></i>
			</a>
			@else
			<a href="{{route('admin.home')}}" class="centered round">
				<i class="fas fa-users fa-3x"></i>
			</a>
			@endguest
			<div class="dropdown-divider"></div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, veritatis!</p>
		</div>
		<div class="col-md-4 animated fadeInUp slow">
			@guest
			<a href="" class="centered round" data-toggle="modal" data-target="#loginUserModalCenter">
				<i class="fas fa-user-edit fa-3x"></i>
			</a>
			@else
			<a href="{{route('home')}}" class="centered round">
				<i class="fas fa-users fa-3x"></i>
			</a>
			@endguest
			<div class="dropdown-divider"></div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, veritatis!</p>
		</div>
		<div class="col-md-4 animated fadeInUp slow">
			@guest
			<a href="" class="centered round" data-toggle="modal" data-target="#ticModalCenter">
				<i class="fas fa-user-edit fa-3x"></i>
			</a>
			@else
			<a href="{{route('home')}}" class="centered round">
				<i class="fas fa-users fa-3x"></i>
			</a>
			@endguest
			<div class="dropdown-divider"></div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, veritatis!</p>
		</div>
	</div>	

	<div class="row">
		<div class="col-md-12 py-4 animated fadeInUp slow">
			<h1><strong class="border-bottom" style="border-color: #18dcff !important; border-width: 0px 0px 3px 0px !important;">Pricing table</strong></h1>
			<p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas facere sunt quibusdam a eius excepturi iusto quae repudiandae voluptas, voluptatem!</p>
		</div>
		<!-- <div class="col-md-4 animated fadeInUp slower">
			<div class="card bg-dark text-white">
				<img class="card-img" src="{{ asset('img/1.jpeg') }}" alt="Card image">
				<div class="card-img-overlay">
					<h5 class="card-title">Card title</h5>
					<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					<p class="card-text">Last updated 3 mins ago</p>
				</div>
			</div>
		</div>
		<div class="col-md-4"></div>
		<div class="col-md-4"></div> -->
	</div>

</div> <!-- End of container -->




