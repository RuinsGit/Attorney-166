@extends('back.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Rəhbərlik</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.leaders.index') }}">Rəhbərlik</a></li>
                                <li class="breadcrumb-item active">Əlavə et</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Rəhbər əlavə et</h4>
                            
                            <ul class="nav nav-pills nav-justified" role="tablist">
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

                            <form class="needs-validation" method="POST" action="{{ route('admin.leaders.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="az">
                                        <div class="mb-3">
                                            <label class="form-label">Ad Soyad (Az)</label>
                                            <input type="text" name="name_az" value="{{ old('name_az') }}" class="form-control">
                                            @error('name_az')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Vəzifə (Az)</label>
                                            <input type="text" name="position_az" value="{{ old('position_az') }}" class="form-control">
                                            @error('position_az')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="en">
                                        <div class="mb-3">
                                            <label class="form-label">Ad Soyad (En)</label>
                                            <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control">
                                            @error('name_en')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Vəzifə (En)</label>
                                            <input type="text" name="position_en" value="{{ old('position_en') }}" class="form-control">
                                            @error('position_en')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="ru">
                                        <div class="mb-3">
                                            <label class="form-label">Ad Soyad (Ru)</label>
                                            <input type="text" name="name_ru" value="{{ old('name_ru') }}" class="form-control">
                                            @error('name_ru')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Vəzifə (Ru)</label>
                                            <input type="text" name="position_ru" value="{{ old('position_ru') }}" class="form-control">
                                            @error('position_ru')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Şəkil</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                            Əlavə et
                                        </button>
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
    <link href="{{ asset('back/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet">
@endpush

@push('js')
    <script src="{{ asset('back/assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/pages/file-upload.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @if(session('success'))
        <script>
            toastr.success("{{ session('success') }}", 'Uğurlu!', { positionClass: 'toast-center' });
        </script>
    @endif

    @if(session('error'))
        <script>
            toastr.error("{{ session('error') }}", 'Xəta!', { positionClass: 'toast-center' });
        </script>
    @endif

    @if($errors->any())
        <script>
            let errorMessage = '';
            @foreach($errors->all() as $error)
                errorMessage += '{{ $error }}<br>';
            @endforeach
            toastr.warning(errorMessage, 'Diqqət!', { positionClass: 'toast-center' });
        </script>
    @endif

    
    <script>
        $(document).ready(function() {
            $('form').on('submit', function(e) {
                let hasError = false;
                let errorMessage = '';

                
                if (!$('#az input[name="name_az"]').val() || !$('#az input[name="position_az"]').val()) {
                    errorMessage += 'Azərbaycan dilində məlumatları daxil edin<br>';
                    hasError = true;
                }

                
                if (!$('#en input[name="name_en"]').val() || !$('#en input[name="position_en"]').val()) {
                    errorMessage += 'İngilis dilində məlumatları daxil edin<br>';
                    hasError = true;
                }

                
                if (!$('#ru input[name="name_ru"]').val() || !$('#ru input[name="position_ru"]').val()) {
                    errorMessage += 'Rus dilində məlumatları daxil edin<br>';
                    hasError = true;
                }

                
                if (!$('input[name="image"]').val()) {
                    errorMessage += 'Şəkil seçilməlidir<br>';
                    hasError = true;
                }

                if (hasError) {
                    e.preventDefault();
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Diqqət!',
                        html: errorMessage,
                        showConfirmButton: true,
                        confirmButtonText: 'Tamam',
                        timer: 5000
                    });
                }
            });
        });
    </script>
@endpush