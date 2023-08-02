@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/add-users.css"/>
@endpush

@section('content')
    <form name="userForm" action="{{route('insertUsers')}}" method="POST">
        @csrf
        <table>
            <tr>
                <th>First Name:</th>
                <td><input type="text" name="f_name" placeholder="First Name"/></td>
            </tr>
            <tr>
                <th>Last Name:</th>
                <td><input type="text" name="l_name" placeholder="Last Name"/></td>
            </tr>
            <tr>
                <th>User Name:</th>
                <td><input type="text" name="user_name" placeholder="User Name"/></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><input type="email" name="mail" placeholder="Email"/></td>
            </tr>
            <tr>
                <th>Password:</th>
                <td><input type="password" name="password" placeholder="Password"/></td>
            </tr>
            <tr>
                <th>Confirm Password:</th>
                <td><input type="password" name="cpassword" placeholder="Confirm Password"/></td>
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
                    <td><input type="text" name="phone"/></td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td><textarea name="address"></textarea></td>
                </tr>
                <tr>
                    <th>Slug:</th>
                    <td><input type="text" name="slug" placeholder="Slug"/></td>
                </tr>
                <tr>
                    <th>Logo:</th>
                    <td><input type="text" name="logo" placeholder="Logo"/></td>
                </tr>
                <tr>
                    <th>Meta Title:</th>
                    <td><textarea name="meta_title"></textarea></td>
                </tr>
                <tr>
                    <th>Meta Description:</th>
                    <td><textarea name="meta_description"></textarea></td>
                </tr>
                <tr>
                    <th>Schema:</th>
                    <td><textarea name="schema"></textarea></td>
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
                    <td><input type="text" name="website"/></td>
                </tr>
                <tr>
                    <th>Feed URL:</th>
                    <td><input type="text" name="feed"/></td>
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

@push('scripts')
    <script src="js/admin-scripts/add-users.js" defer></script>
@endpush