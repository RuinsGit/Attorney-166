@extends('back.layouts.master')

@section('title', 'Yeni Əlaqə Mesajı')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <h4 class="mb-sm-0">Yeni Əlaqə Mesajı Əlavə Et</h4>

        <form action="{{ route('admin.contact-messages-data.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="message_az" class="form-label">Mesaj (AZ):</label>
                <textarea name="message_az" id="message_az" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Görsel:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </form>
    </div>
</div>
@endsection