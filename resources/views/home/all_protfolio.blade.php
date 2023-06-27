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
                            <th scope="col">Protfolio_name</th>
                            <th scope="col">Protfolio_tittle</th>
                            <th scope="col">Protfolio_description</th>
                            <th scope="col">Protfolio_image</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($protfolios as $protfolio)
                            <tr>
                                <th scope="row">{{ $protfolios->firstItem() + $loop->index }}</th>
                                <td>{{ $protfolio->protfolio_name }}</td>
                                <td>{{ $protfolio->protfolio_tittle }}</td>
                                <td>{{ $protfolio->protfolio_description }}</td>

                                <td><img src="{{ asset('protfolio/' . $protfolio->protfolio_image) }}" alt="img"
                                        width="80" height="80" /></td>
                                <td><a href="{{ route('edit.protfolio', $protfolio->id ) }}" class="btn btn-info sm">Edit</a>
                                    <a href="{{route('delete.protfolio', $protfolio->id ) }}" class="btn btn-danger sm"
                                        id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $protfolios->links() }}

        </div>
    </div>
@endsection
