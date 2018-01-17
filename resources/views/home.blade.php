@include('inc.header')
@if(session('info'))
<div class="alert alert-success">
    {{session('info')}}
</div>
@endif        
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="product-list">
                @if(count($products) > 0)
                @foreach($products->all() as $product)
                
                <div class="card mb-3" style="max-height: 100; max-width: 80rem;">
                    <h4 class="card-text">{{ $product->title}}</h4>
                    <img class="img-fluid" src="{{Storage::url($product->image)}}" style="height: 150px; width: 150px; display: block;">
                    <div class="overlay">
                            <ul class="list-inline pull-right">
                                <li class="list-inline-item">
                                    <div class="button">
                                        <a href="/view/{{$product->id}}" title="view">
                                            <i class="fa fa-eye" style="color:blue"></i>
                                        </a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="button">
                                        <a href="/update/{{$product->id}}" title="edit">
                                            <i class="fa fa-pencil" style="color:blue"></i>
                                        </a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="button">
                                        <a href="/delete/{{$product->id}}" title="delete">
                                            <i class="fa fa-close" style="color:blue"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            
                            
                        
                    </div>
                    
                    

                    
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@include('inc.footer')
