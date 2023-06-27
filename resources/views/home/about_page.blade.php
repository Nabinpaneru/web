@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">

                        <form action="{{route('about.update')}}" method="post" enctype="multipart/form-data">
                            @csrf


                            <input type="hidden" class="form-control"  name="id"
                                    value="{{ $aboutpage->id }}">

                            <div class="form-group">
                                <label for="exampleInputEmail1">tittle</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="tittle"
                                    value="{{ $aboutpage->tittle }}">

                            </div><br>

                            

                            <div class="form-group">
                                <label for="exampleInputEmail1">short_tittle</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="short_tittle"
                                    value="{{ $aboutpage->short_tittle }}" >

                            </div><br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">short_description</label>
                                <textarea type="text" class="form-control" id="exampleInputEmail1" name="short_description"
                                    value="" rows="5">{{ $aboutpage->short_description }}</textarea>

                            </div><br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">long_description</label>
                                <textarea type="text-area" class="form-control" id="exampleInputEmail1" name="long_description""
                                    value="" rows="5">{{ $aboutpage->long_description }}</textarea>

                            </div><br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">About_image</label>
                                <input type="file" class="form-control" id="image" name="about_image">

                            </div><br>
                            <div class="form-group">
                                <label for="exampleInputEmail1"></label>
                                <img class="card-img-top img-fluid rounded avatar-lg" id="showImage" src="{{ asset('aboutpageimg/'.$aboutpage->about_image ) }}" alt="">

                            </div><br>
                            
                            
                            <button type="submit" class="btn btn-info">Update About page</button>


                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>
    </div>

<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);

            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>  
@endsection