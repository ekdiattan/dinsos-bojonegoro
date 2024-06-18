document.addEventListener('DOMContentLoaded', function() 
{
  if (typeof(sessionStorage) !== "undefined") {
    var successMessage = sessionStorage.getItem('success');
    var errorMessage = sessionStorage.getItem('error');
    if (successMessage) {
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: successMessage,
        confirmButtonText: 'OK'
      });
      sessionStorage.removeItem('success');
    }
    if (errorMessage) {
      Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: errorMessage,
        confirmButtonText: 'OK'
      });
      sessionStorage.removeItem('error');
    }
  }
});

