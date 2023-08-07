@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/view-faqs.css"/>
@endpush

@section('content')
    <table>
        <tr>
            <th>ID:</th>
            <th>Category</th>
            <th>Question</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($faqs as $faq )
            <tr>
                <td>{{$faq->id}}</td>
                <td>{{$faq->cat_name}}</td>
                <td>{{$faq->question}}</td>
                <td>
                    @if ($faq->status==1)
                        {{"Active"}}
                    @else
                        {{"Inactive"}}
                    @endif
                </td>
                <td><a href="{{route('editFaq',$faq->id)}}">Edit</a></td>
                <td><button onclick="delFaq({{$faq->id}})">Delete</button></td>
            </tr>
        @endforeach
    </table>
@endsection

@push('scripts')
    <script src="/js/admin-scripts/view-faqs.js" defer></script>
@endpush