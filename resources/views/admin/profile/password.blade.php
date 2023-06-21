@extends('admin.admin_master')
@section('admin')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        @if (Session::has('message'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ Session::get('message') }}</strong>
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ Session::get('error') }}</strong>
                            </div>
                        @endif



                        <form action="{{ route('admin.update_password') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Recent Password</label>
                                <input type="password" class="form-control" id="old_password" name="password">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror


                            </div><br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">New Password</label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
                                @error('new_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror


                            </div><br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                @error('confirm_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div><br>



                            <button type="submit" class="btn btn-info">Update Password</button>


                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection
