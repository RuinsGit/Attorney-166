@extends('back.layouts.master')

@section('title', __('Yeni Blog'))

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ __('Yeni Blog') }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Ana səhifə') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}">{{ __('Bloglar') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('Yeni') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#az" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">AZ</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#en" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">EN</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#ru" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">RU</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <!-- Az tab -->
                                    <div class="tab-pane active" id="az" role="tabpanel">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Başlıq') }}</label>
                                            <input type="text" name="title_az" class="form-control @error('title_az') is-invalid @enderror" value="{{ old('title_az') }}">
                                            @error('title_az')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Mətn') }}</label>
                                            <textarea name="description_az" class="form-control summernote">{{ old('description_az') }}</textarea>
                                            @error('description_az')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Ekstra Mətn') }}</label>
                                            <textarea name="text_az" class="form-control @error('text_az') is-invalid @enderror">{{ old('text_az') }}</textarea>
                                            @error('text_az')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- En tab -->
                                    <div class="tab-pane" id="en" role="tabpanel">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Title') }}</label>
                                            <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en') }}">
                                            @error('title_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Description') }}</label>
                                            <textarea name="description_en" class="form-control summernote">{{ old('description_en') }}</textarea>
                                            @error('description_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Extra Text') }}</label>
                                            <textarea name="text_en" class="form-control @error('text_en') is-invalid @enderror">{{ old('text_en') }}</textarea>
                                            @error('text_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Ru tab -->
                                    <div class="tab-pane" id="ru" role="tabpanel">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Заголовок') }}</label>
                                            <input type="text" name="title_ru" class="form-control @error('title_ru') is-invalid @enderror" value="{{ old('title_ru') }}">
                                            @error('title_ru')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Текст') }}</label>
                                            <textarea name="description_ru" class="form-control summernote">{{ old('description_ru') }}</textarea>
                                            @error('description_ru')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Экстра Текст') }}</label>
                                            <textarea name="text_ru" class="form-control @error('text_ru') is-invalid @enderror">{{ old('text_ru') }}</textarea>
                                            @error('text_ru')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Blog Türü') }}</label>
                                    <select name="blog_type_id" class="form-control @error('blog_type_id') is-invalid @enderror">
                                        <option value="">{{ __('Seçin') }}</option>
                                        @foreach($blogTypes as $blogType)
                                            <option value="{{ $blogType->id }}">{{ $blogType->text }}</option>
                                        @endforeach
                                    </select>
                                    @error('blog_type_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Üst Şəkil') }}</label>
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Alt Şəkil') }}</label>
                                        <input type="file" name="bottom_image" class="form-control @error('bottom_image') is-invalid @enderror">
                                        @error('bottom_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Populyar Blog') }}</label>
                                    <select name="is_popular" class="form-control @error('is_popular') is-invalid @enderror">
                                        <option value="0">{{ __('Yox') }}</option>
                                        <option value="1">{{ __('Hə') }}</option>
                                    </select>
                                    @error('is_popular')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">{{ __('Yadda saxla') }}</button>
                                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">{{ __('Ləğv et') }}</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $(".summernote").summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true,                 // set focus to editable area after initializing summernote
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endpush
