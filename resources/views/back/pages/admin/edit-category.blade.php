@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
  <div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                <h4 class="h4" style="color: #0056b3;">Edit Category</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ route('admin.manage-categories.cats-subcats-list') }}" class="btn btn-sm" type="button" style="background-color: #0056b3; color: white;">
                                <i class="ion-arrow-left-a"></i> Back to categories list
                            </a>
                </div>
            </div>
            <hr>
            <form action="{{ route('admin.manage-categories.update-category', $category->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
                <input type="hidden" name="category_id" value="{{ Request('id') }}">
                @csrf
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        <strong><i class="dw dw-checked"></i></strong>
                        {!! Session::get('success') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::get('fail'))
                <div class="alert alert-danger">
                    <strong><i class="dw dw-checked"></i></strong>
                    {!! Session::get('fail') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Category name</label>
                            <input type="text" class="form-control" name="category_name" placeholder="Enter category name" value="{{ $category->category_name }}">
                            @error('category_name')
                                <span class="text-danger ml-2">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Category image</label>
                            <input type="file" name="category_image" class="form-control">
                            @error('category_image')
                                <span class="text-danger ml-2">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="avatar mb-3">
                            <div style="width: 150px; height: 150px; overflow: hidden; border: 2px solid #ddd;">
                                <!-- Set the default src to the existing image or a placeholder -->
                                <img src="/images/categories/{{ $category->category_image }}" alt="Category Image" id="category_image_preview" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="background-color: #0056b3; color: white;">SAVE CHANGES</button>
            </form>
        </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.querySelector('input[type="file"][name="category_image"]');
    const imagePreview = document.getElementById('category_image_preview');

    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];

        if (file && file.type.startsWith('image/')) {
            const url = URL.createObjectURL(file);
            imagePreview.src = url;
            imagePreview.style.display = 'block'; // Show the new preview image
        } else {
            alert('Please select a valid image file.');
        }
    });

    // If the image preview source is empty, hide the preview by default
    if (!imagePreview.src || imagePreview.src.endsWith('/images/categories/')) {
        imagePreview.style.display = 'none';
    } else {
        imagePreview.style.display = 'block'; // Show the existing image
    }
});
</script>
@endpush
