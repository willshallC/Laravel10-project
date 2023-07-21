let subCatName = document.querySelector('form[name=sub-cat-form] input[name=sub_cat_name]');
let subCatSlug = document.querySelector('form[name=sub-cat-form] input[name=sub_cat_slug]');
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

    if(subCatSlug.value.length < 3){
        alert('Length of Slug must be equal to or more than 3');
        return;
    }
    else{
        subCatForm.submit();
    }
}