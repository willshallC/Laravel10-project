function delFaq(id){
    msg = "Do you want to delete this FAQ?";
    if(confirm(msg)){
        location.href = "del-faq/"+id;
    }
}