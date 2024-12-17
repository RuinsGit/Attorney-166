@extends('back.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Home Hero Tənzimləmələri</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Ana səhifə</a></li>
                                <li class="breadcrumb-item active">Home Hero Tənzimləmələri</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card border-0 shadow-lg rounded">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-4">Home Hero Tənzimləmələri</h4>

                            <ul class="nav nav-pills nav-justified mb-4" role="tablist">
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#az" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">AZ</span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#en" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">EN</span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#ru" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                        <span class="d-none d-sm-block">RU</span>
                                    </a>
                                </li>
                            </ul>

                            <form class="needs-validation" method="POST" action="{{ route('admin.home-hero.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="az">
                                        <div class="mb-3">
                                            <label for="text_az" class="form-label text-success">Mətn (AZ)</label>
                                            <input type="text" id="text_az" name="text_az" class="form-control" value="{{ $homeHero?->text_az }}">
                                            @error('text_az')
                                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="description_az" class="form-label text-success">Təsvir (AZ)</label>
                                            <textarea id="description_az" name="description_az" class="form-control summernote">{{ $homeHero?->description_az }}</textarea>
                                            @error('description_az')
                                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="text2_az" class="form-label text-success">İkinci Mətn (AZ)</label>
                                            <input type="text" id="text2_az" name="text2_az" class="form-control" value="{{ $homeHero?->text2_az }}">
                                            @error('text2_az')
                                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="number_az" class="form-label text-success">Telefon (AZ)</label>
                                                    <input type="text" id="number_az" name="number_az" class="form-control" value="{{ $homeHero?->number_az }}">
                                                    @error('number_az')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="mail_az" class="form-label text-success">E-poçt (AZ)</label>
                                                    <input type="email" id="mail_az" name="mail_az" class="form-control" value="{{ $homeHero?->mail_az }}">
                                                    @error('mail_az')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="en">
                                        <div class="mb-3">
                                            <label for="text_en" class="form-label text-success">Text (EN)</label>
                                            <input type="text" id="text_en" name="text_en" class="form-control" value="{{ $homeHero?->text_en }}">
                                            @error('text_en')
                                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="description_en" class="form-label text-success">Description (EN)</label>
                                            <textarea id="description_en" name="description_en" class="form-control summernote">{{ $homeHero?->description_en }}</textarea>
                                            @error('description_en')
                                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="text2_en" class="form-label text-success">Second Text (EN)</label>
                                            <input type="text" id="text2_en" name="text2_en" class="form-control" value="{{ $homeHero?->text2_en }}">
                                            @error('text2_en')
                                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="number_en" class="form-label text-success">Phone (EN)</label>
                                                    <input type="text" id="number_en" name="number_en" class="form-control" value="{{ $homeHero?->number_en }}">
                                                    @error('number_en')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="mail_en" class="form-label text-success">E-mail (EN)</label>
                                                    <input type="email" id="mail_en" name="mail_en" class="form-control" value="{{ $homeHero?->mail_en }}">
                                                    @error('mail_en')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="ru">
                                        <div class="mb-3">
                                            <label for="text_ru" class="form-label text-success">Текст (RU)</label>
                                            <input type="text" id="text_ru" name="text_ru" class="form-control" value="{{ $homeHero?->text_ru }}">
                                            @error('text_ru')
                                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="description_ru" class="form-label text-success">Описание (RU)</label>
                                            <textarea id="description_ru" name="description_ru" class="form-control summernote">{{ $homeHero?->description_ru }}</textarea>
                                            @error('description_ru')
                                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="text2_ru" class="form-label text-success">Второй текст (RU)</label>
                                            <input type="text" id="text2_ru" name="text2_ru" class="form-control" value="{{ $homeHero?->text2_ru }}">
                                            @error('text2_ru')
                                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="number_ru" class="form-label text-success">Телефон (RU)</label>
                                                    <input type="text" id="number_ru" name="number_ru" class="form-control" value="{{ $homeHero?->number_ru }}">
                                                    @error('number_ru')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="mail_ru" class="form-label text-success">E-mail (RU)</label>
                                                    <input type="email" id="mail_ru" name="mail_ru" class="form-control" value="{{ $homeHero?->mail_ru }}">
                                                    @error('mail_ru')
                                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label text-success">Şəkil</label>
                                            <input type="file" id="image" name="image" class="form-control" accept="image/*">
                                            @if($homeHero?->image)
                                                <div class="mt-2">
                                                    <img src="{{ asset('uploads/' . $homeHero->image) }}" alt="Mevcut Resim" 
                                                         class="img-thumbnail" style="max-width: 200px">
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="background_image" class="form-label text-success">Arxa Plan Şəkli</label>
                                            <input type="file" id="background_image" name="background_image" class="form-control" accept="image/*">
                                            @if($homeHero?->background_image)
                                                <div class="mt-2">
                                                    <img src="{{ asset('uploads/' . $homeHero->background_image) }}" 
                                                         alt="Mevcut Arka Plan" class="img-thumbnail" style="max-width: 200px">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-success btn-lg">Yadda Saxla</button>
                                </div>
                            </form>

                            @if(session('success'))
                                <div class="alert alert-success text-center">{{ session('success') }}</div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger text-center">{{ session('error') }}</div>
                            @endif
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
        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 10px 15px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .invalid-feedback {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endpush