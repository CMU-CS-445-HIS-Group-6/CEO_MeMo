<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        h4 {
            text-align: center;
        }

        .title {
            border-style: solid;
            border-width: thin solid;
            text-align: center;
            text-transform: uppercase;
            padding: 20px;
            color: green;
            border-color: black;
        }

        #divMenu,
        ul,
        li,
        li li {
            margin: 0;
            padding: 0;
        }

        #divMenu {
            width: 230px;
            height: 30px;
        }

        #divMenu ul {
            line-height: 25px;
        }

        #divMenu li {
            list-style: none;
            position: relative;
            background: #641b1b;
        }

        #divMenu li li {
            list-style: none;
            position: relative;
            background: #641b1b;
            left: 230px;
            top: -27px;
            z-index: 99999;
        }

        #divMenu ul li a {
            display: block;
            text-decoration: none;
            font-family: Georgia, 'Times New Roman', serif;
            color: #ffffff;
            border: 1px solid #eee;
        }

        #divMenu ul ul {
            position: absolute;
            visibility: hidden;
            top: 27px;
        }

        #divMenu ul li:hover ul {
            visibility: visible;
        }

        #divMenu li:hover {
            background-color: #945c7d;
        }

        #divMenu ul li:hover ul li a:hover {
            background-color: #945c7d;
        }

        #divMenu a:hover {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="container-fluid">
        <div class="d-flex row justify-content-center align-items-center border-bottom border-secondary mb-3" style="height: 75px">
            <div class="col-1">
                <a href="{{ route('home') }}"><i class="fas fa-home fa-2x"></i></a>
            </div>
            <div class="col-10">
                <h4>HUMAN RESOURCE AND PAYROLL MANAGEMENT SYSTEM</h4>
            </div>
            <div class="col-1">
                <i class="fas fa-user-cog fa-1x">&nbsp;Admin</i>
            </div>
        </div>
    </div>
    <!-- Body -->
    <div class="container-fluid">
        <div class="row">
            <!-- Menu -->
            <div class="col-2">
                <div id="divMenu">
                    <ul>
                        <li>
                            <a href="javascript:;">
                                <span class="ms-1"><i class="fas fa-bell"></i> Notifications</span>
                                <span class="float-end me-1"><i class="fas fa-sort-down "></i></span>
                            </a>
                            <ul>
                                <li><a href="{{ route('notifications.fullyear') }}" class="px-1"><i class="fas fa-gem"></i> Employees have been working for a full year</a></li>
                                <li><a href="{{ route('notifications.daysoff') }}" class="px-1"><i class="fas fa-exclamation-triangle"></i> The number of days off has exceeded the regulations</a></li>
                                <li><a href="{{ route('notifications.benefit') }}" class="px-1"><i class="fas fa-volume-up"></i> Employees changed their benefits</a></li>
                                <li><a href="{{ route('notifications.birthday') }}" class="px-1"><i class="fas fa-birthday-cake"></i> Employees have birthday in the month</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <span class="ms-1"><i class="fas fa-user"></i> Employee Management</span>
                                <span class="float-end me-1"><i class="fas fa-sort-down "></i></span>
                            </a>
                            <ul>
                                <li><a href="{{ route('users.create') }}" class="px-1"><i class="fas fa-user-plus"></i> Create</a></li>
                                <li><a href="{{ route('users.index') }}" class="px-1"><i class="fas fa-users"></i> List</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <span class="ms-1"><i class="fas fa-calendar-week"></i> Statistical</span>
                                <span class="float-end me-1"><i class="fas fa-sort-down "></i></span>
                            </a>
                            <ul>
                                <li><a href="{{ route('statics.totalearnings') }}" class="px-1"><i class="fas fa-comment-dollar"></i> Total earnings</a></li>
                                <li><a href="{{ route('statics.vacationdays') }}" class="px-1"><i class="fas fa-calendar-day"></i> Total vacation days</a></li>
                                <li><a href="{{ route('statics.averagebenefits') }}" class="px-1"><i class="fas fa-search-dollar"></i> Average benefits</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-10 mb-3">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
