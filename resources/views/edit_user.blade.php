@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/edit-user.css" />
@endpush

@section('content')
<form name="userForm" action="{{route('insertUsers')}}" method="POST">
    @csrf
    <table>
        <tr>
            <th>ID:</th>
            <td><input type="text" name="id" value="{{$user->id}}"/></td>
        </tr>
        <tr>
            <th>First Name:</th>
            <td><input type="text" name="f_name" value="{{$user->first_name}}"/></td>
        </tr>
        <tr>
            <th>Last Name:</th>
            <td><input type="text" name="l_name" value="{{$user->last_name}}"/></td>
        </tr>
        <tr>
            <th>User Name:</th>
            <td><input type="text" name="user_name" value="{{$user->username}}"/></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><input type="email" name="mail" value="{{$user->email}}"/></td>
        </tr>
        <tr>
            <th>Role:</th>
            <td>
                <select id="user-role" name="role">
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->role_type}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
    </table>
    <div id="retailer" style="display:none">
        <table>
            <tr>
                <th>Phone No:</th>
                <td><input type="text" name="phone" value="{{$user->phone}}"/></td>
            </tr>
            <tr>
                <th>Address:</th>
                <td><textarea name="address">{{$user->address}}</textarea></td>
            </tr>
            <tr>
                <th>Slug:</th>
                <td><input type="text" name="slug" value="{{$user->slug}}"/></td>
            </tr>
            <tr>
                <th>Logo:</th>
                <td><input type="text" name="logo" value="{{$user->logo}}"/></td>
            </tr>
            <tr>
                <th>Meta Title:</th>
                <td><textarea name="meta_title">{{$user->meta_title}}</textarea></td>
            </tr>
            <tr>
                <th>Meta Description:</th>
                <td><textarea name="meta_description">{{$user->meta_description}}</textarea></td>
            </tr>
            <tr>
                <th>Schema:</th>
                <td><textarea name="schema">{!!$user->schema!!}</textarea></td>
            </tr>
            <tr>
                <th>Relation:</th>
                <td>
                    <select id="relation" name="relation">
                        <option value="">Select Relation</option>
                        <option value="fixed cost">Fixed Cost</option>
                        <option value="percentage">Percentage</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Website:</th>
                <td><input type="text" name="website" value="{{$user->website}}"/></td>
            </tr>
            <tr>
                <th>Feed URL:</th>
                <td><input type="text" name="feed" value="{{$user->feed_url}}"/></td>
            </tr>
            <tr>
                <th>Feed Active:</th>
                <td>Yes <input type="radio" name="feed_active" value="1"/>
                    No <input type="radio" name="feed_active" value="0" checked/>
                </td>
            </tr>
            <tr>
                <th>Active:</th>
                <td>
                    Yes <input type="radio" name="active" value="1" checked/>
                    No <input type="radio" name="active" value="0"/>
                </td>
            </tr>
            <tr>
                <th>Index:</th>
                <td>
                    Yes <input type="radio" name="index" value="1"/>
                    No <input type="radio" name="index" value="0" checked/>
                </td>
            </tr>
        </table>
    </div>
    <table>
        <tr>
            <td><input type="button" value="Create" onclick="createUser()"/></td>
        </tr>
    </table>
</form>
@endsection
