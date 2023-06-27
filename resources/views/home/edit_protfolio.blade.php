@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">

                        <form action="{{ route('update.protfolio',$protfolio->id) }}" method="post" enctype="multipart/form-data">
                            @csrf



                            <div class="form-group">
                                <label for="exampleInputEmail1">Protfolio_name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="protfolio_name" value="{{ $protfolio->protfolio_name }}">
                               @error('protfolio_name')
                               <p class="text-danger">{{$message}}</p>
                               @enderror

                            </div><br>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Protfolio_tittle</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="protfolio_tittle" value="{{ $protfolio->protfolio_tittle }}">
                                @error('protfolio_tittle')
                                <p class="text-danger">{{$message}}</p>
                                @enderror

                            </div><br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Protfolio_description</label>
                                <textarea type="text" class="form-control" id="exampleInputEmail1" name="protfolio_description" 
                                    rows="5">{{ $protfolio->protfolio_name }}</textarea>

                            </div><br>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Protfolio_image</label>
                                <input type="file" class="form-control" id="image" name="protfolio_image">

                            </div><br>
                            <div class="form-group">
                                <label for="exampleInputEmail1"></label>
                                <img class="card-img-top img-fluid rounded avatar-lg" id="showImage"
                                    src="{{ asset('protfolio/'.$protfolio->protfolio_image) }}" alt="">

                            </div><br>


                            <button type="submit" class="btn btn-info">Update Protfolio</button>


                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);

                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
