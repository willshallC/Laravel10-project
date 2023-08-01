function deletePage(id){
    msg = "Are you sure you want to delete this page?";
    if(confirm(msg)){
        location.href="/delete-page/"+id;
    }
    else{
        
    }
}