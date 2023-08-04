CKEDITOR.replace('description');

let title = document.querySelector('form[name=blog-form] input[name=title]');
let blog_slug = document.querySelector('form[name=blog-form] input[name=slug]');
let img = document.querySelector('form[name=blog-form] input[name=image]');
let blogForm =  document.querySelector('form[name=blog-form]');
let author = document.getElementById('authors');
let cat = document.getElementById('categories')

for(let i=0; i<author.options.length;i++){
    if(author.options[i].value==bauthor){
        author.options[i].selected="true"
        break
    }
}
for(let i=0;i<cat.options.length;i++){
    if(cat.options[i].value==bcat){
        cat.options[i].selected="true";
        break
    }
}

title.addEventListener('change',()=>{
    slug = title.value;
    slug = slug.trim();
    slug = slug.replace(/[\W_]+$/,'');
    slug = slug.toLowerCase();
    slug = slug.replace(/[^a-zA-Z0-9]/g,'-');
    blog_slug.value = slug;
})

function updateBlog(e){
   
    e.preventDefault();

    if(title.value==="" || blog_slug.value==="" || img.value==="" || author.value=="" || cat.value==""){
        alert('Enter Required Fields');
        blog_slug.style.border = "1px solid red";
        title.style.border = "1px solid red";
        img.style.border = "1px solid red";
        author.style.border = "1px solid red";
        cat.style.border="1px solid red";
        return;
    }
    else
    if(blog_slug.value.length<3){
        alert('Slug must be of length 3 characters or more');
        blog_slug.style.border = "1px solid red";
        return;
    }
    else{
        blog_slug.value =blog_slug.value.replace(/[\W_]+$/,'');
        
        blogForm.submit();
    }
}