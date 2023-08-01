function delProduct(id){
    msg = "Are you sure you want to delete this product?";

    if(confirm(msg)){
        location.href="/delete-product/"+id;
    }
    else{}
}