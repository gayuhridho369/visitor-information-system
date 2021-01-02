const flashData = $('.flash-data').data('flashdata')
if (flashData == 'change-success') {
    Swal.fire({
        icon: 'success',
        title: 'Change Success',
        text: 'Your data has been change',
        showConfirmButton: false,
        timer: 1500
    })
}
if (flashData == 'login-success') {
    Swal.fire({
        icon: 'success',
        title: 'Login Success',
        text: 'Welcome to Movement and Tracking System',
        showConfirmButton: false,
        timer: 1500
    })
}

baseUrl = window.location.origin + '/' + window.location.pathname.split('/')[1] + '/'


$("#logout").click(function () {
    Swal.fire({
        title: 'Logout',
        text: "Are you sure to logout?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#343a40',
        cancelButtonColor: '#868e96',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = baseUrl + 'public_space/logout'
        }
    })
})



