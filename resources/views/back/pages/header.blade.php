@extends('back.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Header Ayarları</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Ana səhifə</a></li>
                                <li class="breadcrumb-item active">Header Ayarları</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card border-0 shadow-lg rounded">
                        <div class="card-body">
                            <h4 class="card-title text-center">Header Ayarları</h4>
                            <ul class="nav nav-pills nav-justified mb-4" role="tablist">
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
                            <form class="needs-validation" method="POST" enctype="multipart/form-data" action="{{ route('admin.header.update') }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="tab-content p-3 text-muted">
                                        <div class="tab-pane active" id="az">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="homepage_title_az" class="text-success ">Ana Səhifə Başlığı (Az)</label>
                                                    <input type="text" name="homepage_title_az" class="form-control" value="{{ $header?->homepage_title_az }}">
                                                    @error('homepage_title_az')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="about_title_az" class="text-success ">Haqqımızda Başlığı (Az)</label>
                                                    <input type="text" name="about_title_az" class="form-control" value="{{ $header?->about_title_az }}">
                                                    @error('about_title_az')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="services_title_az" class="text-success ">Xidmətlər Başlığı (Az)</label>
                                                    <input type="text" name="services_title_az" class="form-control" value="{{ $header?->services_title_az }}">
                                                    @error('services_title_az')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="blog_title_az" class="text-success ">Blog Başlığı (Az)</label>
                                                    <input type="text" name="blog_title_az" class="form-control" value="{{ $header?->blog_title_az }}">
                                                    @error('blog_title_az')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="testimonials_title_az" class="text-success ">Müştəri Rəyleri Başlığı (Az)</label>
                                                    <input type="text" name="testimonials_title_az" class="form-control" value="{{ $header?->testimonials_title_az }}">
                                                    @error('testimonials_title_az')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="experience_title_az" class="text-success ">Təcrübə Başlığı (Az)</label>
                                                    <input type="text" name="experience_title_az" class="form-control" value="{{ $header?->experience_title_az }}">
                                                    @error('experience_title_az')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="contact_title_az" class="text-success ">Əlaqə Başlığı (Az)</label>
                                                    <input type="text" name="contact_title_az" class="form-control" value="{{ $header?->contact_title_az }}">
                                                    @error('contact_title_az')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="en">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="homepage_title_en" class="text-success ">Homepage Title (En)</label>
                                                    <input type="text" name="homepage_title_en" class="form-control" value="{{ $header?->homepage_title_en }}">
                                                    @error('homepage_title_en')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="about_title_en" class="text-success ">About Title (En)</label>
                                                    <input type="text" name="about_title_en" class="form-control" value="{{ $header?->about_title_en }}">
                                                    @error('about_title_en')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="services_title_en" class="text-success ">Services Title (En)</label>
                                                    <input type="text" name="services_title_en" class="form-control" value="{{ $header?->services_title_en }}">
                                                    @error('services_title_en')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="blog_title_en" class="text-success ">Blog Title (En)</label>
                                                    <input type="text" name="blog_title_en" class="form-control" value="{{ $header?->blog_title_en }}">
                                                    @error('blog_title_en')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="testimonials_title_en" class="text-success ">Testimonials Title (En)</label>
                                                    <input type="text" name="testimonials_title_en" class="form-control" value="{{ $header?->testimonials_title_en }}">
                                                    @error('testimonials_title_en')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="experience_title_en" class="text-success ">Experience Title (En)</label>
                                                    <input type="text" name="experience_title_en" class="form-control" value="{{ $header?->experience_title_en }}">
                                                    @error('experience_title_en')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="contact_title_en" class="text-success ">Contact Title (En)</label>
                                                    <input type="text" name="contact_title_en" class="form-control" value="{{ $header?->contact_title_en }}">
                                                    @error('contact_title_en')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ru">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="homepage_title_ru" class="text-success ">Заголовок главной страницы (Ru)</label>
                                                    <input type="text" name="homepage_title_ru" class="form-control" value="{{ $header?->homepage_title_ru }}">
                                                    @error('homepage_title_ru')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="about_title_ru" class="text-success ">Заголовок о нас (Ru)</label>
                                                    <input type="text" name="about_title_ru" class="form-control" value="{{ $header?->about_title_ru }}">
                                                    @error('about_title_ru')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="services_title_ru" class="text-success ">Заголовок услуг (Ru)</label>
                                                    <input type="text" name="services_title_ru" class="form-control" value="{{ $header?->services_title_ru }}">
                                                    @error('services_title_ru')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="blog_title_ru" class="text-success ">Заголовок блога (Ru)</label>
                                                    <input type="text" name="blog_title_ru" class="form-control" value="{{ $header?->blog_title_ru }}">
                                                    @error('blog_title_ru')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="testimonials_title_ru" class="text-success ">Заголовок отзывов (Ru)</label>
                                                    <input type="text" name="testimonials_title_ru" class="form-control" value="{{ $header?->testimonials_title_ru }}">
                                                    @error('testimonials_title_ru')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="experience_title_ru" class="text-success ">Заголовок опыта (Ru)</label>
                                                    <input type="text" name="experience_title_ru" class="form-control" value="{{ $header?->experience_title_ru }}">
                                                    @error('experience_title_ru')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                        <label for="contact_title_ru" class="text-success ">Заголовок контактов (Ru)</label>
                                                    <input type="text" name="contact_title_ru" class="form-control" value="{{ $header?->contact_title_ru }}">
                                                    @error('contact_title_ru')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                                <label for="logo" class="text-success ">Logo</label>
                                            <input type="file" name="logo" class="form-control" accept="image/*">
                                            <div class="upload-container mt-3 row">
                                                @if ($header && $header->logo)
                                                    <div class="mb-3 col-sm-6 col-md-3">
                                                        <div class="upload-image">
                                                            <img src="{{ asset('uploads/' . $header->logo) }}" alt="Logo" class="img-fluid rounded">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            @error('logo')
                                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-3 text-center">
                                    <button class="btn btn-success btn-lg" type="submit">Yadda Saxla</button>
                                </div>
                            </form>

                            <!-- Hata ve başarı mesajlarını göster -->
                            @if(session('success'))
                                <div class="alert alert-success text-center">{{ session('success') }}</div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger text-center">{{ session('error') }}</div>
                            @endif
                        </div>
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link href="{{ asset('back/assets') }}/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <style>
        body {
            background-color: #e9ecef;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border-radius: 15px;
            overflow: hidden;
            border: none;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }
        .nav-pills .nav-link {
            border-radius: 20px;
            transition: background-color 0.3s, color 0.3s;
            font-weight: bold;
            padding: 10px 20px;
            background-color: #f8f9fa;
            color: #495057;
        }
        .nav-pills .nav-link.active {
            background-color: #007bff;
            color: white;
        }
        .nav-pills .nav-link:hover {
            background-color: #0056b3;
            color: white;
        }
        .form-label {
            font-weight: bold;
            color: #333;
        }
        .upload-image img {
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 5px;
            background-color: #f8f9fa;
            transition: transform 0.3s;
        }
        .upload-image img:hover {
            transform: scale(1.05);
        }
        .btn-success {
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            padding: 12px 25px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .alert {
            border-radius: 5px;
            margin-top: 20px;
            font-size: 16px;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{ asset('back/assets') }}/libs/select2/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".summernote").summernote();
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->
    <script src="{{ asset('back/assets/js/pages/file-upload.js') }}"></script>
    <script>
        $('select').select2();
    </script>
@endpush