@extends('back.layouts.master')

@section('title', 'Əlaqə Məlumatları')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Əlaqə Məlumatları</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Ana səhifə</a></li>
                                <li class="breadcrumb-item active">Əlaqə Məlumatları</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('pages.contact.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', $contact->email ?? '') }}">
                                    @error('email')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Telefon Nömrəsi</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $contact->phone ?? '') }}">
                                    @error('phone')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ünvan (Az)</label>
                                    <input type="text" name="address_az" class="form-control" value="{{ old('address_az', $contact->address_az ?? '') }}">
                                    @error('address_az')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ünvan (En)</label>
                                    <input type="text" name="address_en" class="form-control" value="{{ old('address_en', $contact->address_en ?? '') }}">
                                    @error('address_en')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ünvan (Ru)</label>
                                    <input type="text" name="address_ru" class="form-control" value="{{ old('address_ru', $contact->address_ru ?? '') }}">
                                    @error('address_ru')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mail Logo</label>
                                    <input type="file" name="logo" class="form-control" accept=".png,.jpg,.svg,.webp">
                                    @if($contact->logo)
                                        <div class="mt-2">
                                            <img src="{{ asset($contact->logo) }}" alt="Logo" class="img-thumbnail" style="max-height: 100px">
                                        </div>
                                    @endif
                                    @error('logo')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Telefon Logo</label>
                                    <input type="file" name="logo_2" class="form-control" accept=".png,.jpg,.svg,.webp">
                                    @if($contact->logo_2)
                                        <div class="mt-2">
                                            <img src="{{ asset($contact->logo_2) }}" alt="Logo 2" class="img-thumbnail" style="max-height: 100px">
                                        </div>
                                    @endif
                                    @error('logo_2')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Adres Logo</label>
                                    <input type="file" name="favicon" class="form-control" accept=".png,.jpg,.svg,.webp">
                                    @if($contact->favicon)
                                        <div class="mt-2">
                                            <img src="{{ asset($contact->favicon) }}" alt="Favicon" class="img-thumbnail" style="max-height: 100px">
                                        </div>
                                    @endif
                                    @error('favicon')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Yadda saxla</button>
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

@push('js')
<script src="{{ asset('back/assets/js/pages/file-upload.js') }}"></script>
@endpush
