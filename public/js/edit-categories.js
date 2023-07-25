function confirmDel(c){
    if(confirm('Wanna Delete')){
        location.href="/delCat/"+c;
    }
    else{
        alert('no');
    }
}