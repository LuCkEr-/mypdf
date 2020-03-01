function login() {
    // APPEND FORM DATA
    let data = new FormData();
    data.append('req', 'in');
    data.append('email', document.getElementById("login-email").value);
    data.append('password', document.getElementById("login-password").value);

    // INIT AJAX
    let xhr = new XMLHttpRequest();
    xhr.open('POST', "ajax-login.php", true);

    // WHEN THE PROCESS IS COMPLETE
    xhr.onload = function () {
        console.log(this.response);
        if (xhr.status === 404 || xhr.status === 403) {
            alert("Error loading page!");
        } else {
            if (this.response === "OK") {
                window.location.href = "upload.php";
            } else {
                document.getElementById("login-email").classList.add("is-danger");
                document.getElementById("login-password").classList.add("is-danger");
                document.getElementById("login-error").classList.remove("is-hidden");
            }
        }
    };

    // SEND
    xhr.send(data);
    return false;
}

function logout() {
    // APPEND FORM DATA
    let data = new FormData();
    data.append('req', 'out');

    // INIT AJAX
    let xhr = new XMLHttpRequest();
    xhr.open('POST', "ajax-login.php", true);

    // WHEN THE PROCESS IS COMPLETE
    xhr.onload = function () {
        if (xhr.status === 404 || xhr.status === 403) {
            alert("Error loading page!");
        } else {
            if (this.response === "OK") {
                window.location.href = "login.php";
            } else {
                alert("Error signing out");
            }
        }
    };

    // SEND
    xhr.send(data);
}