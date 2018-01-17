@include('inc.header')
<div class="container">
        
            <form class="form-group" method="POST" action="{{url('/insert') }}" enctype="multipart/form-data">
                {{csrf_field()}}
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                <div class="form-group">
                    <label for="productImage" class="control-label"> Product Picture </label>
                    <div class="product-picture">
                        <input class="form-control" type="file" name="product_image" id="product_image">
                    </div>
                    <label for="inputTitle" class="control-label">Title</label>
                    <input class="form-control" type="text" name="title" class="form-control" id="inputEmail" placeholder="Title" maxlength="6">
                
                    <label for="inputDescription" class="control-label">Description</label>
                    <textarea class="form-control" id="inputDescription" name="description" rows="6" cols="50" maxlength="4000" placeholder="Description">
                    </textarea>

                    <label for="inputStock" class="control-label">Stock</label>
                    <input class="form-control" type="number" name="stock" placeholder="0">

                    <label for="inputTags" class="control-label">Tags</label>
                    <select2 id="inputTags" class="form-control" name="product_tags[]" class="form-control input-lg" multiple> 
                        @foreach($tags as $tag)
                            <option class="form-option" value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select2>
                </div>
                
                    <span> Ten most used tags: 

                    @foreach($tags as $tag)
                        #{{$tag->name}}
                    @endforeach
                    </span>
                
                <!-- {{$tag->name}} -->
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{url('/')}}">Back</a>       
                    <button type="Submit" class="btn btn-primary">Submit</button>
                </div>
            </form>    