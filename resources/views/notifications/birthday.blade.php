@extends('layouts.app')
@section('content')
<div class="col-10">
    <p class="title">BIRTHDAY OF MONTH<br/><i class="fas fa-birthday-cake fa-5x"></i></p>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full-name</th>
                <th scope="col">Birthday</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($list as $nhanvien)
            <tr>
                <th>{{ $nhanvien->id }}</th>
                <td>{{ $nhanvien->FirstName }} {{ $nhanvien->LastName }}</td>
                <td>{{ $nhanvien->Birthday }}</td>
            </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>
@endsection
