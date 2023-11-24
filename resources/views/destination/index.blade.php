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
            <h4>Destination Data</h4>
        </div>
      </div>
  <section class="section">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title">Post</h5>
                          <div class="row justify-content-end">
                            <div class="col mt-3">
                                <input type="text" class="form-control" id="searchInput"
                                    placeholder="Search Destination..." style="width: 300px;">
                            </div>
                              <div class="col-auto">
                                  <button class="btn btn-success m-3" data-bs-toggle="modal"
                                      data-bs-target="#ModalAdd">Add Package</button>
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
                                        <th>Package Name</th>
                                        <th>Category</th>
                                        <th>Package Price</th>
                                        <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($package as $packageItem)

                                      <tr>
                                        <input type="hidden" class="delete_id" value="{{ $packageItem->id}}">
                                          <td>{{ $loop->index+1}}</td>
                                          <td>{{ $packageItem->id}}</td>
                                          <td>{{ $packageItem->package_name}}</td>
                                          <td>{{ $packageItem->Categoryd->category_name}}</td>
                                          <td>{{ $packageItem->package_price}}</td>
                                          <td>
                                            
                                              <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ViewModal{{$packageItem->id}}">View</button>
                                              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalEdita-{{$packageItem->id}}">Edit</button>
                                                  <form action="/dashboard/destination/{{ $packageItem->slug }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger show_confirm" data-bs-toggle="modal" id="delete">Delete</button>
                                            </form>
                                          </td>
                                      </tr>
                                      @endforeach
                                    
                                      <!-- Add other rows as needed -->
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
{{-- Add --}}
<form action="{{route('destination.store')}}" method="post" enctype="multipart/form-data" id="addUserForm">
  @csrf

