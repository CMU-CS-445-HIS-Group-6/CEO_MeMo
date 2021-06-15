@extends('layouts.app')
@section('content')
<div class="col-10">
    <p class="title">Total number of vacation days</p>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full-name</th>
                <th scope="col">Vacation days</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($list as $employee)
            <tr>
                <th>{{ $employee->id }}</th>
                <td>{{ $employee->FirstName }} {{ $employee->LastName }}</td>
                <td>{{ $employee->VacationDays }}</td>
            </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>
@endsection
