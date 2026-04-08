function al_cross_img(){
    document.getElementById("al_main_container").style.display="none";
}

function al_getData(){
    var al_un = document.getElementById("al_un_text").value;
    if(al_un.trim()==""|| al_un==null || al_un==undefined){

        document.getElementById("al_un_error").innerHTML="Please Enter user name"
    }
    else{
        document.getElementById("al_un_error").innerHTML=" "
    }

    var al_password = document.getElementById("al_password_text").value;
    if(al_password.trim()==""|| al_password==null || al_password==undefined){

        document.getElementById("al_password_error").innerHTML="Please Enter Password"
    }
    else{
        document.getElementById("al_password_error").innerHTML=" "
    }
}
