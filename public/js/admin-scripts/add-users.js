CKEDITOR.replace('schema');

let fname = document.querySelector('form[name=userForm] input[name=f_name]');
let lname = document.querySelector('form[name=userForm] input[name=l_name]');
let userSlug = document.querySelector('form[name=userForm] input[name=slug]');
let userName = document.querySelector('form[name=userForm] input[name=user_name');
let email = document.querySelector('form[name=userForm] input[name=mail]');
let password = document.querySelector('form[name=userForm] input[name=password]');
let cpass = document.querySelector('form[name=userForm] input[name=cpassword]')
let role = document.getElementById('user-role');
let relation = document.getElementById('relation');
let slug = document.querySelector('form[name=userForm] input[name=slug]');
console.log(relation)
let retailerFields = document.getElementById('retailer');
let userForm = document.querySelector('form[name=userForm]');

role.addEventListener('change', () => {
    if (role.value === "2") {
        retailerFields.style.display = "block";
        let tempSlug = fname.value.trim()+" "+lname.value.trim(); 
        
        slug = tempSlug;
        slug = slug.trim();
        slug = slug.replace(/[\W_]+$/,'');
        slug = slug.toLowerCase();
        slug = slug.replace(/[^a-zA-Z0-9]/g,'-');
        userSlug.value = slug;
    
        
    } else {
        
        retailerFields.style.display = "none";
        relation.options[0].selected="true";
        userSlug.value="";
    }
});


function createUser(){
    if(fname.value=="" || lname.value=="" || userName.value=="" || email.value=="" || password.value=="" || role.value==""){
        alert('Enter required fields')
        fname.style.border = "1px solid red";
        lname.style.border = "1px solid red";
        userName.style.border = "1px solid red";
        email.style.border = "1px solid red";
        password.style.border = "1px solid red";
        role.style.border = "1px solid red";
        return;
    }
    if(password.value.length<8){
        alert("Password length must be of atleast 8 characters");
        password.style.border="1px solid red";
        return;
    }
    if(password.value != cpass.value){
        alert("Pasword Doest not match");
        password.style.border = "1px solid red";
        cpass.style.border = "1px solid red";
        return
    }
    if(role.value==2){
        if(relation.value=="" || slug.value==""){
            alert('Enter required fields');
            relation.style.border="1px solid red";
            slug.style.border="1px solid red";
            return
        }
    }
    userForm.submit();
}