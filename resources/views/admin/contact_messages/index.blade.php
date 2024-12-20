<!-- resources/views/admin/contact_messages/index.blade.php -->
@extends('back.layouts.master')

@section('title', 'Əlaqə Mesajları')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Əlaqə Mesajları</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Ana səhifə</a></li>
                            <li class="breadcrumb-item active">Əlaqə Mesajları</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        <!-- DataTable -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg rounded">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">Əlaqə Mesajları Siyahısı</h4>
                            @if($messages->count() < 1)
                                <a href="{{ route('admin.contact-messages-data.create') }}" class="btn btn-primary btn-sm">
                                    <i class="ri-add-line align-middle me-1"></i> Yeni Mesaj Əlavə Et
                                </a>
                            @endif
                        </div>

                        <table id="messages-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Başlıq (AZ)</th>
                                    <th>Basliq (EN)</th>
                                    <th>Basliq (RU)</th>
                                    <th>Səkil</th>
                                    <th>Status</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                    <tr>
                                        <td>{{ $message->id }}</td>
                                        <td>{{ $message->message_az }}</td>
                                        <td>{{ $message->message_en }}</td>
                                        <td>{{ $message->message_ru }}</td>
                                        <td>
                                            @if($message->image)
                                                <img src="{{ asset('storage/' . $message->image) }}" alt="Image" width="100">
                                            @else
                                                <span>Görsel yoxdur</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $message->status ? 'success' : 'danger' }}">
                                                {{ $message->status ? 'Aktiv' : 'Pasiv' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.contact-messages-data.edit', $message->id) }}" class="btn btn-primary btn-sm">Düzenle</a>
                                           
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('js')
    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#messages-table').DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                buttons: ["copy", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#messages-table_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush