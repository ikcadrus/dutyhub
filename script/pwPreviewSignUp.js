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

function emailCheck(){

    var emailInput = document.querySelector(".email-control");
    var emailConstruction = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var email = document.getElementById("floating-email");

    if (emailConstruction.test(email.value)) {
        email.classList.remove('is-invalid');
        email.classList.add('is-valid');
    } else {
        email.classList.remove('is-valid');
        email.classList.add('is-invalid');
    }
    
}

function whenEmailEmpty(){

    var email = document.getElementById("floating-email");
    if (email.value.length === 0) {
        email.classList.remove('is-valid');
        email.classList.add('is-invalid');
    }
}

function usernameCheck(){

    var username = document.getElementById("floating-username");

    if(username.value.length >= 6 && username.value.length <= 30 && (username.value.match(/^[a-zA-Z0-9]+$/))){
        username.classList.remove('is-invalid');
        username.classList.add('is-valid');
    } else {
        username.classList.remove('is-valid');
        username.classList.add('is-invalid');
    }

}

function whenUsernameEmpty(){

    var username = document.getElementById("floating-username");
    if (username.value.length === 0) {
        username.classList.remove('is-valid');
        username.classList.add('is-invalid');
    }
}

function passwordCheck(){

    var password = document.getElementById("floating-password");
    var button = document.getElementById('btn-password');

    if(password.value.length >= 8 && password.value.length <= 30 && password.value.match(/[a-z]/) && password.value.match(/[A-Z]/) && password.value.match(/[0-9]/) && password.value.match(/[@\#\$\%\^\&\(\)\_\-\+\=\?\>\<\.\,\!]/)){
        password.classList.remove('is-invalid');
        password.classList.add('is-valid');
        button.style.border = '1px solid #198754';
        button.style.boxShadow = 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(25, 135, 84, 0.6)';
    
    } else {
        password.classList.remove('is-valid');
        password.classList.add('is-invalid');
        button.style.border = '1px solid #ff0000';
        button.style.boxShadow = 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)';
    }

}

function whenPasswordEmpty(){

    var password = document.getElementById("floating-password");
    var button = document.getElementById('btn-password');
    if (password.value.length === 0) {
        password.classList.remove('is-valid');
        password.classList.add('is-invalid');
        button.style.border = '1px solid #ff0000';
        button.style.boxShadow = 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)';
    }
}

function repasswordCheck(){

    var password = document.getElementById("floating-password");
    var repassword = document.getElementById("floating-repassword");
    var button = document.getElementById('btn-repassword');

    if(password.value === repassword.value){
        repassword.classList.remove('is-invalid');
        repassword.classList.add('is-valid');
        button.style.border = '1px solid #198754';
        button.style.boxShadow = 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(25, 135, 84, 0.6)';
    
    } else {
        repassword.classList.remove('is-valid');
        repassword.classList.add('is-invalid');
        button.style.border = '1px solid #ff0000';
        button.style.boxShadow = 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)';
    }

}

function whenRePasswordEmpty(){

    var repassword = document.getElementById("floating-repassword");
    var button = document.getElementById('btn-repassword');
    if (repassword.value.length === 0) {
        repassword.classList.remove('is-valid');
        repassword.classList.add('is-invalid');
        button.style.border = '1px solid #ff0000';
        button.style.boxShadow = 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)';
    }
}

function onSubmit() {     
    document.getElementById("form-register").submit();
}
