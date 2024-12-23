<!DOCTYPE html>
<html lang="en">

<head>

     <base href="/public">
	<title>Pizza - Free Bootstrap 4 Template by Colorlib</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>Delicous</small></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>
			<div  class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item "><a href="{{url('/')}}" class="nav-link">Home</a></li>
					<li class="nav-item active ">
					@auth
					<a href="{{url('/showcart',Auth::user()->id)}}" class="nav-link">
					Cart {{$count}}
                     </a>
					@endauth

					@guest
                     Cart[0]
					@endguest
					</li>
					@if (Route::has('login'))
                                @auth
                                    <li>

									<x-app-layout>
   
                                    </x-app-layout>

                                    </li>
                                @else
                                    <li class="nav-item"><a
                                        href="{{ route('login') }}"
                                        class="nav-link"
                                    >
                                        Log in
                                    </a></li>

                                    @if (Route::has('register'))
                                        <li class="nav-item"><a
                                            href="{{ route('register') }}"
                                            class="nav-link"
                                        >
                                            Register
                                        </a></li>
                                    @endif
                                @endauth
                        @endif
				</ul>
			</div>
		</div>
	</nav>

    <div style="overflow-x: auto; margin: 20px auto; max-width: 90%;">
    <table style="border-collapse: collapse; width: 100%; max-width: 800px; margin: auto; background-color: #fff;">
        <thead style="background-color: #f2f2f2; border-bottom: 2px solid #ddd;">
            <tr>
                <th style="padding: 15px; text-align: center; font-weight: bold; border: 1px solid #ddd;">Food Name</th>
                <th style="padding: 15px; text-align: center; font-weight: bold; border: 1px solid #ddd;">Price</th>
                <th style="padding: 15px; text-align: center; font-weight: bold; border: 1px solid #ddd;">Quantity</th>
                <th style="padding: 15px; text-align: center; font-weight: bold; border: 1px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>

             <form action="{{url('orderconfirm')}}" method="POST">
                @csrf
            <!-- First Loop for Item Details -->
            @foreach($data as $index => $item)
            <tr style="text-align: center; border: 1px solid #ddd; background-color: #fff;">
                <td style="padding: 15px; border: 1px solid #ddd;">
                    <input type="text" name="foodname[]" value="{{$item->title}}" hidden="">
                    {{$item->title}}
                </td>
                <td style="padding: 15px; border: 1px solid #ddd;">
                <input type="text" name="price[]" value="{{$item->price}}" hidden="">   
                {{$item->price}}
                </td>
                <td style="padding: 15px; border: 1px solid #ddd;">
                <input type="text" name="quantity[]" value="{{$item->quantity}}" hidden="">  
                {{$item->quantity}}
                </td>
                <td style="padding: 15px; border: 1px solid #ddd;">
                    <!-- Placeholder for Remove Button -->
                    @if(isset($data2[$index]))
                    <a href="{{ url('/remove', $data2[$index]->id) }}" class="btn btn-warning" style="text-decoration: none; color: #fff; background-color: #f0ad4e; padding: 8px 12px; border-radius: 4px;">Remove</a>
                    @else
                    &nbsp;
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
     
    <div align="center" style="padding: 20px;">
    <!-- Order Button -->
    <button class="btn btn-primary" type="button" id="order" style="padding: 10px 20px; font-size: 16px; cursor: pointer;">Order Now</button>
</div>

<!-- Hidden Form Section -->
<div id="appear" align="center" style="padding: 20px; display: none; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 10px; max-width: 400px; margin: auto; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h3 style="margin-bottom: 20px; font-family: Arial, sans-serif; color: #333;">Enter Your Details</h3>
    
    <!-- Name Input -->
    <div style="margin-bottom: 15px;">
        <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    
    <!-- Phone Input -->
    <div style="margin-bottom: 15px;">
        <label for="phone" style="display: block; margin-bottom: 5px; font-weight: bold;">Phone</label>
        <input type="number" id="phone" name="phone" placeholder="Enter your phone number" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    
    <!-- Address Input -->
    <div style="margin-bottom: 20px;">
        <label for="address" style="display: block; margin-bottom: 5px; font-weight: bold;">Address</label>
        <input type="text" id="address" name="address" placeholder="Enter your address" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    
    <!-- Buttons -->
    <div style="display: flex; justify-content: space-between;">
        <input class="btn btn-success" type="submit" value="Confirm Order" style="padding: 10px 20px; font-size: 16px; border-radius: 5px; cursor: pointer;">
        <button id="close" type="button" class="btn btn-danger" style="padding: 10px 20px; font-size: 16px; border-radius: 5px; cursor: pointer;">Close</button>
    </div>
</div>

</form>





    <!-- END nav -->
	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>
     
     <script type="text/javascript">
        $("#order").click(
           function(){
            $("#appear").show();
           }
        );

        $("#close").click(
           function(){
            $("#appear").hide();
           }
        );
     </script>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/jquery.timepicker.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

</body>

</html>