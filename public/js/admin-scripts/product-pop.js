

let popBtn = document.querySelectorAll('.n');
let modals = document.querySelectorAll('.modal');

console.log(popBtn);
popBtn.forEach(element => {
    element.addEventListener('click',()=>{
        //togglePop();
        console.log(element.parentElement.nextElementSibling);
        element.parentElement.nextElementSibling.classList.toggle("active");
    })
});

function togglePop(){
    
//    document.getElementById("modal").classList.toggle("active");
    modals.forEach((modal)=>{
        modal.classList.remove("active");
    })
}