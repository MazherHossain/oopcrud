
(function($){
  
  $(document).ready(function(){
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    $('input[name="photo"]').change(function(e){
      let file_url = URL.createObjectURL(e.target.files[0]);
      $('img#preview').attr('src', file_url);
    });//Preview for the photo
    
});

})(jQuery)
