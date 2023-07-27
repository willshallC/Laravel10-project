CKEDITOR.replace('description');
let cat = document.getElementById('cat');
let subcat = document.getElementById('subcat');
let childCat = document.getElementById('childCat');

if(fscid == ""){
    fscid = null
}
if(fsccid==""){
    fsccid = null
}

for(let i=0; i<cat.options.length; i++){
    if(cat.options[i].value == fcid){
        cat.options[i].selected = "true"
        forAll();
        break
    }
    else{
        continue
    }
}
for(let i=0; i<subcat.options.length; i++){
    if(fscid==null){
        subcat.options[1].selected = "true"
        break
    }
    else
    if(subcat.options[i].value == fscid){
        subcat.options[i].selected = "true"
        forAll();
        break;
    }
    else{
        continue
    }
}
for(let i=0; i<childCat.options.length; i++){
    if(fsccid==null){
        childCat.options[1].selected = "true"
    }
    if(childCat.options[i].value == fsccid){
        childCat.options[i].selected = "true"
    }
    else{
        continue
    }
}

function forAll(){
    for (let i = 0; i < subcat.options.length; i++) {
        if (cat.value == subcat.options[i].dataset.parent) {
            subcat.options[i].style.display = "block";
            document.getElementById('null-opt').style.display = "none";
        } else {
            subcat.options[i].style.display = "none";
            if (subcat.options[i].value === "null") {
                subcat.options[i].style.display = "block";
            }
        }
    }
    for (let i = 0; i < subcat.options.length; i++) {
        if (cat.value == subcat.options[i].dataset.parent) {
            subcat.options[i].style.display = "block";
            document.getElementById('null-opt').style.display = "none";
        } else {
            subcat.options[i].style.display = "none";
            if (subcat.options[i].value === "null") {
                subcat.options[i].style.display = "block";
            }
        }
    }
    for(let i=0; i<childCat.options.length; i++){
        console.log(childCat.options[i].dataset.subparent);
        console.log(subcat.value);
        if(subcat.value == childCat.options[i].dataset.subparent){
            
            childCat.options[i].style.display="block";
            document.getElementById('null-child').style.display = "none";
        }
        else{
            childCat.options[i].style.display = "none";
            if(childCat.options[i].value==="null"){
                childCat.options[i].style.display="block";
            }
        }
    }
}

cat.addEventListener('change', () => {
    
    subcat.options[0].selected = true;

    for (let i = 0; i < subcat.options.length; i++) {
        if (cat.value == subcat.options[i].dataset.parent) {
            subcat.options[i].style.display = "block";
            document.getElementById('null-opt').style.display = "none";
        } else {
            subcat.options[i].style.display = "none";
            if (subcat.options[i].value === "null") {
                subcat.options[i].style.display = "block";
            }
        }
    }
});

subcat.addEventListener('change',()=>{
    
    childCat.options[0].selected = true;
    for(let i=0; i<childCat.options.length; i++){
        console.log(childCat.options[i].dataset.subparent);
        console.log(subcat.value);
        if(subcat.value == childCat.options[i].dataset.subparent){
            
            childCat.options[i].style.display="block";
            document.getElementById('null-child').style.display = "none";
        }
        else{
            childCat.options[i].style.display = "none";
            if(childCat.options[i].value==="null"){
                childCat.options[i].style.display="block";
            }
        }
    }
});