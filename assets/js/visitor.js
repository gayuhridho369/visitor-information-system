const flashData = $('.flash-data').data('flashdata')

if (flashData == 'sms-success') {
    Swal.fire({
        icon: 'success',
        title: 'SMS Success',
        text: 'Check your SMS to verify account!',
        confirmButtonColor: '#343a40'
    })
}
if (flashData == 'sms-error') {
    Swal.fire({
        icon: 'error',
        title: 'SMS Failed',
        text: 'Something is wrong!',
        confirmButtonColor: '#343a40'
    })
}
if (flashData == 'checkin-success') {
    Swal.fire({
        icon: 'success',
        title: 'Check In Success',
        text: 'You has been Check In',
        confirmButtonColor: '#343a40'
    })
}
if (flashData == 'checkin-error') {
    Swal.fire({
        icon: 'error',
        title: 'Check In Error',
        text: 'Something is wrong!',
        confirmButtonColor: '#343a40'
    })
}
if (flashData == 'checkout-success') {
    Swal.fire({
        icon: 'success',
        title: 'Check Out Success',
        text: 'You has been Check Out',
        confirmButtonColor: '#343a40'
    })
}
if (flashData == 'checkout-error') {
    Swal.fire({
        icon: 'error',
        title: 'Check Out Error',
        text: 'Something is wrong!',
        confirmButtonColor: '#343a40'
    })
}
if (flashData == 'is-checkin') {
    Swal.fire({
        icon: 'error',
        title: 'Check In Error',
        text: 'Your number has not been Check Out!',
        confirmButtonColor: '#343a40'
    })
}