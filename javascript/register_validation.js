function check_pass() {
    var passwordChecker = document.getElementById('password').value;
    var fname = document.getElementById('firstName').value;
    var lname = document.getElementById('lastName').value;
    if(passwordChecker.trim().length<5 || passwordChecker.trim().length>15){
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Password is either to small or too long. Try between 5 and 15 characters';
    }else{
        if(passwordChecker.search(fname.toLowerCase())!=-1 || passwordChecker.search(lname.toLowerCase())!=-1 ){
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'You cannot include your FirstName or LastName in your password';

        }else{

            if (document.getElementById('password').value ==
                document.getElementById('confirmPassword').value) {
                document.getElementById('signup').disabled = false;
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Password matching';
            } else {
                document.getElementById('signup').disabled = true;
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Passwords not matching';

            }
        }
    }

}
function check_username(){
    var usernameChecker = document.getElementById('userName').value;

    if(!/^[a-zA-Z0-9]*$/.test(usernameChecker)){

        document.getElementById('messageU').style.color = 'Red';
        document.getElementById('messageU').innerHTML = 'Username must contain only letters and digits';
        document.getElementById('signup').disabled = true;
    }else{
        document.getElementById('signup').disabled = false;
    }

}

function change_status() {
    var status = document.getElementById('userType').value;
    if(status.trim().toLowerCase()=='student'){

        document.getElementById('student').style.display="block";
        document.getElementById('teacher').style.display="none";
    }else{
        document.getElementById('teacher').style.display="block";
        document.getElementById('student').style.display="none";

    }

}
