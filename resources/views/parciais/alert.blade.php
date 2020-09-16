@if (Session::has('error'))    
  <script> 
    Swal.fire({
        icon: 'error',
        title: 'Ooops...',
        text: "{{ Session::get('error') }}",
        confirmButtonText: 'Ok'
      }) 
  </script>    
@endif
@if (Session::has('message'))    
  <script> 
    Swal.fire({
        title: 'Perfeito!',
        text: "{{ Session::get('message') }}",
        icon: 'success',
        confirmButtonText: 'Ok'
      }) 
  </script>    
@endif
