CKEDITOR.replace('description');

let cat = document.getElementById('cat');
let subcat = document.getElementById('subcat');

cat.addEventListener('change', () => {
    document.getElementById('subcat-row').style.visibility = "visible";
    subcat.options[0].selected = true;

    for (let i = 0; i < subcat.options.length; i++) {
        if (cat.value == subcat.options[i].dataset.parent) {
            subcat.options[i].style.display = "block";
            document.getElementById('null-opt').style.display = "none";
        } else {
            subcat.options[i].style.display = "none";
            if (subcat.options[i].value === "null") {
                subcat.options[i].style.display = "block";
            }
        }
    }
});