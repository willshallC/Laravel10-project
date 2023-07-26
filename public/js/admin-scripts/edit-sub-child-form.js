let child_name = document.querySelector('form[name=childForm] input[name=childname]');
let child_slug = document.querySelector('form[name=childForm] input[name=child_slug]');
let child_img = document.querySelector('form[name=childForm] input[name=child_img]');
let childForm =  document.querySelector('form[name=childForm]');

child_name.addEventListener('change',()=>{
    
    slug = child_name.value;
    slug = slug.trim();
    slug = slug.replace(/[\W_]+$/,'');
    slug = slug.toLowerCase();
    slug = slug.replace(/[^a-zA-Z0-9]/g,'-');
    child_slug.value = slug;
});

function childUpdate(event){
    event.preventDefault();
    if(child_name.value=="" || child_slug.value=="" || child_img.value==""){
        alert('Enter Required Fields');
        child_name.style.border = "1px solid red";
        child_slug.style.border = "1px solid red";
        child_img.style.border = "1px solid red";
        return;
    }
    else if(child_slug.value.length<3){
        alert('Slug must be of length 3 or more');
        child_slug.style.border = "1px solid red";
        return;
    }
    else{
        childForm.submit();
    }
}