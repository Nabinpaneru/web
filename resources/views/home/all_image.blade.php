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
                            <th scope="col">IMAGE</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                    @foreach ($images as $image)
                      
                            <tr>
                                <th scope="row">{{ $images->firstItem() + $loop ->index}}</th>
                                <td><img src="{{ asset('multi/' . $image->multi_image) }}" alt="img" width="80"
                                        height="80" /></td>
                                <td><a href="{{ route('image.edit',$image->id) }}" class="btn btn-info sm" >Edit</a> 
                                    <a href="{{ route('image.delete',$image->id) }}" class="btn btn-danger sm" id="delete">Delete</a>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
          {{$images->links()}}

        </div>
    </div>
@endsection
