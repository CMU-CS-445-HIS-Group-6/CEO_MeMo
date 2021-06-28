@extends('layouts.app')
@section('content')
<div class="col-10">
    <p class="title">Average Benefits: ${{ number_format($average, 2) }}</p>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full-name</th>
                <th scope="col">Benefits</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($list as $employee)
            <tr>
                <th>{{ $employee->Employee_ID }}</th>
                <td>{{ $employee->First_Name }} {{ $employee->Last_Name }}</td>
                <td>${{ number_format($employee->Benefits, 2) }}</td>
            </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>
@endsection
