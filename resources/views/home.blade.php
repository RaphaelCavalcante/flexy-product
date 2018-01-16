<div class="container">
    <div class="row">
        
        <div class="row">
            <div class="col-md-6 col-lg-6">
            @if(session('info'))
                <div class="alert alert-success">
                    {{session('info')}}
                </div>
            @endif        
            </div>
        </div>
        @if(count($products) > 0)
            @foreach($products->all() as $product)
                <span> {{ $product->title}}, {{$product->description}} </span>
            @endforeach
        @endif
    </div>
</div>