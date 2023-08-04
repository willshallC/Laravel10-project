function delBlog(id){
    msg = "Are you sure you want to delete this blog?";
    if(confirm(msg)){
        location.href = "/delete-blog/"+id;
    }
}