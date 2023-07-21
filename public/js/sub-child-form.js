let childName = document.querySelector('form[name=sub-child-form] input[name=sub_child_name]');
let childSlug = document.querySelector('form[name=sub-child-form] input[name=sub_child_slug]');

childName.addEventListener('change',()=>{
    slug = childName.value;
    slug = slug.trim();
    slug = slug.replace(/[\W_]+$/,'');
    slug = slug.toLowerCase();
    slug = slug.replace(/[^a-zA-Z0-9]/g,'-');
    childSlug.value = slug;
})