CKEDITOR.replace('cat_description');

let cat_name = document.querySelector('form[name=editCatForm] input[name=cat_name]');
let cat_slug = document.querySelector('form[name=editCatForm] input[name=cat_slug]');
let cat_img = document.querySelector('form[name=editCatForm] input[name=cat_img]');
let catForm =  document.querySelector('form[name=editCatForm]');

cat_name.addEventListener('change',()=>{
    
    slug = cat_name.value;
    slug = slug.trim();
    slug = slug.replace(/[\W_]+$/,'');
    slug = slug.toLowerCase();
    slug = slug.replace(/[^a-zA-Z0-9]/g,'-');
    cat_slug.value = slug;
})

function editCat(event){
    event.preventDefault();

    if(cat_name.value=="" || cat_slug.value=="" || cat_img.value==""){
        alert('Enter Required Fields');
        cat_name.style.border = "1px solid red";
        cat_slug.style.border = "1px solid red";
        cat_img.style.border = "1px solid red";
        return;
    }
    else if(cat_slug.value.length<3){
        alert('Slug must be of length 3 or more');
        cat_slug.style.border = "1px solid red";
        return;
    }
    else{
        subCatForm.submit();
    }
}
