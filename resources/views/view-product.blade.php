@include( 'inc.header')
<div class="container">
    <div class="row">
        <div class="card">   
            <img class="card-img-top" src="{{Storage::url($product->image)}}" style="height: 300px; width: 300px; display: block;">
            <div class="card-block">
                <div class="card-text">
                    Stock: {{$product->stock}}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <legend> <h1>{{ $product -> title }}</h1> </legend>
            @foreach($product->tags as $tag)
                <span>#{{$tag->name}}</span>
            @endforeach
            <div class="box">
                <h4>{{ $product->description }}</h4>
            </div>
            <a class="btn btn-default btn-primary pull-right" href="/">Back</a>
        </div>
    </div>
</div>