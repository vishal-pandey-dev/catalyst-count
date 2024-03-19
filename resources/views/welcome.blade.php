@extends('frontend.layouts.app')

@section('content')
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ route('home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('user.login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('user.registeration') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <form action="{{ route('home') }}" method="GET">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ request()->input('name') }}">

                <label for="domain">Domain:</label>
                <input type="text" id="domain" name="domain" value="{{ request()->input('domain') }}">

                <label for="year_founded">Year Founded:</label>
                <input type="text" id="year_founded" name="year_founded" value="{{ request()->input('year_founded') }}">

                <label for="industry">Industry:</label>
                <input type="text" id="industry" name="industry" value="{{ request()->input('industry') }}">

                <label for="size_range">Size Range:</label>
                <input type="text" id="size_range" name="size_range" value="{{ request()->input('size_range') }}">

                <label for="locality">Locality:</label>
                <input type="text" id="locality" name="locality" value="{{ request()->input('locality') }}">

                <label for="country">Country:</label>
                <input type="text" id="country" name="country" value="{{ request()->input('country') }}">

                <label for="linkedin_url">LinkedIn URL:</label>
                <input type="text" id="linkedin_url" name="linkedin_url" value="{{ request()->input('linkedin_url') }}">

                <label for="current_employee_estimate">Current Employee Estimate:</label>
                <input type="text" id="current_employee_estimate" name="current_employee_estimate" value="{{ request()->input('current_employee_estimate') }}">

            
                <button type="submit">Filter</button>
            </form>
            
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Domain</th>
                    <th>Year Founded</th>
                    <th>Industry</th>
                    <th>Size Range</th>
                    <th>Locality</th>
                    <th>Country</th>
                    <th>LinkedIn URL</th>
                    <th>Current Employee Estimate</th>
                </tr>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->domain }}</td>
                        <td>{{ $row->year_founded }}</td>
                        <td>{{ $row->industry }}</td>
                        <td>{{ $row->size_range }}</td>
                        <td>{{ $row->locality }}</td>
                        <td>{{ $row->country }}</td>
                        <td>{{ $row->linkedin_url }}</td>
                        <td>{{ $row->current_employee_estimate }}</td>
                    </tr>
                @endforeach
            </table>

            


        </div>

@endsection