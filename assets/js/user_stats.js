$(document).ready(function(){
  user_stats();
  
  function user_stats() {
    $.ajax({
        url:"assets/includes/user_stats.php",
        method:"GET",
        cache: false,
        dataType:"json",
        success:function(data) {
          $('.total_uploads').html(data.total_uploads);
          $('#total_downloads').html(data.total_downloads);
          $('#total_views').html(data.total_views);
        }
      });
  }

  setInterval(function(){ 
    user_stats();
  }, 1000);
});