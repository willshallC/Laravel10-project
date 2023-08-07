CKEDITOR.replace('answer');

let categories = document.getElementById('cat-faq');
let addFaqForm = document.querySelector('form[name=add-faq-form]');
let ques = document.querySelector('textarea[name=question]');
let ans = document.querySelector('textarea[name=answer]');
let ansEditor = CKEDITOR.instances['answer'];

function addFaq(e){
    e.preventDefault();
    if(ques.value=="" || ansEditor.getData().trim() === "" ||categories.value==""){
        alert('Fill the required fields');
        ques.style.border = "1px solid red";
        categories.style.border = "1px solid red";
        ansEditor.container.$.style.border = "1px solid red";
    }
    else{
        addFaqForm.submit();
    }
}
