const html = '<div class="alert alert-danger alert-dismissible fade show" role="alert">\n' +
    '[WARNING] Place must be take part in future!\n' +
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
    '<span aria-hidden="true">&times;</span>\n' +
    '</button>\n' +
    '</div>';

function checkEndDate(){
    var today = new Date();

    var date = new Date(document.getElementById("edate").value);
    var time = document.getElementById("etime").value;
    setTime(date,time);

    var date2 = new Date(document.getElementById("bdate").value);
    time = document.getElementById("btime").value;
    setTime(date2,time);

    console.log(compareDate(date2,date));

    if(compareDate(today,date) || compareDate(date2,date)){
        document.getElementById('alertDate').innerHTML= html;
        document.getElementById('acceptButton').disabled = true;
    }
    else{
        document.getElementById('acceptButton').disabled = false;
    }

}

function checkStartDate(){
    var today = new Date();

    var date = new Date(document.getElementById("bdate").value);
    var time = document.getElementById("btime").value;
    setTime(date,time);

    if(compareDate(today,date)){
        document.getElementById('alertDate').innerHTML= html;
        document.getElementById('acceptButton').disabled = true;
    }
    else{
        document.getElementById('acceptButton').disabled = false;
    }

}

function compareDate(today,date){
    return today>date;
}

function setTime(date,hour){
    hour = hour.split(":");
    date.setHours(hour[0]);
    date.setMinutes(hour[1]);
}