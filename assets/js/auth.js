const flashData = $('.flash-data').data('flashdata')

if (flashData == 'registration-success') {
    Swal.fire({
        icon: 'success',
        title: 'Registration Success',
        text: 'Check your email to activation account',
        confirmButtonColor: '#343a40'
    })
}
if (flashData == 'activation-success') {
    Swal.fire({
        icon: 'success',
        title: 'Activation Success',
        text: 'Your account has been actived',
        confirmButtonColor: '#343a40'
    })
}
if (flashData == 'activation-error') {
    Swal.fire({
        icon: 'error',
        title: 'Activation Error',
        text: 'Something is wrong!',
        confirmButtonColor: '#343a40'
    })
}
if (flashData == 'not-registered') {
    Swal.fire({
        icon: 'error',
        title: 'Login Failed',
        text: 'Account is not registered!',
        confirmButtonColor: '#343a40'
    })
}
if (flashData == 'not-actived') {
    Swal.fire({
        icon: 'error',
        title: 'Login Failed',
        text: 'Account has not been actived!',
        confirmButtonColor: '#343a40'
    })
}
if (flashData == 'wrong-password') {
    Swal.fire({
        icon: 'error',
        title: 'Login Failed',
        text: 'Password is wrong!',
        confirmButtonColor: '#343a40'
    })
}
if (flashData == 'logout-success') {
    Swal.fire({
        icon: 'success',
        title: 'Logout',
        text: 'You has been logout',
        showConfirmButton: false,
        timer: 1500
    })
}