@extends('back.layouts.master')
@section('title', 'Kurslar')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tecrübələr</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Ana Səhifə</a></li>
                                <li class="breadcrumb-item active">Tecrübələr</li>
                            </ol>
                        </div>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
                            <i class="mdi mdi-plus"></i> Yeni
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
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

                            <!-- Tab panes -->
                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="az" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Şəkil</th>
                                                    <th>Ad (AZ)</th>
                                                    <th>Mətn (AZ)</th>
                                                    <th>Status</th>
                                                    <th>Əməliyyatlar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($courses as $course)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset($course->image) }}" alt="course" width="100">
                                                        </td>
                                                        <td>{{ $course->name_az }}</td>
                                                        <td>{!! Str::limit($course->text_az, 50) !!}</td>
                                                        <td>
                                                            <button class="btn btn-{{ $course->status == 1 ? 'success' : 'danger' }} btn-sm" 
                                                                    onclick="changeStatus({{ $course->id }})">
                                                                {{ $course->status == 1 ? 'Aktiv' : 'Deaktiv' }}
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bu kursu silmək istədiyinizə əminsiniz?');">Sil</button>
                                                            </form>
                                                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Redaktə et</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="en" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Name (EN)</th>
                                                    <th>Text (EN)</th>
                                                    <th>Status</th>
                                                    <th>Operations</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($courses as $course)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset($course->image) }}" alt="course" width="100">
                                                        </td>
                                                        <td>{{ $course->name_en }}</td>
                                                        <td>{!! Str::limit($course->text_en, 50) !!}</td>
                                                        <td>
                                                            <button class="btn btn-{{ $course->status == 1 ? 'success' : 'danger' }} btn-sm" 
                                                                    onclick="changeStatus({{ $course->id }})">
                                                                {{ $course->status == 1 ? 'Active' : 'Inactive' }}
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bu kursu silmək istədiyinizə əminsiniz?');">Sil</button>
                                                            </form>
                                                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Redaktə et</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="ru" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Изображение</th>
                                                    <th>Имя (RU)</th>
                                                    <th>Текст (RU)</th>
                                                    <th>Статус</th>
                                                    <th>Операции</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($courses as $course)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset($course->image) }}" alt="course" width="100">
                                                        </td>
                                                        <td>{{ $course->name_ru }}</td>
                                                        <td>{!! Str::limit($course->text_ru, 50) !!}</td>
                                                        <td>
                                                            <button class="btn btn-{{ $course->status == 1 ? 'success' : 'danger' }} btn-sm" 
                                                                    onclick="changeStatus({{ $course->id }})">
                                                                {{ $course->status == 1 ? 'Активный' : 'Неактивный' }}
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bu kursu silmək istədiyinizə əminsiniz?');">Sil</button>
                                                            </form>
                                                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Redaktə et</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            @if($courses->isEmpty())
                                <div class="alert alert-warning text-center" role="alert">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function changeStatus(id) {
            $.ajax({
                url: `{{ route('admin.courses.status', '') }}/${id}`,
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
                    }
                }
            });
        }

        function deleteData(id) {
            Swal.fire({
                title: 'Əminsiniz?',
                text: "Silmək istədiyinizə əminsiniz?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Bəli!',
                cancelButtonText: 'Xeyr!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `{{ route('admin.courses.destroy', '') }}/${id}`;
                }
            });
        }
    </script>
@endpush