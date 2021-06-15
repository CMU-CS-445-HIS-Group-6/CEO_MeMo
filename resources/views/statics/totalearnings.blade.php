@extends('layouts.app')
@section('content')
<div class="col-10">
    <p class="title">Total earnings: ${{ $total }}</p>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full-name</th>
                <th scope="col">Earnings</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($list as $employee)
            <tr>
                <th>{{ $employee->id }}</th>
                <td>{{ $employee->FirstName }} {{ $employee->LastName }}</td>
                <td>${{ number_format($employee->PaidToDays, 2) }}</td>
            </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>
@endsection
