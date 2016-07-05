<!-- Zur Erstellung von Facebook Share Button
Quelle Facebook for Developers, Facebook-SDK für JavaScript
https://developers.facebook.com/docs/javascript-->


<script>
window.fbAsyncInit = function() {
    FB.init({
      appId      : 'your-app-id',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

