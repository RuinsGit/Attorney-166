@extends('back.layouts.master')
@section('title', 'Yeni Ana Səhifə Include')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Yeni Ana Səhifə Include</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Ana Səhifə</a></li>
                                <li class="breadcrumb-item active">Yeni Ana Səhifə Include</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.home-includes.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        
                                        <input type="text" class="form-control" id="name1_az" name="name1_az" value="{{ old('name1_az') }}" required placeholder="Başlıq 1 (AZ)">
                                        @error('name1_az')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        
                                        <input type="text" class="form-control" id="name1_en" name="name1_en" value="{{ old('name1_en') }}" placeholder="Başlıq 1 (EN)">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        
                                        <input type="text" class="form-control" id="name1_ru" name="name1_ru" value="{{ old('name1_ru') }}" placeholder="Başlıq 1 (RU)">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        
                                        <input type="text" class="form-control" id="text1_az" name="text1_az" value="{{ old('text1_az') }}" required placeholder="Mətn 1 (AZ)">
                                        @error('text1_az')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        
                                        <input type="text" class="form-control" id="text1_en" name="text1_en" value="{{ old('text1_en') }}" placeholder="Mətn 1 (EN)">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        
                                        <input type="text" class="form-control" id="text1_ru" name="text1_ru" value="{{ old('text1_ru') }}" placeholder="Mətn 1 (RU)">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        
                                        <textarea class="form-control" id="description1_az" name="description1_az" rows="3" required placeholder="Mətn 1 (AZ)">{{ old('description1_az') }}</textarea>
                                        @error('description1_az')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        
                                        <textarea class="form-control" id="description1_en" name="description1_en" rows="3" placeholder="Mətn 1 (EN)">{{ old('description1_en') }}</textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        
                                        <textarea class="form-control" id="description1_ru" name="description1_ru" rows="3" placeholder="Mətn 1 (RU)">{{ old('description1_ru') }}</textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="image1" class="form-label">Şəkil</label>
                                        <input type="file" class="form-control" id="image1" name="image1" required>
                                        @error('image1')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <hr class="my-4">

                                    <!-- İkinci Bölüm -->
                                    <div class="col-md-6 mb-3">
                                        
                                        <input type="text" class="form-control" id="name2_az" name="name2_az" value="{{ old('name2_az') }}" required placeholder="Başlıq 2 (AZ)">
                                        @error('name2_az')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        
                                        <input type="text" class="form-control" id="name2_en" name="name2_en" value="{{ old('name2_en') }}" placeholder="Başlıq 2 (EN)">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        
                                        <input type="text" class="form-control" id="name2_ru" name="name2_ru" value="{{ old('name2_ru') }}" placeholder="Başlıq 2 (RU)">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        
                                        <input type="text" class="form-control" id="text2_az" name="text2_az" value="{{ old('text2_az') }}" required placeholder="Mətn 2 (AZ)">
                                        @error('text2_az')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        
                                        <input type="text" class="form-control" id="text2_en" name="text2_en" value="{{ old('text2_en') }}" placeholder="Mətn 2 (EN)">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        
                                        <input type="text" class="form-control" id="text2_ru" name="text2_ru" value="{{ old('text2_ru') }}" placeholder="Mətn 2 (RU)">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        
                                        <textarea class="form-control" id="description2_az" name="description2_az" rows="3" required placeholder="Mətn 2 (AZ)">{{ old('description2_az') }}</textarea>
                                        @error('description2_az')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        
                                        <textarea class="form-control" id="description2_en" name="description2_en" rows="3" placeholder="Mətn 2 (EN)">{{ old('description2_en') }}</textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        
                                        <textarea class="form-control" id="description2_ru" name="description2_ru" rows="3" placeholder="Mətn 2 (RU)">{{ old('description2_ru') }}</textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="status" required>
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Aktiv</option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Deaktiv</option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Yadda Saxla</button>
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