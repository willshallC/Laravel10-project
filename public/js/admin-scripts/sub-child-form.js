let childName = document.querySelector('form[name=sub-child-form] input[name=sub_child_name]');
let childSlug = document.querySelector('form[name=sub-child-form] input[name=sub_child_slug]');
let childImg = document.querySelector('form[name=sub-child-form] input[name=sub_child_img]');
let childParent = document.getElementById('subCatParent');
let childForm = document.querySelector('form[name=sub-child-form]');

childName.addEventListener('change',()=>{
    slug = childName.value;
    slug = slug.trim();
    slug = slug.replace(/[\W_]+$/,'');
    slug = slug.toLowerCase();
    slug = slug.replace(/[^a-zA-Z0-9]/g,'-');
    childSlug.value = slug;
})

function formSubmit(e){
    e.preventDefault();

    if(childName.value==="" || childSlug.value==="" || childImg.value==="" || childParent.value===""){
        alert('Enter Required Fields');
        childName.style.border = "1px Solid red";
        childSlug.style.border = "1px Solid red";
        childImg.style.border = "1px Solid red";
        childParent.style.border = "1px Solid red";
        return;
    }
    else
    if(childSlug.value.length < 3){
        alert('Length of slug must be equal to or greater than 3');
        childSlug.style.border = "1px Solid red";
        return;
    }
    else{
        childForm.submit();
    }
}