@include('inc.header')
<div class="container">
               <form class="form-group" method="POST" action="{{url('/edit', $product->id)}}">
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
                    <label for="inputTags"> Tags </label>
                    <select id="inputTags" class="form-control" name="product_tags[]" class="form-control input-lg" multiple> 
                        @foreach($tags->all() as $tag)
                            <option class="form-option" value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                    <span> Ten most used tags:
                        @foreach($tags->all() as $tag)
                            #{{$tag->name}}
                        @endforeach
                    </span>
                
                

                <div class="pull-right">
                    <button type="Submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-primary" href="{{url('/')}}">Back</a>
                </div>
            </form>
</div>