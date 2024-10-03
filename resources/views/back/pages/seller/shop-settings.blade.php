@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Shop Settings</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('seller.home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Shop Settings
                    </li>
                </ol>
            </nav>
        </div>
      
    </div>
</div>

<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
    <x-alert.form-alert/>
    <form action="{{ route('seller.shop-setup') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for=""><b>Shop name:</b></label>
                <input type="text" class="form-control" name="shop_name" placeholder="Enter your shop name here..." value="{{ old('shop_name') ? old('shop_name') : $shopInfo->shop_name }}">
                @error('shop_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for=""><b>Shop phone:</b></label>
                <input type="text" class="form-control" name="shop_phone" placeholder="eg: +63 912 345 6789" value="{{ old('shop_phone') ? old('shop_phone') : $shopInfo->shop_phone }}">
                @error('shop_phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for=""><b>Shop address:</b></label>
                <input type="text" class="form-control" name="shop_address" placeholder="eg: 1234 Mabini Street, Barangay Malaya, Quezon City" value="{{ old('shop_address') ? old('shop_address') : $shopInfo->shop_address }}">
                @error('shop_address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="form-group">
                <label for=""><b>Shop description:</b></label>
                <textarea class="form-control" name="shop_description" cols="30" rows="10" placeholder="Describe your shop...">{{ old('shop_description') ? old('shop_description') : $shopInfo->shop_description }}</textarea>
                @error('shop_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for=""><b>Shop logo:</b></label>
                <input type="file" name="shop_logo" class="form-control">
                <div class="mb-2 mt-1" style="max-width: 200px">
                    <img src="{{ $shopInfo->shop_logo != null ? '/images/shop/'.$shopInfo->shop_logo : '' }}" alt="" class="img-thumbnail" id="shop_logo_preview">
                </div>
                @error('shop_logo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
</div>
@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.querySelector('input[type="file"][name="shop_logo"]');
    const imagePreview = document.getElementById('shop_logo_preview');

    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        const allowedExtensions = ['image/png', 'image/jpg', 'image/jpeg', 'image/svg+xml'];

        if (file && allowedExtensions.includes(file.type)) {
            // Create a URL for the file and set it to the image preview source
            const url = URL.createObjectURL(file);
            imagePreview.src = url;
            imagePreview.style.display = 'block'; // Show the preview image
        } else {
            // Handle invalid file types or extensions
            alert('Please select a valid image file (PNG, JPG, or SVG).');
            imagePreview.style.display = 'none'; // Hide the preview image if invalid
        }
    });
});
</script>

@endpush