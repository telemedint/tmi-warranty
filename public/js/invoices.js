var device_serial = document.getElementById('device_serial'),
    purchase_date = document.getElementById('purchase_date'),

    technical_support_chk=document.getElementById('technical_support_chk'),
    technical_support=document.getElementById('technical_support'),
    
    repairing_service_chk=document.getElementById('repairing_service_chk'),
    repairing_service=document.getElementById('repairing_service'),
    
    premium_support_chk=document.getElementById('premium_support_chk'),
    premium_support=document.getElementById('premium_support');


//Technical Support Enable
technical_support_chk.onclick = function(){
    "use strict";
    if(technical_support_chk.checked){
        technical_support.disabled = false;
        technical_support_chk.value=true;
    }
    else{
        technical_support.disabled = true;
        technical_support_chk.value=false;
    }
}

//Repairing Service Enable
repairing_service_chk.onclick = function(){
    "use strict";
    if(repairing_service_chk.checked){
        repairing_service.disabled = false;
        repairing_service_chk.value=true;
    }
    else{
        repairing_service.disabled = true;
        repairing_service_chk.value=false;
    }
}

//Premium Support Enable
premium_support_chk.onclick = function(){
    "use strict";
    if(premium_support_chk.checked){
        premium_support.disabled = false;
        // premium_support_chk.value=true;
    }
    else{
        premium_support.disabled = true;
        // premium_support_chk.value=false;
    }
}

//Purchase Date Change
purchase_date.onchange = function(){
    "use strict";
    var fromDate = purchase_date.value,
        fromDateArr = fromDate.split("-");
    
    var year = parseInt(fromDateArr[0])+1,    
        month = fromDateArr[1],
        day = fromDateArr[2];

    var newDate = year+"-"+month+"-"+day;
    
    if(technical_support_chk) technical_support.value = newDate;
    if(repairing_service_chk) repairing_service.value = newDate;
    if(premium_support_chk) premium_support.value = newDate;
}

