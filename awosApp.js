// JS for the dynamism of the page
var attempt = 3;
var demo = prompt("Enter your awosApp login ticket: ");
const ticket = 1524;
// var attempt = 3;

if (demo == ticket){
    alert("Welcome to this page, please click Ok button to continue!");
    
}
else{
     attempt --;
        alert("You have left " + attempt + " attempt");

         if (attempt == 0){
         demo.disabled = true;
        
    alert("You're entering wrong ticket number!");
    
}
}

// for form input
var input1 = document.getElementById("name1").value;
    function myOutput(){
        document.getElementById("content").innerHTML = input1;
    }
    