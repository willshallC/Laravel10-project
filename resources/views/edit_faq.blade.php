@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylsheet" type="text/css" href="css/admin-style/edit-faq.css"/>
@endpush

@section('content')
    <form name="faq-edit-form" action="{{route('updateFaq')}}" method="POST">
        @csrf
        <table>
            <tr>
                <th>ID:</th>
                <td><input type="number" name="id" value="{{$faq->id}}" readonly/></td>
            </tr>
            <tr>
                <th>Category:</th>
                <td>
                    <select id="cat-faq" name="category" required>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Question:</th>
                <td><textarea name="question" required>{{$faq->question}}</textarea></td>
            </tr>
            <tr>
                <th>Answer:</th>
                <td><textarea name="answer">{!!$faq->answer!!}</textarea></td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>
                    @if ($faq->status==1)
                        Active <input type="radio" name="status" value="1" checked/>
                        Inactive <input type="radio" name="status" value="0"/>
                    @else
                        Active <input type="radio" name="status" value="1"/>
                        Inactive <input type="radio" name="status" value="0" checked/>
                    @endif
                </td>
            </tr>
            <tr>
                <td><input type="button" onclick="updateFaq(event)" value="Update"/></td>
            </tr>
        </table>
    </form>
    <script>
        var catFaq ={{$faq->cat_id}}
    </script>
@endsection

@push('scripts')
    <script src="/js/admin-scripts/edit-faq.js" defer></script>
@endpush