<div id="ModalAdd" class="modal fade" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
       
          <div class="modal-header">
              <h5 class="modal-title">New Package</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
         
          <div class="modal-body">
                  <div class="mb-6">
                    <label for="package_name" class="form-label">Package Name</label>
                    <input name="package_name" type="text" class="form-control package-name" id="package_name" required>
                  </div>
                  <div class="mb-6 mt-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input name="slug" type="text" class="form-control slug" id="slug">
                  </div>
                  <div class="mb-6 mt-3">
                    <label class="form-label">Category Name</label>
                    <div class="mb-6">
                      <select for="categoryd" required id="categoryd" name="category_d_id" class="form-control selectric">
                        <option value="" selected disabled>Choose Category</option>
                        @foreach ($categoryd as $data)
                            <option value="{{ $data->id }}">{{ $data->category_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                    <div class="mb-6 mt-3">
                      <label for="package_price" class="form-label">Package Price</label>
                      <input name="package_price" type="text" class="form-control" id="package_price" placeholder="ex : 100000 = 100 " required>
                      <div id="priceHelp" class="form-text">Remove the last three "0" in the price.</div>
                    </div>
                    <div class="mb-6 mt-3">
                      <label for="time" class="form-label">Time</label>
                      <input name="time" type="text" class="form-control" id="time" placeholder="1 Day 1 Night" required>
                    </div>
                    <div class=" mt-3">
                    <label for="package_content" class="form-label">Package Content</label>
                        <div>
                          <input id="package_content" type="hidden" name="package_content" required>
                          <trix-editor input="package_content"></trix-editor>
                        </div>
                    </div>

                    <div class="mb-6 mt-3">
                      <label class="form-label"> Package Picture</label>
                      <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                      <input name="package_picture" class="form-control" type="file" id="package_picture" onchange="previewImage()" required>
                      
                    </div>
                 
            </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
      </div>
  </div>
</div>



{{-- View --}}
@foreach ($package as $packageItem)

  @php
  $picture = str_replace('public', 'storage', $packageItem->package_picture);
  @endphp

<div id="ViewModal{{$packageItem->id}}" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Package Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Package ID: {{ $packageItem->id }}</label> 
                </div>
                <div class="mb-3">
                    <label class="form-label">Package Name: {{ $packageItem->package_name }}</label>
                </div>
                <div class="mb-3">
                  <label class="form-label">Slug: {{ $packageItem->slug }}</label>
              </div>
                <div class="mb-3">
                    <label class="form-label">Category: {{ $packageItem->Categoryd->category_name }}</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Package Price: {{ $packageItem->package_price }}</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Time: {{ $packageItem->time }}</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Package Content: {!! $packageItem->package_content !!}</label>
                  </div>
                <div class="mb-3">
                    <label class="form-label">Package Picture:</label>
                     <img src="{{ asset($picture) }}" alt="Package Picture" style="max-width: 100%;" class="img-fluid mb-3 col-sm-5 d-block">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
  </div>
@endforeach

{{-- Edit --}}
@foreach ($package as $packageItem)
  @php
  $pictureat = str_replace('public', 'storage', $packageItem->package_picture);
  @endphp

<form action="{{route('destination.update', $packageItem->slug)}}" method="post" enctype="multipart/form-data" id="addUserForm">
    @csrf
    @method('put')
  <div id="ModalEdita-{{$packageItem->id}}" class="modal fade" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
         
            <div class="modal-header">
                <h5 class="modal-title">Edit Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           
            <div class="modal-body">
                    <div class="mb-6">
                      <label for="package_name" class="form-label">Package Name</label>
                      <input name="package_name" type="text" class="form-control package-name" id="package_name" value="{{$packageItem->package_name}}" required>
                    </div>
                    <div class="mb-6 mt-3">
                      <label for="slug" class="form-label">Slug</label>
                      <input name="slug" type="text" class="form-control slug" id="slug" value="{{old('slug', $packageItem->slug)}}">
                    </div>
                    <div class="mb-6 mt-3">
                      <label class="form-label">Category Name</label>
                      <div class="mb-6">
                        <select for="categoryd" required id="categoryd" name="category_d_id" class="form-control selectric">
                          <option value="" selected disabled>Choose Category</option>

                          @foreach ($categoryd as $categoryItem) 
                            @if ($packageItem->category_d_id == $categoryItem->id)
                                <option value="{{ $categoryItem->id }}" selected>{{ $categoryItem->category_name}}</option>
                                @else
                                <option value="{{ $categoryItem->id }}">{{ $categoryItem->category_name}}</option>
                            @endif
                          @endforeach

                        </select>
                      </div>
                    </div>
                      <div class="mb-6 mt-3">
                        <label for="package_price" class="form-label">Package Price</label>
                        <input name="package_price" type="text" class="form-control" id="package_price" value="{{old('package_price', $packageItem->package_price)}}" required>
                      </div>
                      <div class="mb-6 mt-3">
                        <label for="time" class="form-label">Time</label>
                        <input name="time" type="text" class="form-control" id="time" required>
                      </div>
                      <div class="mt-3">
                        <label for="package_content" class="form-label">Post Content</label>
                        <div>
                            <input id="package_content_{{$packageItem->slug}}" type="hidden" name="package_content" value="{{ old('package_content', $packageItem->package_content) }}">
                            <trix-editor input="package_content_{{$packageItem->slug}}"></trix-editor>
                        </div>
                    </div>
                  
                  
                      <div class="mb-6 mt-3">
                        <label class="form-label"> Package Picture</label>
                        <input type="hidden" name="oldImage" value="{{ $packageItem->package_picture }}">

                      @if($packageItem->package_picture)
                      <img src="{{ asset($pictureat)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                      @else
                      <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                      @endif
                       
                        <input name="package_picture" class="form-control" type="file" id="package_picture" onchange="previewImage()">
                        
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


<script>
document.body.addEventListener('change', function (event) {
    if (event.target.classList.contains('package-name')) {
        const package_name = event.target;
        const slug = package_name.closest('.modal').querySelector('.slug');

        // Check if the slug input is not readonly before making the fetch request
        if (!slug.readOnly) {
            fetch('/dashboard/destination/autoSlug?package_name=' + encodeURIComponent(package_name.value))
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    slug.value = data.slug;
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                });
        }
    }
});




  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })

  function previewImage(){
    const image = document.querySelector('#package_picture');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    // Pemeriksaan apakah yang diunggah adalah file gambar
    if (image.files && image.files[0]) {
        const reader = new FileReader();

        // Pemeriksaan tipe file
        if (/\.(jpe?g|png)$/i.test(image.files[0].name)) {
            reader.readAsDataURL(image.files[0]);

            reader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        } else {
          Swal.fire({
                icon: 'warning',
                title: 'Format File Salah',
                text: 'File harus berupa gambar dengan format JPG, JPEG, PNG, atau GIF.',
            });
            image.value = '';
        }
    }
  }

</script>  

</main>

@endsection

