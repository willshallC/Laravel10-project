function delUser(id){
    msg= "Are you sure you want to delete this user";
    if(confirm(msg)){
        location.href="/delUser/"+id;
    }
}