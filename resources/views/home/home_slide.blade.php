@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">

                        <form action="{{route('admin.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">tittle</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="tittle"
                                    value="{{ $homeslide->tittle }}">

                            </div><br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">short_tittle</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="short_tittle"
                                    value="{{ $homeslide->short_tittle }}">

                            </div><br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">vedio_url</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="vedio_url"
                                    value="{{ $homeslide->vedio_url }}">

                            </div><br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">home_image</label>
                                <input type="file" class="form-control" id="image" name="home_image">

                            </div><br>
                            <div class="form-group">
                                <label for="exampleInputEmail1"></label>
                                <img class="card-img-top img-fluid rounded avatar-lg" id="showImage" src="{{ asset('logo/nabin.jpg') }}" alt="">

                            </div><br>
                            
                            
                            <button type="submit" class="btn btn-info">Update Home slide</button>


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
