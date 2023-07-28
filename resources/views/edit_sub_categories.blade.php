@extends('admin-layout.admin_layout')
@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/edit-sub-cat.css"/>
@endpush
@section('content')
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Edit</th>
        </tr>
        
        @foreach ($subcategories as $subCategory )
            <tr>
                <td>{{$subCategory->id}}</td>
                <td>{{$subCategory->sub_cat_name}}</td>
                <td>{{$subCategory->sub_cat_slug}}</td>
                <td>{{$subCategory->sub_cat_status}}</td>
                <td><a href="{{route('viewSubCat',$subCategory->id)}}">Edit</a></td>
            </tr>
        @endforeach
    </table>
@endsection

@push('scripts')
    <script defer src='/js/admin-scripts/edit-sub-categories.js'></script>
@endpush