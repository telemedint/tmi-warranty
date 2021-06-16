var category_serial = document.getElementById('category_serial'),
    selected_category = document.getElementById('category'),
    second_serial = document.getElementById('serial_second'),
    first_serial = document.getElementById('serial_first'),
    full_serial = document.getElementById('full_serial');
    

selected_category.onchange = function (){
    "use strict";
    category_serial.value = selected_category.value;
    full_serial.value = category_serial.value + "-" + second_serial.value+ "-" + first_serial.value;
}

first_serial.onkeyup = function (){
    "use strict";
    full_serial.value = category_serial.value + "-" + second_serial.value+ "-" + first_serial.value;
}

second_serial.onkeyup = function (){
    "use strict";
    full_serial.value = category_serial.value + "-" + second_serial.value+ "-" + first_serial.value;
}