@extends('includes.master')
@section('content')
<style>
    .btn-info {
    --bs-btn-color: #fff; 
    }
    .btn-info:hover {
    --bs-btn-color: #fff;
    }
</style>
<main id="main" class="main">
    <div class="section">
        <div class="section-header">
            <h4>User Data</h4>
        </div>
      </div>
  <section class="section">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title">User Account</h5>
                          <div class="row justify-content-end">
                            <div class="col mt-3">
                                <input type="text" class="form-control" id="searchInput"
                                    placeholder="Search Account..." style="width: 300px;">
                            </div>
                              <div class="col-auto">
                                 
                              </div>
                          </div>
                          <!-- Table -->
                          <div class="table-responsive">
                              
                              <!-- Table -->
                              <table class="table" id="data">
                                  <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($users as $userItem)

                                      <tr>
                                        <input type="hidden" class="delete_id" value="{{ $userItem->id}}">
                                          <td>{{ $loop->index+1}}</td>
                                          <td>{{ $userItem->id}}</td>
                                          <td>{{ $userItem->name}}</td>
                                          <td>{{ $userItem->email}}</td>
                                          <td>{{ $userItem->phone}}</td>
                                          <td>
                                            
                                              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalEdita-{{$userItem->id}}">Edit</button>
                                                  <form action="/dashboard/user/{{ $userItem->id }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger show_confirm" data-bs-toggle="modal" id="delete">Delete</button>
                                            </form>
                                          </td>
                                      </tr>
                                      @endforeach
                                  
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

{{-- Edit --}}
@foreach ($users as $userItemat)
<form action="{{route('user.update', $userItemat->id)}}" method="post" enctype="multipart/form-data" id="addUserForm">
    @csrf
    @method('put')
  <div id="ModalEdita-{{$userItemat->id}}" class="modal fade" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
         
            <div class="modal-header">
                <h5 class="modal-title">Edit Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           
            <div class="modal-body">
                    <div class="mb-6">
                      <label for="name" class="form-label">Name</label>
                      <input name="name" type="text" class="form-control" id="name" value="{{$userItemat->name}}" required>
                    </div>
                      <div class="mb-6 mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="text" class="form-control" id="email" value="{{old('email', $userItemat->email)}}" required>
                      </div>
                      <div class="mb-6 mt-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input name="phone" type="text" class="form-control" id="phone" value="{{old('phone', $userItemat->phone)}}">
                      </div>
                      <div class="mb-6 mt-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                      </div>
                              
                      
                   
              </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
          </form>
        </div>
    </div>
  </div>
@endforeach

</main>

@endsection

