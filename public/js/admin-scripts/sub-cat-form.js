let subCatName = document.querySelector('form[name=sub-cat-form] input[name=sub_cat_name]');
let subCatSlug = document.querySelector('form[name=sub-cat-form] input[name=sub_cat_slug]');
let subCatImg = document.querySelector('form[name=sub-cat-form] input[name=sub_cat_img]');
let subCatParent = document.getElementById('subs-parent');
let subCatForm = document.querySelector('form[name=sub-cat-form]');

subCatName.addEventListener('change',()=>{
    slug = subCatName.value;
    slug = slug.trim();
    slug = slug.replace(/[\W_]+$/,'');
    slug = slug.toLowerCase();
    slug = slug.replace(/[^a-zA-Z0-9]/g,'-');
    subCatSlug.value = slug
})

function formSubmit(e){
    e.preventDefault();
    
    if(subCatName.value==="" || subCatSlug.value==="" || subCatImg.value==="" || subCatParent.value===""){
        alert('Fill all required fields');
        subCatName.style.border = "1px solid red";
        subCatSlug.style.border = "1px solid red";
        subCatImg.style.border = "1px solid red";
        subCatParent.style.border = "1px solid red";
        return;
    }
    else
    if(subCatSlug.value.length < 3){
        alert('Length of Slug must be equal to or more than 3');
        subCatSlug.style.border = "1px solid red";
        return;
    }
    else{
        subCatSlug.value = subCatSlug.value.replace(/[\W_]+$/,'');
        subCatForm.submit();
    }
}