@extends('layouts.app')
@section('content')
<div class="col-10">
    <p class="title">Employees Management</p>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">List</button>
        </li>
        <li class="nav-item" role="presentation">
            <a href="{{ route('users.create') }}"><button class="nav-link"type="button"><i class="fas fa-user-plus"></i></button></a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Full-name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                        <th scope="col">Ethnicity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($list as $nhanvien)
                    <tr>
                        <th>{{ $nhanvien->id }}</th>
                        <td>{{ $nhanvien->FirstName }} {{ $nhanvien->LastName }}</td>
                        <td>{{ $nhanvien->Gender == 0 ? 'Male' : 'Female' }}</td>
                        <td>{{ $nhanvien->Address }}</td>
                        <td>{{ $nhanvien->Ethnicity }}</td>
                        <td>
                            <a href="{{ route('users.edit', ['id' => $nhanvien->id ]) }}"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></a>
                            <a href="javascript:;" onclick="deleteId({{ $nhanvien->id }});"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td>
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function deleteId(id) {
        var conf = confirm('Do you really want to delete this user?');
        if (conf == true) {
            var url = '{{ route('users.index') }}/remove/'+id;
            var form = document.createElement('form');
            form.action = url;
            form.method = 'POST';
            var input = document.createElement('input');
            input.name = '_token';
            input.value = '{{ csrf_token() }}';
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        } else {

        }
    }
</script>
@endsection
