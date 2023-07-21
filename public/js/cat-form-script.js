CKEDITOR.replace('cat_description');

let cat_name = document.querySelector('form[name=cat-form] input[name=cat_name]');
let cat_slug = document.querySelector('form[name=cat-form] input[name=cat_slug]');

cat_name.addEventListener('change',()=>{
    slug = cat_name.value;
    slug = slug.trim();
    slug = slug.replace(/[\W_]+$/,'');
    slug = slug.toLowerCase();
    slug = slug.replace(/[^a-zA-Z0-9]/g,'-');
    cat_slug.value = slug;
})