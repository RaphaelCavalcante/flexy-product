@include('inc.header')
<div class="container">
    <form class="form-group" method="POST" action="{{url('/edit', $product->id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <div class="form-group">
            <label for="product-image" class="control-label">Product Picture</label>
            <div class="product-picture">
                <input class="form-control" type="file" name="product_image" id="product_image">
            </div>
            <label for="inputTitle">Title</label>
            <input class="form-control" type="text" name="title" value="{{$product->title}}" class="form-control" id="inputEmail" placeholder="Title">
        
            <label for="inputDescription">Description</label>                
            <textarea id="inputDescription" name="description" class="form-control" name="description" rows="6" cols="50" maxlength="4000"  >
                {{$product->description}}
            </textarea>
            <label for="inputStock" class="control-label">Stock</label>
            <input class="form-control" type="number" value="{{$product->stock}}" name="stock">
            <label for="inputTags"> Tags </label>
            <select id="inputTags" class="form-control" name="product_tags[]" class="form-control input-lg" multiple> 
            <!-- COMMENT: SHOWs CURRENT TAGS FROM PRODUCT -->
                @foreach($tags->all() as $tag)
                    <option class="form-option" 
                        @if($product->tags()->find($tag->id))
                            selected = "selected"
                        @endif
                        value="{{$tag->id}}">{{$tag->name}} 
                    </option>
                @endforeach
                <!-- END COMMENT -->
            </select>
        </div>
        <!-- COMMENT: SHOWs ONLY TAGS USED AT LEAST BY ONE PRODUCT-->
        <span> Ten most used tags: 
        @if(!empty($tags))
            @for($i=0;$i<10;$i++)
                @if($tags[$i]->products->count() > 0)
                    #{{$tags[$i]->name}}
                @endif
            @endfor
        @else
            <?php echo ('there are no tags avaliable') ?>
        @endif
        <!-- END COMMENT -->
        </span>
        <div class="pull-right">
            <button type="Submit" class="btn btn-primary">Update</button>
            <a class="btn btn-primary" href="{{url('/')}}">Back</a>
        </div>
    </form>
</div>