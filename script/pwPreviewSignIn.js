function showHidePasswordSignIn(){

    let icon = document.getElementById("eye0").toggleAttribute("bi-eye-slash-fill");

    const password = document.getElementById('floating-password-signin');
    const toggle = document.getElementById("eye0");

    if(password.type === 'password'){
        password.setAttribute('type', 'text');
        toggle.classList.add('hide');
    }else{
        password.setAttribute('type', 'password');
        toggle.classList.remove('hide');
    }
}

function changeIconSignIn(){
    let icon = document.getElementById("eye0");
    icon.classList.toggle("bi-eye-slash-fill");
}
