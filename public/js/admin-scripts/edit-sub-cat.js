let sub_cat_name = document.querySelector('form[name=edit-sub-cat] input[name=sub_cat_name]');
let sub_cat_slug = document.querySelector('form[name=edit-sub-cat] input[name=sub_cat_slug]');
let sub_cat_img = document.querySelector('form[name=edit-sub-cat] input[name=sub_cat_img]');
let subCatForm =  document.querySelector('form[name=edit-sub-cat]');
console.log(sub_cat_img.value);

sub_cat_name.addEventListener('change',()=>{
    
    slug = sub_cat_name.value;
    slug = slug.trim();
    slug = slug.replace(/[\W_]+$/,'');
    slug = slug.toLowerCase();
    slug = slug.replace(/[^a-zA-Z0-9]/g,'-');
    sub_cat_slug.value = slug;
})

function updateSubCat(event){
    event.preventDefault();
    if(sub_cat_name.value=="" || sub_cat_slug.value=="" || sub_cat_img.value==""){
        alert('Enter Required Fields');
        sub_cat_name.style.border = "1px solid red";
        sub_cat_slug.style.border = "1px solid red";
        sub_cat_img.style.border = "1px solid red";
        return;
    }
    else if(sub_cat_slug.value.length<3){
        alert('Slug must be of length 3 or more');
        sub_cat_slug.style.border = "1px solid red";
        return;
    }
    else{
        subCatForm.submit();
    }
}