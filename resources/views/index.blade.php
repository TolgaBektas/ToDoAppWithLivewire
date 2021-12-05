@extends('layouts.auth')
@section('title')
To DO's
@endsection
@section('css')
<style>
.center {
  padding: 17vh 0;
}
body{
  background-color: darkslategray;
}
</style>
@endsection
@section('content') 
<section class="center">
    <div class="container-fluid">
      <div class="row d-flex justify-content-center align-items-center">
       
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{session('status')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
          

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="card-title">To Do's</h1>
                            <div class="card-tools float-end">							
                                <a href="" class="btn bg-success">Add New</a>
                            </div>
                        </div>			
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>To Do</th>
                                <th>is it DONE?</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th colspan="1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="center">
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis illum eveniet itaque debitis aliquid error ducimus nesciunt, assumenda autem quisquam tenetur libero molestiae, cumque eaque voluptas quam velit voluptatem amet.</td>
                                <td> <button type="submit" class="btn btn-success">Yes!</button></td>
                                <td> <td>{{-- {{ \Carbon\Carbon::parse()->format('d-m-Y H:i') }} --}}</td></td>
                                <td>date</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-info">Update</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis illum eveniet itaque debitis aliquid error ducimus nesciunt, assumenda autem quisquam tenetur libero molestiae, cumque eaque voluptas quam velit voluptatem amet. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur delectus dolorum eius ad autem, vitae totam tenetur eos cum dignissimos voluptate est error tempore amet minima qui ducimus explicabo nesciunt?</td>
                                <td> <button type="submit" class="btn btn-success">Yes!</button></td>
                                <td>date</td>
                                <td>date</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-info">Update</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>			
            </div>
        </div>
      </div>
    </div>
</section>
@endsection
@section('js')
@endsection