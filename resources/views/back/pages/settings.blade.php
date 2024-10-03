@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Settings')
@section('content')
   
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Settings</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Settings
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-4">
    @livewire('admin-settings')
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to handle image preview and Viewer.js initialization
        function handleImagePreview(inputSelector, previewSelector, viewerOptions = {}) {
            $(inputSelector).on('change', function(event) {
                var file = event.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var preview = $(previewSelector)[0];
                        preview.src = e.target.result;

                        // Initialize Viewer.js on the preview image
                        if (window.Viewer) {
                            new Viewer(preview, Object.assign({
                                inline: true,
                                viewed() {}
                            }, viewerOptions));
                        } else {
                            console.error('Viewer.js is not loaded');
                        }
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('Invalid file type. Only images are allowed.');
                }
            });
        }

        // Handle image preview for site logo and favicon
        handleImagePreview('input[type="file"][name="site_logo"][id="site_logo"]', '#site_logo_image_preview');
        handleImagePreview('input[type="file"][name="site_favicon"][id="site_favicon"]', '#site_favicon_image_preview');

        // Function to handle form submission via AJAX
        function handleFormSubmission(formSelector, previewSelector) {
            $(formSelector).on('submit', function(e) {
                e.preventDefault();
                var form = this;
                var formData = new FormData(form);
                var inputFileVal = $(form).find('input[type="file"]').val();

                if (inputFileVal.length > 0) {
                    $.ajax({
                        url: $(form).attr('action'),
                        method: $(form).attr('method'),
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        beforeSend: function() {
                            toastr.remove();
                            $(form).find('span.error-text').text('');
                        },
                        success: function(response) {
                            if (response.status === 1) {
                                toastr.success(response.msg);
                                $(form)[0].reset();
                                $(previewSelector).attr('src', ''); // Clear the preview after reset
                            } else {
                                toastr.error(response.msg);
                            }
                        }
                    });
                } else {
                    $(form).find('span.error-text').text('Please, select an image file. PNG file type is recommended.');
                }
            });
        }

        // Handle form submission for site logo and favicon
        handleFormSubmission('#change_site_logo_form', '#site_logo_image_preview');
        handleFormSubmission('#change_site_favicon_form', '#site_favicon_image_preview');
    });
</script>
@endpush


