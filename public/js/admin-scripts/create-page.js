CKEDITOR.replace('description');
CKEDITOR.replace('page-schema');

let title = document.querySelector('form[name=page-form] input[name=page_title]');
let page_slug = document.querySelector('form[name=page-form] input[name=page_slug]');
let template = document.getElementById('template');
console.log(template)
let pageForm =  document.querySelector('form[name=page-form]');

title.addEventListener('change',()=>{
    slug = title.value;
    slug = slug.trim();
    slug = slug.replace(/[\W_]+$/,'');
    slug = slug.toLowerCase();
    slug = slug.replace(/[^a-zA-Z0-9]/g,'-');
    page_slug.value = slug;
});

function submitForm(e){
   
    e.preventDefault();

    if(title.value==="" || page_slug.value==="" || template.value===""){
        alert('Enter Required Fields');
        page_slug.style.border = "1px solid red";
        title.style.border = "1px solid red";
        template.style.border = "1px solid red";
        return;
    }
    else
    if(page_slug.value.length<3){
        alert('Slug must be of length 3 characters or more');
        page_slug.style.border = "1px solid red";
        return;
    }
    else{
        page_slug.value =page_slug.value.replace(/[\W_]+$/,'');
        pageForm.submit();
    }
}
