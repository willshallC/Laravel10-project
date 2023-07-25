function confirmDel(id){
    if(confirm('Wanna Delete')){
        location.href="/delCat/"+id;
    }
    else{
        alert('no');
    }
}