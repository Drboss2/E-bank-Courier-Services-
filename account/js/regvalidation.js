// JavaScript Document
function emaila(email) {

    if ( email.value == "" || email.lenght == 0 || email.value == " ") {
		email.setCustomValidity("First name most not be empty.");
        document.getElementById("emailErr").style.display = "block";
		document.getElementById("emailErra").style.display = "none";
		document.getElementById("emailErrb").style.display = "none";
		document.getElementById("emailErrc").style.display = "none";
		return false;
    } else {
		if (!/.com/.test(email.value) || !/@/.test(email.value)){
			email.setCustomValidity("Invalid Email Format.");
			document.getElementById("emailErra").style.display = "block";
			document.getElementById("emailErr").style.display = "none";
			document.getElementById("emailErrb").style.display = "none";
			document.getElementById("emailErrc").style.display = "none";
			return false;
		} else {
			
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var resva = xmlhttp.responseText;
				if(!/correct/.test(resva)){
				email.setCustomValidity("");
				document.getElementById("emailErr").style.display = "none";
				document.getElementById("emailErra").style.display = "none";
				document.getElementById("emailErrb").style.display = "none";
				document.getElementById("emailErrc").style.display = "none";
				return true;
				} else {
				email.setCustomValidity("Email already exist");
				document.getElementById("emailErr").style.display = "none";
				document.getElementById("emailErrb").style.display = "block";
				document.getElementById("emailErra").style.display = "none";
				document.getElementById("emailErrc").style.display = "none";
				return false;
				}
            
            } else {
			document.getElementById("emailErr").style.display = "none";
		document.getElementById("emailErra").style.display = "none";
		document.getElementById("emailErrb").style.display = "none";
		document.getElementById("emailErrc").style.display = "block";
			}
        }
        xmlhttp.open("GET","include/email.php?q="+email.value,true);
        xmlhttp.send();
    	}
	}
}
// Change password validation JavaScript Document

function pass(str) {
    if (str.value == "" || str.lenght == 0) {
        str.setCustomValidity("Old password can't be empty.");
		return false;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var resva = xmlhttp.responseText;
				if(/correct/.test(resva)){
		str.setCustomValidity('');
				return true;
				} else {
		str.setCustomValidity("Old password is incorrect.");
		document.getElementById("opass").innerHTML = " Old password is incorrect.";
				return false;
				}
            
            } else {
		str.setCustomValidity("Comfirm password can't be empty.");
			}
        }
        xmlhttp.open("GET","include/cpass.php?q="+str.value,true);
        xmlhttp.send();
    	}
	}

function passworda(password) {
	if ( password.value == "" || password.lenght == 0 || password.value == " ") {
		password.setCustomValidity("Comfirm password can't be empty.");
		return false;
    } else if ( password.length < 6 ) {
		password.setCustomValidity('Password is to short.');
		return false;
    } else {
		if(/\w/g.test(password.value) && /\d/g.test(password.value)){
		password.setCustomValidity('');
		return true;
		} else {
		document.getElementById("password").setCustomValidity('Weak password');
		return false;
		}
    }
}
function passwordca(input) {
        if (input.value != document.getElementById("password").value) {
            input.setCustomValidity('Password comfirmation is incorrect');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }