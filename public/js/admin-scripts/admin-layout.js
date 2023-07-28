/* Name click js */ 
document.getElementById('name-admin').addEventListener('click',()=>{
    let nameBox = document.getElementById('name-box');
    if(nameBox.style.display == "none"){
        nameBox.style.display = "block";
    }
    else{
        nameBox.style.display = "none";
    }
})

/* for side bar */

const outerList = document.querySelectorAll(".outer-li");

function hideOtherLists(currentList) {
    document.querySelectorAll(".side-list-hide").forEach((elem) => {
    if (elem !== currentList && elem.style.display === "block") {
        elem.style.display = "none";
    }
    });
}

outerList.forEach((list) => {
    list.addEventListener("click", () => {
    let innerList = list.firstElementChild.nextElementSibling;
    hideOtherLists(innerList);

    if (innerList.style.display === "block") {
        innerList.style.display = "none";
    } else {
        innerList.style.display = "block";
    }
    });
});
  