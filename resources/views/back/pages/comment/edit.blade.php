@extends('back.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Rəy Düzənlə</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Ana səhifə</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.comment.index') }}">Rəylər</a></li>
                                <li class="breadcrumb-item active">Düzənlə</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.comment.update', $comment->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Ad</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                               value="{{ old('name', $comment->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#az" role="tab">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">AZ</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#en" role="tab">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">EN</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#ru" role="tab">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">RU</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active" id="az" role="tabpanel">
                                                <div class="mb-3">
                                                    <label class="form-label">Başlıq (AZ)</label>
                                                    <input type="text" name="title_az" class="form-control @error('title_az') is-invalid @enderror" 
                                                           value="{{ old('title_az', $comment->title_az) }}">
                                                    @error('title_az')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Rəy (AZ)</label>
                                                    <textarea name="comment_az" rows="4" class="form-control @error('comment_az') is-invalid @enderror">{{ old('comment_az', $comment->comment_az) }}</textarea>
                                                    @error('comment_az')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="en" role="tabpanel">
                                                <div class="mb-3">
                                                    <label class="form-label">Başlıq (EN)</label>
                                                    <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror" 
                                                           value="{{ old('title_en', $comment->title_en) }}">
                                                    @error('title_en')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Rəy (EN)</label>
                                                    <textarea name="comment_en" rows="4" class="form-control @error('comment_en') is-invalid @enderror">{{ old('comment_en', $comment->comment_en) }}</textarea>
                                                    @error('comment_en')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="ru" role="tabpanel">
                                                <div class="mb-3">
                                                    <label class="form-label">Başlıq (RU)</label>
                                                    <input type="text" name="title_ru" class="form-control @error('title_ru') is-invalid @enderror" 
                                                           value="{{ old('title_ru', $comment->title_ru) }}">
                                                    @error('title_ru')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Rəy (RU)</label>
                                                    <textarea name="comment_ru" rows="4" class="form-control @error('comment_ru') is-invalid @enderror">{{ old('comment_ru', $comment->comment_ru) }}</textarea>
                                                    @error('comment_ru')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Şəkil</label>
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @if($comment->image)
                                            <div class="mt-2">
                                                <img src="{{ asset($comment->image) }}" alt="Comment Image" class="img-thumbnail" style="height: 100px;">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                                            <option value="1" {{ $comment->status ? 'selected' : '' }}>Aktiv</option>
                                            <option value="0" {{ !$comment->status ? 'selected' : '' }}>Deaktiv</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Yadda saxla</button>
                                        <a href="{{ route('admin.comment.index') }}" class="btn btn-secondary">Geri</a>
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