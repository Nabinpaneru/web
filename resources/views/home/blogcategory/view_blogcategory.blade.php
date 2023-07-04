@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="main-content">
        <div class="page-content">
            <div class="card-body">
                
                       <div class="form-group">
                        <label for="exampleInputEmail1">Blog_Tittle:</label>
                        <p>{{$blogs->blog_tittle}}</p> </div><br>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Blog_Description:</label>
                        <p rows="5">{{$blogs->blog_description}}</p>

                    </div><br>


             </div>
            {{-- {{$blogs->links()}} --}}

        </div>
    </div>
@endsection
