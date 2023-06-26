@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">

                        <form action="{{ route('multi.save') }}" method="post" enctype="multipart/form-data">
                            @csrf




                            <div class="form-group">
                                <label for="exampleInputEmail1">multi_image</label>
                                <input type="file" class="form-control" id="image" name="multi_image[]"
                                    multiple="">

                            </div><br>
                            @error('multi_image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1"></label>
                                <img class="card-img-top img-fluid rounded avatar-lg" id="showImage"
                                    src="{{ asset('logo/logo.png') }}" alt="">

                            </div><br>


                            <button type="submit" class="btn btn-info">Save Multi image</button>


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
