var serial = document.getElementById('category_serial'),
    selected_category = document.getElementById('category');

selected_category.onchange = function (){
    "use strict";
    serial.value = selected_category.value;
    serial.innerHTML = selected_category.value;
}