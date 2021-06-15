@extends('layouts.app')
@section('content')
<div class="col-10">
    <p class="title">Benefit changes have been made to the list of employees</p>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full-name</th>
                <th scope="col">Before</th>
                <th scope="col">After</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($list as $employee)
            <tr>
                <th>{{ $employee->id }}</th>
                <td>{{ $employee->FirstName }} {{ $employee->LastName }}</td>
                <td>{{ $employee->Benefits }}</td>
                <td>{{ $employee->Benefits_old }}</td>
            </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>
@endsection
