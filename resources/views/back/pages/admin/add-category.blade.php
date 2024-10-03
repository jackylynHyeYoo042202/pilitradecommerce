@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="h4" style="color: #0056b3;">Add Category</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.manage-categories.cats-subcats-list') }}" class="btn btn-sm" type="button" style="background-color: #0056b3; color: white;">
                            <i class="ion-arrow-left-a"></i> Back to categories list
                        </a>
                    </div>
                </div>
                <hr>
                <form action="{{ route('admin.manage-categories.store-category') }}" method="POST" enctype="multipart/form-data" class="mt-3">
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
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" name="category_name" placeholder="Enter category name" value="{{ old('category_name') }}">
                                @error('category_name')
                                    <span class="text-danger ml-2">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="category_image">Category Image</label>
                                <input type="file" name="category_image" id="category_image_input" class="form-control">
                                @error('category_image')
                                    <span class="text-danger ml-2">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                <div class="avatar mb-3">
                        <img src="" alt="" data-ijabo-default-img="" width="150" height="150" id="category_image_preview" style="display: none;">
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #0056b3; color: white;">CREATE</button>
                    </div>
                </div>
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
            imagePreview.style.display = 'block'; // Show the preview image
        } else {
            alert('Please select a valid image file.');
            imagePreview.style.display = 'none'; // Hide the preview if invalid
        }
    });
});
</script>
@endpush

