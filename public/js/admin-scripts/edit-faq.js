CKEDITOR.replace('answer');

let categories = document.getElementById('cat-faq');
let editFaqForm = document.querySelector('form[name=faq-edit-form]');
let ques = document.querySelector('textarea[name=question]');
let ans = document.querySelector('textarea[name=answer]');
let ansEditor = CKEDITOR.instances['answer'];
for(let i=0; i<categories.options.length; i++){
    if(categories.options[i].value == catFaq){
        categories.options[i].selected = "true";
        break
    }
}

function updateFaq(e){
    e.preventDefault();
    if(ques.value=="" || ansEditor.getData().trim() === ""){
        alert('Question or Answer is missing');
        ques.style.border = "1px solid red";
        ansEditor.container.$.style.border = "1px solid red";
    }
    else{
        editFaqForm.submit();
    }
}
