@extends('layouts.app')
@section('content')
<div class="col-10">
    <p class="title">List of employees over the number of days off<br/><i class="fas fa-exclamation-triangle fa-5x"></i></p>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full-name</th>
                <th scope="col">Days off</th>
                <th scope="col">Allowed</th>
                <th scope="col">Over days</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($list as $employee)
            <tr>
                <th>{{ $employee->id }}</th>
                <td>{{ $employee->FirstName }} {{ $employee->LastName }}</td>
                <td>{{ $employee->VacationDays }}</td>
                <td>{{ $allowed }}</td>
                <td>{{ $employee->VacationDays - $allowed }}</td>
            </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>
@endsection
