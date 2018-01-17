@include('inc.header')
<div class="container">
        
            <form class="form-group" method="POST" action="{{url('/insert') }}">
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
                    
                </div>
                <label for="inputTitle" class="control-label">Title</title>
                <input class="form-control" type="text" name="title" class="form-control" id="inputEmail" placeholder="Title">
                
                <label for="inputDescription" class="control-label">Description</title>
                
                <textarea class="form-control" id="inputDescription" name="description" class="form-control" placeholder="Description"></textarea>
                 
            </div>
                <button type="Submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-primary" href="{{url('/')}}">Back</a>       
                </div>
            </form>    