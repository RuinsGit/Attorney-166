@extends('back.layouts.master')

@section('title', 'Abunəliklər')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Abunəliklər</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Ana səhifə</a></li>
                                <li class="breadcrumb-item active">Abunəliklər</li>
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
                            <h5>Abunə Olun</h5>
                            <form action="{{ route('admin.subscribe.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Abunə Ol</button>
                            </form>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-responsive mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Email</th>
                                            <th>Tarix</th>
                                            <th>Status</th>
                                            <th>Əməliyyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subscribes as $subscribe)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $subscribe->email }}</td>
                                                <td>{{ $subscribe->created_at->format('d/m/Y H:i') }}</td>
                                                <td>
                                                    <select onchange="change_status(this)" data-id="{{ $subscribe->id }}">
                                                        <option value="1" {{ $subscribe->status ? 'selected' : '' }}>Aktiv</option>
                                                        <option value="0" {{ !$subscribe->status ? 'selected' : '' }}>Pasiv</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger" onclick="deleteItem({{ $subscribe->id }})">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
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
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteItem(id) {
            event.preventDefault();
            let url = "{{ route('admin.subscribe.destroy', ['id' => ':id']) }}".replace(':id', id);
            Swal.fire({
                title: 'Silmək istədiyinizdən əminsiniz mi?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Bəli!',
                confirmCancelText: 'Xeyr!',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.replace(url);
                }
            })
        }

        function change_status(elem) {
            let status = elem.value;
            let id = elem.getAttribute('data-id');
            let url = `/admin/subscribe/${id}/change-status`;
            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        '_token': "{{ csrf_token() }}",
                        'status': status
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status == 'success') {
                        setInterval(() => window.location.reload(), 1500);
                    }
                })
        }
    </script>
@endpush