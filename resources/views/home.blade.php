@extends('layouts.app')

@section('content')

    <form id="postAdminAssignRoles" method="POST" action="{{ route('postAdminAssignRoles') }}">
        {{ csrf_field() }}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table>
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User</th>
                            <th>Admin</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}} <input type="hidden" name="email" value="{{$user->email}}"></td>
                                        <td><input type="checkbox"{{$user->hasRole('User') ? 'checked' : ''}} name="role_user"></td>
                                        <td><input type="checkbox"{{$user->hasRole('Admin') ? 'checked' : ''}} name="role_admin"></td>
                                        <td><button type="submit" value="{{$user->email}}">Assign Roles</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    </form>
@endsection
