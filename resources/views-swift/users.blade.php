@extends('base.admin')

@section('title')
    Users
@endsection

@section('content')
    <div class="widget">
        <div class="widget-head">
            Registered Users
        </div>
        <div class="widget-body">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Group</th>
                    <th>Creation Date</th>
                    <th>Action</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->group }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a href="{{ url('admin/users', [$user->id]) }}" onclick="confirm('Are you sure?'); event.preventDefault(); document.getElementById('delete-form-{{$user->id}}').submit();">Delete</a>
                            <button id="toggle-edit-form-{{$user->id}}">Edit</button>
                            <form id="delete-form-{{ $user->id}}" action="{{ url('admin/users/delete', [$user->id]) }}" method="POST" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    <tr class="edit" style="display: none;" id="edit-form-{{ $user->id }}">
                        <form action="{{ url('admin/users/update', [$user->id]) }}" method="POST">
                            @csrf
                            <td></td>
                            <td>
                                <input name="name" type="text" value="{{ $user->name }}">
                            </td>
                            <td>
                                <input name="email" type="text" value="{{ $user->email }}">
                            </td>
                            <td>
                                <select name="group">
                                    @foreach (Config::get('swift.usergroups') as $group)
                                        {{-- <option value="{{ $group->id }}">{{ $group->name }}</option> --}}
                                        <option value="">option</option>
                                    @endforeach
                                </select>
                            </td>
                            <td></td>
                            <td>
                                <button type="submit">Update</button>
                                <button type="reset" id="cancel-edit-form-{{ $user->id }}">Cancel</button>
                            </td>
                        </form>
                        <script>
                            var editBtn = '#toggle-edit-form-{{ $user->id }}';
                            var editForm = '#edit-form-{{ $user->id }}';
                            var cancelBtn = '#cancel-edit-form-{{ $user->id }}';

                            $(editBtn).click(function() {
                                if($(editForm).is(':hidden')) {
                                    $(editForm).show();
                                }
                            });

                            $(cancelBtn).click(function() {
                                if($(editForm).is(':visible')) {
                                    $(editForm).hide();
                                }
                            });
                        </script>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    {{-- <div class="widget">
        <div class="widget-head">
            Create User
        </div>
        <div class="widget-body">
            <form action="{{ url('/admin/users/create') }}" method="post">
                @csrf
                <div class="form-columns">
                    <div class="form-row form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text">
                    </div>
                    <div class="form-row form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="group">Group</label>
                    <select name="group">
                        @foreach (Config::get('swift.usergroups') as $group)
                            {{-- <option value="{{ $group->id }}">{{ $group->name }}</option>  
                            <option value="">option</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-columns">
                    <div class="form-row form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password">
                    </div>
                    <div class="form-row form-group">
                        <label for="password_confirm">Confirm Password</label>
                        <input name="password_confirm" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn-primary" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div> --}}
@endsection