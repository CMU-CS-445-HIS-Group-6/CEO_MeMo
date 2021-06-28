@extends('layouts.app')
@section('content')
<div class="col-10">
    <p class="title">1st ANNIVERSARY<br/><i class="fas fa-gem fa-5x"></i></p>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full-name</th>
                <th scope="col">Recruitment date</th>
                <th scope="col">Working days</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($list as $item)
            <tr>
                <th>{{ $item->Employee_ID }}</th>
                <td>{{ $item->employee->First_Name }} {{ $item->employee->Last_Name }}</td>
                <td>{{ $item->Hire_Date }}</td>
                <td>{{ \Carbon\Carbon::parse($item->Hire_Date)->diffInDays() }}</>
            </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>
@endsection
