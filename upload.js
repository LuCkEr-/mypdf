function onFileSelected(obj) {
    if (obj.files.length > 0) {
        const fileName = document.querySelector('#file .file-name');
        fileName.textContent = obj.files[0].name;

        if (obj.files[0].type === "application/pdf") {
            fileValid();
        } else {
            fileInvalid();
        }
    }
}

function upload() {
    document.getElementById("upload-submit").classList.add("is-loading");

    // APPEND FORM DATA
    let data = new FormData();
    data.append('file', document.getElementById("file-input").files[0]);

    // INIT AJAX
    let xhr = new XMLHttpRequest();
    xhr.open('POST', "ajax-upload.php", true);

    // WHEN THE PROCESS IS COMPLETE
    xhr.onload = function () {
        document.getElementById("upload-submit").classList.remove("is-loading");

        if (xhr.status === 404 || xhr.status === 403) {
            document.getElementById("upload-error").innerHTML = "Error loading page";
        } else {
            if (this.response === "OK") {
                resetForm();
            } else if (this.response === "INVALID") {
                fileInvalid();
            } else {
                fileInvalid();
                document.getElementById("upload-error").innerHTML = "Upload failed";
            }
        }
    };

    // SEND
    xhr.send(data);
    return false;
}

function fileValid() {
    document.getElementById("file").classList.remove("is-danger");
    document.getElementById("file").classList.add("is-success");

    document.getElementById("upload-error").classList.add("is-hidden");

    document.getElementById("upload-submit").disabled = false;
}

function fileInvalid() {
    document.getElementById("file").classList.remove("is-success");
    document.getElementById("file").classList.add("is-danger");

    document.getElementById("upload-error").innerHTML = "Only PDF files are supported";
    document.getElementById("upload-error").classList.add("is-danger");
    document.getElementById("upload-error").classList.remove("is-success");
    document.getElementById("upload-error").classList.remove("is-hidden");

    document.getElementById("upload-submit").disabled = true;
}

function resetForm() {
    document.getElementById("upload-form").reset();

    document.getElementById("file").classList.remove("is-danger");
    document.getElementById("file").classList.remove("is-success");

    document.getElementById("upload-error").innerHTML = "Upload successful";
    document.getElementById("upload-error").classList.add("is-success");
    document.getElementById("upload-error").classList.remove("is-danger");
    document.getElementById("upload-error").classList.remove("is-hidden");

    document.querySelector('#file .file-name').textContent = "Choose a file";

    document.getElementById("upload-submit").disabled = true;
}