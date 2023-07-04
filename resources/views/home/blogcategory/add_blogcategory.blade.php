@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style type="text/css">
        .bootstrap-tagsinput .tag{
            margin-right: 2px;
            color: #b70000;
            font-weight: 700px;
        } 
    </style>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">

                        <form action="{{ route('save.blogcategory') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Blog_Category Name</label>
                                <select  name="blog_id"class="form-select" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    @foreach($blog as $blogcat)
                                    <option value="{{ $blogcat->id }}" >{{$blogcat->blog_category}}</option>
                                    @endforeach
                                    </select>

                            </div><br>
                             <div class="form-group">
                                <label for="exampleInputEmail1">blog_tittle</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="blog_tittle">
                                @error('blog_tittle')
                                <p class="text-danger">{{$message}}</p>
                                @enderror

                            </div><br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">blog_tags</label><br>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="blog_tags" value="nabin,laravel" data-role="tagsinput" >
                            </div><br>

                            <div class="form-group">
                                <label for="exampleInputEmail1">blog_description</label>
                                <textarea  type="text" class="form-control" id="exampleInputEmail1" name="blog_description" value=""
                                    rows="5"></textarea>

                            </div><br>


                            <div class="form-group">
                                <label for="exampleInputEmail1">blog_image</label>
                                <input type="file" class="form-control" id="image" name="blog_image">

                            </div><br>
                            <div class="form-group">
                                <label for="exampleInputEmail1"></label>
                                <img class="card-img-top img-fluid rounded avatar-lg" id="showImage"
                                    src="{{ asset('logo/no_image.jpg') }}" alt="">

                            </div><br>


                            <button type="submit" class="btn btn-info">Save Blogcategory</button>


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
