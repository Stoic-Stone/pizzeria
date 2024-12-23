<style>
	.services-wrap {
    margin-bottom: 15px;  
}

.pricing-entry {
    margin-bottom: 20px;  
}

</style>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Hot Pizza Meals</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>
    </div>
    <div class="container-wrap">
        <div class="row no-gutters d-flex">
            @foreach($data as $food)  
            
            <div class="col-lg-4 d-flex ftco-animate">
                <div class="services-wrap d-flex">
                    <a href="#" class="img" style="background-image: url({{ asset('foodimage/'.$food->image) }});"></a>
                    <div class="text p-4">
                        <h3>{{ $food->title }}</h3>
                        <p>{{ $food->description }}</p>
                        <p class="price">
                            <span>${{ number_format($food->price, 2) }}</span>
                            <form action="{{url('/addcart',$food->id)}}" method="POST">
                            @csrf
                            <input type="submit" value="add cart" class="ml-2 btn btn-white btn-outline-white">
                            <input type="number" name="quantity" min="1" value="1" style="width: 80px;">
                            </form>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">Our Menu Pricing</h2>
                <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
                <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>
        <div class="row">
            @foreach($data as $food)  
            <div class="col-md-6">
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url({{ asset('foodimage/'.$food->image) }});"></div>
                    <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                            <h3><span>{{ $food->title }}</span></h3>
                            <span class="price">${{ number_format($food->price, 2) }}</span>
                        </div>
                        <div class="d-block">
                            <p>{{ $food->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
