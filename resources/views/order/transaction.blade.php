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
            <h4>Transaction Data</h4>
        </div>
      </div>
  <section class="section">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title">Transaction</h5>
                          <div class="row justify-content-end">
                            <div class="col mt-3">
                                <input type="text" class="form-control" id="searchInput"
                                    placeholder="Search Transaction..." style="width: 300px;">
                            </div>
                              {{-- <div class="col-auto">
                                  <button class="btn btn-success m-3" data-bs-toggle="modal"
                                      data-bs-target="#ModalAdd">Add Post</button>
                              </div> --}}
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
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Package Name</th>
                                        <th>Qty</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($order as $orderItem)

                                      <tr>
                                          <td>{{ $loop->index+1}}</td>
                                          <td>{{ $orderItem->id}}</td>
                                          <td>{{ $orderItem->name}}</td>
                                          <td>{{ $orderItem->phone}}</td>
                                          <td>{{ $orderItem->email}}</td>
                                          <td>{{ $orderItem->package_name}}</td>
                                          <td>{{ $orderItem->qty}}</td>
                                          <td>IDR {{ $orderItem->total_price}}</td>
                                          <td>{{ $orderItem->status}}</td>
                                          <td>{{ Carbon\Carbon::parse($orderItem->created_at)->isoFormat('D MMMM Y') }}</td>
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

</main>

@endsection

