@extends('layouts.masterlayout')

@section('content')

    <h1 style="text-align: center">Add Product</h1>

    <form action="{{route('insertProduct')}}" method="POST">
        @csrf
        <table>
            <tr>
                <th>Product:</th>
                <td><input type="text" name="product_name" placeholder="Product Name" required/></td>
            </tr>
            <tr>
                <th>Description:</th>
                <td><textarea name="description"></textarea></td>
            </tr>
            <tr>
                <th>Price:</th>
                <td><input type="number" name="product_price" required placeholder="Price"/></td>
            </tr>
            <tr>
                <th>Image:</th>
                {{-- <td><input type="file" name="product_img"/></td> --}}
                <td><input type="text" name="product_img" required/></td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>Active <input type="radio" name="product_status" checked value="1"/> Inactive <input type="radio" name="product_status" value="0"/></td>
            </tr>
            <tr>
                <th>Brand:</th>
                <td><input type="text" name="product_brand" required placeholder="Brand"/></td>
            </tr>
            <tr>
                <th>Link:</th>
                <td><input type="text" name="product_link" required placeholder="Link"/></td>
            </tr>
            <tr>
                <th>Category</th>
                <td>
                    <select name="product_cat" id="cat" required>
                        <option>--Select-Category--</option>
                        @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr id="subcat-row" style="visibility: hidden;">
                <th>Sub-Category</th>
                <td>
                    <select name="product_subcat" id="subcat" required>
                        <option>--Select-SubCategory--</option>
                        <option id="null-opt" value="null">NULL</option>
                        @foreach ($subCategories as $subcat )
                            <option value={{$subcat->id}} data-parent="{{$subcat->parent_id}}">{{$subcat->sub_cat_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Add Product"/></td>
            </tr>
        </table>
    </form>

    <script>
        CKEDITOR.replace('description');
    </script>
    <script>
        let cat = document.getElementById('cat');
        let subcat = document.getElementById('subcat');
        cat.addEventListener('change',()=>{
            document.getElementById('subcat-row').style.visibility="visible";
            subcat.options[0].selected= true;
            for(let i = 0; i<subcat.options.length;i++){
                if(cat.value==subcat.options[i].dataset.parent){
                    
                    // if(subcat.options[i].value == "null"){
                    //     subcat.options[i].style.display="none";
                    // }
                    // else{
                    //     subcat.options[i].style.display="block";
                    // }
                    subcat.options[i].style.display="block";
                    document.getElementById('null-opt').style.display="none !important";            
                }
                else{
                    
                    subcat.options[i].style.display="none";
                    document.getElementById('null-opt').style.display="block !important";
                    // if(subcat.options[i].value == "null"){
                    //     subcat.options[i].style.display="block";
                    // }
                    // else{
                    //     subcat.options[i].style.display="none";
                    // }
                }
                // console.log(subcat.options[i].dataset.parent);
            }
        })
        
        
    </script>
@endsection