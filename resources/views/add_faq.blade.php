@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/add-faq.css"/>
@endpush

@section('content')
    <form name="add-faq-form" action="{{route('insertFaq')}}" method="POST">
        @csrf
        <table>
            <tr>
                <th>Category:</th>
                <td>
                    <select id="cat-faq" name="category" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Question:</th>
                <td><textarea name="question" required></textarea></td>
            </tr>
            <tr>
                <th>Answer:</th>
                <td><textarea name="answer" required></textarea></td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>
                    Active <input type="radio" name="status" value="1" checked/>
                    Inactive <input type="radio" name="status" value="0"/>
                </td>
            </tr>
            <tr>
                <td><input type="button" onclick="addFaq(event)" value="Add"/></td>
            </tr>
        </table>
    </form>
@endsection

@push('scripts')
    <script src="/js/admin-scripts/add-faq.js" defer></script>
@endpush