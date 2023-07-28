@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/view-child-cat.css"/>
@endpush

@section('content')
    <form name="childForm" action="{{route('editChildCat')}}" method="POST">
        @csrf
        <table>
            <tr>
                <th>ID:</th>
                <td><input type="number" name="id" value="{{$subChild->id}}" readonly/></td>
            </tr>
            <tr>
                <th>Name:</th>
                <td><input type="text" name="child_name" value="{{$subChild->sub_child_name}}"/></td>
            </tr>
            <tr>
                <th>Slug:</th>
                <td><input type="text" name="child_slug" value="{{$subChild->sub_child_slug}}"/></td>
            </tr>
            <tr>
                <th>Image:</th>
                <td><input type="text" name="child_img" value="{{$subChild->sub_child_img}}"/></td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>
                    @if ($subChild->sub_status == 1)
                        Active <input type="radio" name="child_status" value="1" checked/>
                        Inactive <input type="radio" name="child_status" value="0"/>
                    @else
                        Active <input type="radio" name="child_status" value="1"/>
                        Inactive <input type="radio" name="child_status" value="0" checked/>
                    @endif
                </td>
            </tr>
            <tr>
                <td><input type="button" value="Update" onclick="childUpdate(event)"/></td>
            </tr>
        </table>
    </form>
@endsection

@push('scripts')
    <script defer src="/js/admin-scripts/edit-sub-child-form.js"></script>
@endpush