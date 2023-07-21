CKEDITOR.replace('cat_description');

let cat_name = document.querySelector('form[name=cat-form] input[name=cat_name]');
let cat_slug = document.querySelector('form[name=cat-form] input[name=cat_slug]');
let catForm =  document.querySelector('form[name=cat-form]');

cat_name.addEventListener('change',()=>{
    slug = cat_name.value;
    slug = slug.trim();
    slug = slug.replace(/[\W_]+$/,'');
    slug = slug.toLowerCase();
    slug = slug.replace(/[^a-zA-Z0-9]/g,'-');
    cat_slug.value = slug;
})

function submitForm(e){
   
    e.preventDefault();
    if(cat_slug.value.length<3){
        alert('Slug must be of length 3 characters or more');
        return;
    }
    else{
        console.log('fasdfas');
        catForm.submit();
    }
}
// catForm.addEventListener('submit',(e)=>{
    
//     e.preventDefault();
//     if(cat_slug.value.length<3){
//         alert('Slug must be of length 3 characters or more');
//         return;
//     }
//     else{
//         catForm.submit();
//     }
// })