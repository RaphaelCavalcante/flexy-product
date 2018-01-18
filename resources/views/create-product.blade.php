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
                    @if(!empty($tags))
                    <select id="inputTags" class="form-control" name="product_tags[]" class="form-control input-lg" multiple> 
                        @foreach($tags as $tag)
                            <option class="form-option" value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                    @else
                        <?php echo('There are no tags avaliable')?>
                    @endif
                </div>
                
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
                    </span>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{url('/')}}">Back</a>       
                   @if(!empty($tags))
                        <button type="Submit" class="btn btn-primary">Submit</button>
                    @else
                    <button type="Submit" class="btn btn-primary" disabled>Submit</button>
                    @endif
                </div>
            </form>    