@extends('frontend.layouts.app')

@section('content')
    <h2>User Data</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Email Verified At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->email_verified_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
