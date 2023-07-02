@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">

                        <form action="{{ route('save.blog') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Blog_Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="blog_category">
                                @error('blog_category')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div><br>
                            <button type="submit" class="btn btn-info">Save Blog</button>


                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection
