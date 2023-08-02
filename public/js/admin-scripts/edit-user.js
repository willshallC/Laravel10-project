CKEDITOR.replace('schema');

let fname = document.querySelector('form[name=userForm] input[name=f_name]');
let lname = document.querySelector('form[name=userForm] input[name=l_name]');
let userName = document.querySelector('form[name=userForm] input[name=user_name');
let email = document.querySelector('form[name=userForm] input[name=mail]');
let password = document.querySelector('form[name=userForm] input[name=password]');
let cpass = document.querySelector('form[name=userForm] input[name=cpassword]')
let role = document.getElementById('user-role');
let relation = document.getElementById('relation');
let slug = document.querySelector('form[name=userForm] input[name=slug]');
let retailerFields = document.getElementById('retailer');
let userForm = document.querySelector('form[name=userForm]');
for(i=0;i<role.options.length;i++){
    if(role.options[i].value==userRole){
        role.options[i].selected="true"
    }

}
if(role.value==2){
    retailerFields.style.display="block"
}
for(let i=0; i<relation.options.length;i++){
    if(relation.options[i].value == userRelation){
        relation.options[i].selected="true";
        break
    }
    else{
        if(userRelation==0){
            relation.options[0].selected="true"
        }
    }
}

role.addEventListener('change', () => {
    if (role.value === "2") {
        retailerFields.style.display = "block";
    } else {
        
        retailerFields.style.display = "none";
        relation.options[0].selected="true";
        slug.value="";
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