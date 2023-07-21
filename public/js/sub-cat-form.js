let subCatName = document.querySelector('form[name=sub-cat-form] input[name=sub_cat_name]');
let subCatSlug = document.querySelector('form[name=sub-cat-form] input[name=sub_cat_slug]');

subCatName.addEventListener('change',()=>{
    slug = subCatName.value;
    slug = slug.trim();
    slug = slug.replace(/[\W_]+$/,'');
    slug = slug.toLowerCase();
    slug = slug.replace(/[^a-zA-Z0-9]/g,'-');
    subCatSlug.value = slug
})