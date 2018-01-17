<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" method="POST" action="{{url('/edit', $product->id)}}">
                {{csrf_field()}}
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                <label for="inputTitle" class="col-lg-2 control-label">Title</title>
                <div class="col-lg-10">
                    <input type="text" name="title" value="<?php echo $product->title; ?>" class="form-control" id="inputEmail" placeholder="Title">
                </div>
                <lable for="inputDescription" class="col-lg-2 control-label">Description</title>
                <div class="col-lg-10">
                    <textarea id="inputDescription" name="description" class="form-control" placeholder="Description">
                        <?php echo $product->description; ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="Submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-primary" href="{{url('/')}}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>