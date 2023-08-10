function deleteProduct(id){
    msg = "Are you sure you want to delete this product?"
    if(confirm(msg)){
        location.href="/delete-product/"+id
    }
}
// let cat = document.getElementById('cat');
// let subcat = document.getElementById('subcat');
// let childCat = document.getElementById('childCat');

// cat.addEventListener('change', () => {
//     document.getElementById('subcat-row').style.visibility = "visible";
//     subcat.options[0].selected = true;

//     for (let i = 0; i < subcat.options.length; i++) {
//         if (cat.value == subcat.options[i].dataset.parent) {
//             subcat.options[i].style.display = "block";
//             document.getElementById('null-opt').style.display = "none";
//         } else {
//             subcat.options[i].style.display = "none";
//             if (subcat.options[i].value === "null") {
//                 subcat.options[i].style.display = "block";
//             }
//         }
//     }
// });

// subcat.addEventListener('change',()=>{
//     document.getElementById('child-cat-row').style.visibility = "visible";
//     childCat.options[0].selected = true;
//     for(let i=0; i<childCat.options.length; i++){
//         console.log(childCat.options[i].dataset.subparent);
//         console.log(subcat.value);
//         if(subcat.value == childCat.options[i].dataset.subparent){
            
//             childCat.options[i].style.display="block";
//             document.getElementById('null-child').style.display = "none";
//         }
//         else{
//             childCat.options[i].style.display = "none";
//             if(childCat.options[i].value==="null"){
//                 childCat.options[i].style.display="block";
//             }
//         }
//     }
// });