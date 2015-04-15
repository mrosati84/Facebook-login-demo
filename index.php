<?php require __DIR__.'/settings.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook PHP</title>
</head>
<body>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '<?php echo $appId ?>',
                xfbml      : true,
                version    : 'v2.3'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        function testApi() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open('POST', '/api.php', true);
            xmlhttp.send(FB.getAccessToken());

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    alert(xmlhttp.responseText);
                }
            };
        }

        function facebookLogin() {
            FB.login(function(response) {
                if (response.authResponse) {
                    FB.api('/me', function(response) {
                        alert('Good to see you, ' + response.name + '.');
                    });
                } else {
                    alert('User cancelled login or did not fully authorize.');
                }
            });
        }

        function facebookLogout() {
            FB.getLoginStatus(function(status) {
                if (status.status == 'connected' && status.authResponse != null) {
                    FB.logout(function() {
                        location.reload();
                    });
                }
            });
        }

        window.onload = function() {
            FB.getLoginStatus(function(status) {
                if (status.status == 'connected' && status.authResponse != null) {
                    alert('Connected with Facebook.');
                } else {
                    alert('Not connected to Facebook');
                }
            });
        };
    </script>

    <h1>Test Login Facebook</h1>

    <div>
        <button onclick="facebookLogin();">Facebook Login</button>
        <button onclick="facebookLogout();">Facebook Logout</button>
        <button onclick="testApi();">Test API backend</button>
    </div>

</body>
</html>