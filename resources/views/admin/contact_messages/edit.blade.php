@extends('back.layouts.master')

@section('title', 'Əlaqə Mesajını Redaktə Et')

@section('content')
<div class="card" style="margin-top: 7%;">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Əlaqə Mesajını Redaktə Et</h3>
            <a href="{{ route('admin.contact-messages-data.index') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-arrow-left"></i> Geri
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.contact-messages-data.update', $contactMessage->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="message_az">Basliq (AZ):</label>
                <textarea name="message_az" id="message_az" class="form-control @error('message_az') is-invalid @enderror" required>{{ old('message_az', $contactMessage->message_az) }}</textarea>
                @error('message_az')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="message_en">Basliq (EN):</label>
                <textarea name="message_en" id="message_en" class="form-control @error('message_en') is-invalid @enderror">{{ old('message_en', $contactMessage->message_en) }}</textarea>
                @error('message_en')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="message_ru">Basliq (RU):</label>
                <textarea name="message_ru" id="message_ru" class="form-control @error('message_ru') is-invalid @enderror">{{ old('message_ru', $contactMessage->message_ru) }}</textarea>
                @error('message_ru')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Səkil:</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @if($contactMessage->image)
                    <img src="{{ asset('storage/' . $contactMessage->image) }}" alt="Current Image" width="100" class="mt-2">
                @endif
                @error('image')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="status" name="status" value="1" 
                        {{ $contactMessage->status ? 'checked' : '' }}>
                    <label class="custom-control-label" for="status">Status</label>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Yadda Saxla</button>
        </form>
    </div>
</div>
@endsection