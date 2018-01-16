@include('inc.header')

<!-- <div class="row">    -->
    <!-- <div class="col-md-6 col-lg-6"> -->
        @if(session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
        @endif        
    <!-- </div> -->
    <div class="container">
    <!-- <div class="row"> -->
        <div class="col-lg-12">
    @if(count($products) > 0)
    @foreach($products->all() as $product)
            <div class="product-list">
                <div class="card border-primary mb-3" style="max-height: 10rem; max-width: 10rem;">
                    <div class="overlay">
                        <div class="button">
                            <a href="#">
                                <i class="fa fa-eye" style="color:blue"></i>
                            </a>
                        </div>
                        <div class="button">
                            <a href="#">
                                <i class="fa fa-pencil" style="color:blue"></i>
                            </a>
                        </div>
                        <div class="button">
                            <a href="#">
                                <i class="fa fa-close" style="color:blue"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body text-primary">
                        <span>{{$product->description}} </span>                  
                        <span class="title">{{ $product->title}} </span>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
    
    <!-- </div> -->
</div>
</div>
@include('inc.footer')