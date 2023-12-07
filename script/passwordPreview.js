function showHidePassword(){

    let icon = document.getElementById("eye").toggleAttribute("bi-eye-slash-fill");

    const password = document.getElementById('floating-password');
    const toggle = document.getElementById("eye");

    if(password.type === 'password'){
        password.setAttribute('type', 'text');
        toggle.classList.add('hide');
    }else{
        password.setAttribute('type', 'password');
        toggle.classList.remove('hide');
    }
}

function changeIcon(){
    let icon = document.getElementById("eye");
    icon.classList.toggle("bi-eye-slash-fill");
}

function showHideRePassword(){

    let icon = document.getElementById("eye2").toggleAttribute("bi-eye-slash-fill");

    const password = document.getElementById('floating-repassword');
    const toggle = document.getElementById("eye2");

    if(password.type === 'password'){
        password.setAttribute('type', 'text');
        toggle.classList.add('hide');
    }else{
        password.setAttribute('type', 'password');
        toggle.classList.remove('hide');
    }
}



function changeIcon2(){
    let icon = document.getElementById("eye2");
    icon.classList.toggle("bi-eye-slash-fill");
}
