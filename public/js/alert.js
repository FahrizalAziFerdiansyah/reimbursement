// Function Sweet alert
function swal(status, message = null, url = null) {
    if (status == "success") {
        if (message == null) {
            message = "Data saved successfully";
        }
        Swal.fire({
            title: "Saved",
            text: "" + message,
            icon: "success",
        });
    } else if (status == "redirect") {
        Swal.fire({
            title: "Saved",
            text: "" + message,
            icon: "success",
        }).then((okay) => {
            if (okay) {
                window.location.replace(url);
            }
        });
    } else {
        if (message == null) {
            message = "Data saved failed";
        }
        Swal.fire({
            title: "Error",
            text: "" + message,
            icon: "error",
        });
    }
}

var toastMixin = Swal.mixin({
    toast: true,
    icon: "success",
    title: "General Title",
    animation: false,
    position: "top-right",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});
