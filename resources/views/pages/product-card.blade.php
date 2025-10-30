<div class="col-md-6 col-lg-4 col-xl-3">
    <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
        <div class="product-item-inner border rounded">
            <div class="product-item-inner-item">

                <img src="{{ asset('storage/' . $product->main_image) }}" 
                     class="img-fluid w-100 rounded-top" alt="{{ $product->name }}">

                @if($product->is_new)
                    <div class="product-new">New</div>
                @endif

                <div class="product-details">
                    <a href="#"><i class="fa fa-eye fa-1x"></i></a>
                </div>
            </div>
            <div class="text-center rounded-bottom p-4">
                <a href="#" class="d-block mb-2">{{ $product->brand ?? 'MotorPart' }}</a>
                <a href="#" class="d-block h4">{{ $product->name }}</a>
                @if($product->old_price)
                    <!-- <del class="me-2 fs-5">{{ $product->old_price }} F CFA</del> -->
                @endif
                <!-- <span class="text-primary fs-5">{{ $product->price }} F CFA</span> -->
            </div>
        </div>
        <div class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
            
            <a href="tel:+2250789199780" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4">
                <i class="fas fa-phone me-2"></i>Call us now
            </a>

            <!-- <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="d-flex">
                    <a href="#" class="text-primary d-flex align-items-center justify-content-center me-3">
                        <span class="rounded-circle btn-sm-square border"><i class="fas fa-random"></i></span>
                    </a>
                    <a href="#" class="text-primary d-flex align-items-center justify-content-center me-0">
                        <span class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></span>
                    </a>
                </div>
            </div> -->

        </div>
    </div>
</div>
