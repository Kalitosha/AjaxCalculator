﻿var inputValue;
//var url = "http://localhost::3000/server.js";
var url = "http://127.0.0.1:3000"; //'http://localhost:3000'; 
var maxSize = 17;

function ajaxPost(url, params, callback) {
    var f = callback || function (data) { };

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {             
            f(JSON.parse(request.responseText)); // JSON.parse превращает json в js объект
        }
    }
    request.open('POST', url);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');    
    params = JSON.stringify({'data': params});
    console.log("data=" + params);   
    request.send(params);
    //request.send("data=" + params);
}
  
function clic(number) { // срабатывает по клику на цифру
    var window_calc = document.querySelector("#window_calc");
    if (window_calc.textContent.length < maxSize) {
        if (window_calc.textContent != 0) {
            window_calc.textContent += number;
            inputValue = '' + inputValue + number;
            znak = false;
        }
        else {
            window_calc.textContent = number;
            inputValue = number;
            znak = false;
        }        
    }  
    ajaxPost(url, inputValue, function(data){ console.log("request=" + data);  document.querySelector("#window_result").textContent = data.data; });
}

var znak = false; 
function operation(operator){  // срабатывает по клику на знак
    var window_calc = document.querySelector("#window_calc");

    if (window_calc.textContent.length < maxSize) {
        if (window_calc.textContent != 0 && znak == false) {
            inputValue += operator;
            window_calc.textContent += operator;
            znak = true;
        }
    }
    //ajaxPost(url , inputValue, function(data){ document.querySelector("#window_result").textContent = data.data; });
}

function clear_all(){
    document.querySelector("#window_calc").textContent = '';
    document.querySelector("#window_result").textContent = '0';
}

/*
var elem = document.getElementById("window_result");
var elem2 = document.querySelector("#window_calc"); // "window_calc>result, .result"
console.log("elem = " + elem);
console.log("elem2 = " + elem2);
elem.style.backgroundColor = 'red';
elem2.style.backgroundColor = 'blue';
*/