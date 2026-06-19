function togglePassword(){
    let pass = document.getElementById("password");

    if(pass.type === "password"){
        pass.type = "text";
    }else{
        pass.type = "password";
    }
}

/* loading effect */
document.addEventListener("DOMContentLoaded", function(){

    let loginBtn = document.getElementById("loginBtn");

    if(loginBtn){
        loginBtn.addEventListener("click", function(){

            this.innerHTML = "Logging in...";
            this.style.opacity = "0.7";

        });
    }

});


function toggleSidebar(){
    const sidebar = document.getElementById("sidebar");

    sidebar.classList.toggle("active");
}


const counters = document.querySelectorAll('.count');

counters.forEach(counter => {
    const update = () => {
        const target = +counter.getAttribute('data-value');
        const current = +counter.innerText;

        const step = Math.ceil(target / 25);

        if(current < target){
            counter.innerText = current + step;
            setTimeout(update, 40);
        } else {
            counter.innerText = target;
        }
    };
    update();
});