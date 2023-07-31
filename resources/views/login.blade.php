@extends('layouts.masterlayout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/login.css"/>
@endpush

@section('content')
    <form>
        <table>
            <tr>
                <th>Email:</th>
                <td><input type="email" name="mail" required placeholder="Email"/></td>
            </tr>
            <tr>
                <th>Password:</th>
                <td><input type="password" name="password" required placeholder="Password"/></td>
            </tr>
            <tr>
                <td><input type="submit" name="login" value="Login"/></td>
                <td><a href="">Register</a></td>
            </tr>
        </table>
    </form>
@endsection