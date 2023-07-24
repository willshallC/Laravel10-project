@extends('layouts.masterlayout')

@section('content')
    <table>
        <form name="edit-cat">
            <tr>
                <th>ID:</th>
                <td><input type="number" value="{{$category->id}}" name="cat_id" readonly/></td>
            </tr>
            <tr>
                <th>Name:</th>
                <td><input type="text" name="cat_names" value="{{$category->cat_name}}"/></td>
            </tr>
            <tr>
                <th>Slug:</th>
                <td><input type="text" value="{{$category->cat_slug}}" name="cat_slug" minlength="3"/></td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>
                    @if ($category->cat_status==1)
                        Active <input checked type="radio" name="cat_status" value="1"/>
                        Inactive <input type="radio" name="cat_status" value="0"/>
                    @else
                        Active <input type="radio" name="cat_status" value="1"/>
                        Inactive <input checked type="radio" name="cat_status" value="0"/>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Top Category:</th>
                <td>
                    @if ($category->top_cat==1)
                        Yes <input type="radio" name="top_cat" checked value="1"/>
                        No <input type="radio" name="top_cat" value="0"/>
                    @else
                        Yes <input type="radio" name="top_cat" value="1"/>
                        No <input type="radio" name="top_cat" value="0" checked/>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Image:</th>
                <td><input type="text" value="{{$category->cat_img}}" name="cat_img"/></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><textarea name="cat_description" >{{$category->cat_description}}</textarea></td>
            </tr>
            <tr>
                <td><input type="button"  value="Editgdfg" onclick="editCat(event)"/></td>
            </tr>
        </form>
    </table>
    <script>
         let cat_slug = document.querySelector('form[name=edit-cat] input[name=cat_slug]');
// let cat_img = document.querySelector('form[name=editCatForm] input[name=cat_img]');
// let catForm =  document.querySelector('form[name=editCatForm]');

console.log(cat_slug);
    </script>
@endsection

@push('scripts')
    <script src="/js/edit-cat-form.js" defer></script>
@endpush