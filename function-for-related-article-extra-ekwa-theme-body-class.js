//check related articles available or not
document.addEventListener('DOMContentLoaded', function () {
        var hasItems = document.querySelectorAll('.ekwa-carousel-item').length > 0;

        if (!hasItems) {
          document.body.classList.add('ekwa-no-related-articles');
        }else{
             document.body.classList.add('ekwa-with-related-articles');  
        } 
      }); 
