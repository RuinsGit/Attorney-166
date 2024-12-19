@extends('back.layouts.master')
@section('title', 'Ana Səhifə Includes')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- Flash Mesajları -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Ana Səhifə Includes</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Ana Səhifə</a></li>
                                <li class="breadcrumb-item active">Ana Səhifə Includes</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                @if($homeIncludes->count() == 1)
                                    <div class="d-flex justify-content-end mb-4">
                                        <a href="{{ route('admin.home-includes.edit', $homeIncludes->first()->id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i> Redaktə Et
                                        </a>
                                    </div>
                                @elseif($homeIncludes->count() < 1)
                                    <div class="d-flex justify-content-end mb-4">
                                        <a href="{{ route('admin.home-includes.create') }}" class="btn btn-primary">
                                            <i class="fas fa-plus"></i> Yeni
                                        </a>
                                    </div>
                                @endif
                            </div>

                            @if($homeIncludes->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Şəkil</th>
                                                <th>Başlıq 1</th>
                                                <th>Başlıq 2</th>
                                                <th>Status</th>
                                                <th>Əməliyyatlar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($homeIncludes as $include)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($include->image1) }}" alt="image" width="100">
                                                </td>
                                                <td>{{ $include->name1_az }}</td>
                                                <td>{{ $include->name2_az }}</td>
                                                <td>
                                                    <button type="button" 
                                                        onclick="changeStatus({{ $include->id }})"
                                                        class="btn btn-{{ $include->status == 1 ? 'success' : 'danger' }} btn-sm">
                                                        {{ $include->status == 1 ? 'Aktiv' : 'Deaktiv' }}
                                                    </button>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.home-includes.edit', $include->id) }}" 
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" 
                                                        onclick="deleteData({{ $include->id }})"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-warning" role="alert">
                                    Məlumat tapılmadı
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Set up global AJAX settings for CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        function changeStatus(id) {
            $.ajax({
                url: `{{ route('admin.home-includes.status', ':id') }}`.replace(':id', id),
                type: 'GET',
                success: function(response) {
                    if(response.status === 'success') {
                        Swal.fire({
                            title: 'Uğurlu!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'Tamam'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Xəta!',
                            text: response.message || 'Status dəyişdirilə bilmədi.',
                            icon: 'error',
                            confirmButtonText: 'Bağla'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: 'Xəta!',
                        text: 'Status dəyişdirilə bilmədi.',
                        icon: 'error',
                        confirmButtonText: 'Bağla'
                    });
                }
            });
        }

        function deleteData(id) {
            Swal.fire({
                title: 'Əminsiniz?',
                text: "Bu məlumatı silmək istədiyinizə əminsiniz?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Bəli, Sil!',
                cancelButtonText: 'Xeyr'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ route('admin.home-includes.destroy', ':id') }}`.replace(':id', id),
                        type: 'DELETE',
                        success: function(response) {
                            if(response.status === 'success') {
                                Swal.fire({
                                    title: 'Uğurlu!',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonText: 'Tamam'
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Xəta!',
                                    text: response.message || 'Silinmə əməliyyatı uğursuz oldu.',
                                    icon: 'error',
                                    confirmButtonText: 'Bağla'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Xəta!',
                                text: 'Silinmə əməliyyatı zamanı xəta meydana gəldi.',
                                icon: 'error',
                                confirmButtonText: 'Bağla'
                            });
                            console.error('Silinmə xətası:', error);
                        }
                    });
                }
            });
        }
    </script>
@endpush 