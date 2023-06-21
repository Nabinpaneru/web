@extends('admin.admin_master')
@section('admin')

<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
          <div class="col-lg-6">
            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
            <strong>{{Session::get('message')}}</strong>
            </div> 
            @endif 

             <div class="card"><br><br>
                  <center>
                     <img class="card-img-top img-fluid rounded-circle avatar-xl"  width="20" height="20" src="{{ asset('images/'.$admin->image) }}" alt="">
                   </center>
                   <div class="card-body pr-3 "> 
                     
                      
                        <h4 class="card-title ">Admin Details</h4>
                        <hr>
             
                        <h4 class="card-title ">Name : {{ $admin->name}}</h4>
                        <hr>
                        <h4 class="card-title ">Email :{{ $admin->email}} </h4>
                        <hr>
                        <h4 class="card-title ">Created_at : {{ $admin->created_at}}</h4>

                        <br>
                         <a href="{{route('admin.edit')}}" class="btn btn-info" >Edit Profile </a>
                </div>

              </div>
         </div>
        
     </div>   
    </div>
</div> 
</div>    

@endsection 