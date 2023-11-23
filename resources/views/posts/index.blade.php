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
            <h4>Post Data</h4>
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
                                    placeholder="Search Post..." style="width: 300px;">
                            </div>
                              <div class="col-auto">
                                  <button class="btn btn-success m-3" data-bs-toggle="modal"
                                      data-bs-target="#ModalAdd">Add Post</button>
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
                                        <th>Creator</th>
                                        <th>Category</th>
                                        <th>Post Title</th>
                                        {{-- <th>Post Content</th> --}}
                                        {{-- <th>Slug</th> --}}
                                        {{-- <th>Post Picture</th> --}}
                                        <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($post as $postItem)

                                      <tr>
                                        <input type="hidden" class="delete_id" value="{{ $postItem->id}}">
                                          <td>{{ $loop->index+1}}</td>
                                          <td>{{ $postItem->id}}</td>
                                          <td>{{ $postItem->creator}}</td>
                                          <td>{{ $postItem->Category->category_name}}</td>
                                          <td>{{ $postItem->post_title}}</td>
                                          {{-- <td>{{ $postItem->post_content}}</td> --}}
                                          {{-- <td>{{ $postItem->slug}}</td> --}}
                                          {{-- <td>{{ $postItem->post_picture}}</td> --}}
                                          <td>
                                            
                                              <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ViewModal{{$postItem->id}}">View</button>
                                              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalEdita-{{$postItem->id}}">Edit</button>
                                                  <form action="/dashboard/post/{{ $postItem->slug }}" method="POST" class="d-inline">
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
<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data" id="addUserForm">
  @csrf

