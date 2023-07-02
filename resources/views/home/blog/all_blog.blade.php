@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="main-content">
        <div class="page-content">
            <div class="card-body">

                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">SN:</th>
                            <th scope="col">Blog_Category</th>
                            <th scope="col">Blog_Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    @foreach ($blogs as $blog)
                      
                            <tr>
                                <th scope="row">{{ $blogs->firstItem() + $loop ->index}}</th>
                                <td>{{ $blog->blog_category }}</td>
                                <td><a href="{{ route('edit.blog',$blog->id) }}" class="btn btn-info sm" >Edit</a> 
                                    <a href="{{ route('delete.blog',$blog->id) }}" class="btn btn-danger sm" id="delete">Delete</a>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
          {{$blogs->links()}}

        </div>
    </div>
@endsection