<div id="ModalAdd" class="modal fade" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
       
          <div class="modal-header">
              <h5 class="modal-title">New Post</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
         
          <div class="modal-body">
                  <div class="mb-6">
                    <label for="creator" class="form-label">Creator</label>
                    <input name="creator" type="text" class="form-control" id="creator" required>
                  </div>
                  <div class="mb-6 mt-3">
                    <label class="form-label">Category Name</label>
                    <div class="mb-6">
                      <select for="category" required id="category" name="category_id" class="form-control selectric">
                        <option value="" selected disabled>Choose Category</option>
                        @foreach ($category as $data)
                            <option value="{{ $data->id }}">{{ $data->category_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                    <div class="mb-6 mt-3">
                      <label for="post_title" class="form-label">Post Title</label>
                      <input name="post_title" type="text" class="form-control post-title" id="post_title" required>
                    </div>
                    <div class="mb-6 mt-3">
                      <label for="slug" class="form-label">Slug</label>
                      <input name="slug" type="text" class="form-control slug" id="slug">
                    </div>

                    <div class=" mt-3">
                    <label for="post_content" class="form-label">Post Content</label>
                      
                        <div>
                          
                          <input id="post_content" type="hidden" name="post_content" required>
                          <trix-editor input="post_content"></trix-editor>
                         
                        </div>
                       
                    </div>
                
                    {{-- <div class="mb-6 mt-3">
                      <label class="form-label"> Post Picture</label>
                      <input name="post_picture" class="form-control" type="file" id="post_picture" required>
                    </div> --}}

                    <div class="mb-6 mt-3">
                      <label class="form-label"> Post Picture</label>
                      <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                      <input name="post_picture" class="form-control" type="file" id="post_picture" onchange="previewImage()" required>
                      
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
@foreach ($post as $postItem)

@php
  $picture = str_replace('public', 'storage', $postItem->post_picture);
  @endphp

<div id="ViewModal{{$postItem->id}}" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Post Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Post ID: {{ $postItem->id }}</label> 
                </div>
                <div class="mb-3">
                    <label class="form-label">Creator: {{ $postItem->creator }}</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category: {{ $postItem->Category->category_name }}</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Post Title: {{ $postItem->post_title }}</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Post Content: {!! $postItem->post_content !!}</label>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Slug: {{ $postItem->slug }}</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Post Picture:</label>
                     <img src="{{ asset($picture) }}" alt="Post Picture" style="max-width: 100%;" class="img-fluid mb-3 col-sm-5 d-block">
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
@foreach ($post as $postItemat)
  @php
  $pictureat = str_replace('public', 'storage', $postItemat->post_picture);
  @endphp

<form action="{{route('post.update', $postItemat->slug)}}" method="post" enctype="multipart/form-data" id="addUserForm">
    @csrf
    @method('put')
  <div id="ModalEdita-{{$postItemat->id}}" class="modal fade" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
         
            <div class="modal-header">
                <h5 class="modal-title">Edit Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           
            <div class="modal-body">
                    <div class="mb-6">
                      <label for="creator" class="form-label">Creator</label>
                      <input name="creator" type="text" class="form-control" id="creator" value="{{$postItemat->creator}}" required>
                    </div>
                    <div class="mb-6 mt-3">
                      <label class="form-label">Category Name</label>
                      <div class="mb-6">
                        <select for="category" required id="category" name="category_id" class="form-control selectric">
                          <option value="" selected disabled>Choose Category</option>

                          @foreach ($category as $categoryItem) 
                            @if ($postItemat->category_id == $categoryItem->id)
                                <option value="{{ $categoryItem->id }}" selected>{{ $categoryItem->category_name}}</option>
                                @else
                                <option value="{{ $categoryItem->id }}">{{ $categoryItem->category_name}}</option>
                            @endif
                          @endforeach

                        </select>
                      </div>
                    </div>
                      <div class="mb-6 mt-3">
                        <label for="post_title" class="form-label">Post Title</label>
                        <input name="post_title" type="text" class="form-control post-title" id="post_title" value="{{old('post_title', $postItemat->post_title)}}" required>
                      </div>
                      <div class="mb-6 mt-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input name="slug" type="text" class="form-control slug" id="slug" value="{{old('slug', $postItemat->slug)}}">
                      </div>
  
                      <div class="mt-3">
                        <label for="post_content" class="form-label">Post Content</label>
                        <div>
                            <input id="post_content_{{$postItemat->slug}}" type="hidden" name="post_content" value="{{ old('post_content', $postItemat->post_content) }}">
                            <trix-editor input="post_content_{{$postItemat->slug}}"></trix-editor>
                        </div>
                    </div>
                  
                  
                      <div class="mb-6 mt-3">
                        <label class="form-label"> Post Picture</label>
                        <input type="hidden" name="oldImage" value="{{ $postItemat->post_picture }}">

                      @if($postItemat->post_picture)
                      <img src="{{ asset($pictureat)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                      @else
                      <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                      @endif
                       
                        <input name="post_picture" class="form-control" type="file" id="post_picture" onchange="previewImage()">
                        
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


  // const post_title = document.querySelector('#post_title');
  // const slug =  document.querySelector('#slug');
  // post_title.addEventListener('change', function(){
  //   fetch('/dashboard/post/autoSlug?post_title=' + post_title.value)
  //   .then(response => response.json())
  //   .then(data => slug.value = data.slug)
  // }); 

//   document.body.addEventListener('change', function (event) {
//     if (event.target.classList.contains('post-title')) {
//         const post_title = event.target;
//         const slug = post_title.closest('.modal').querySelector('.slug');

//         fetch('/dashboard/post/autoSlug?post_title=' + post_title.value)
//             .then(response => response.json())
//             .then(data => {
//                 slug.value = data.slug;
//             });
//     }
// });

document.body.addEventListener('change', function (event) {
    if (event.target.classList.contains('post-title')) {
        const post_title = event.target;
        const slug = post_title.closest('.modal').querySelector('.slug');

        // Check if the slug input is not readonly before making the fetch request
        if (!slug.readOnly) {
            fetch('/dashboard/post/autoSlug?post_title=' + encodeURIComponent(post_title.value))
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
    const image = document.querySelector('#post_picture');
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

