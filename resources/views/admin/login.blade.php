<!-- resources/views/admin/login.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Login Processing</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="preloader">Loading...</div>
    <div id="response"></div>

    <script>
        function getLoginToken(callback) {
            $.get('https://moodle.eduteku.com/login/index.php', function(data) {
                setTimeout(function() {
                    var matches = /<input type="hidden" name="logintoken" value="([^"]+)"/.exec(data);
                    console.log("info: " + matches);

                    var token = '';

                    if (matches) {
                        token = matches[1];
                    } else {
                        token = "Nn";
                    }

                    callback(token);
                }, 1000);
            });
        }

        getLoginToken(function(token) {
            if (token == 'Nn') {
                window.location.href = 'https://moodle.eduteku.com/my/';
            } else {
                var userData = {
                    username: "{{ $email }}",
                    password: "{{ $password }}",
                    logintoken: token
                };

                $.ajax({
                    type: "POST",
                    url: "https://moodle.eduteku.com/login/index.php",
                    data: userData,
                    success: function(response) {
                        $('#preloader').hide();
                        if (response.includes('Datos erróneos. Por favor, inténtelo otra vez')) {
                            $('#response').text('Error de autenticación, comunícate con soporte técnico (Versión BETA).');
                        } else {
                            window.location.href = 'https://moodle.eduteku.com/my/';
                        }
                    },
                    error: function() {
                        $('#preloader').hide();
                        $('#response').text('Error de autenticación');
                    }
                });
            }
        });
    </script>
</body>
</html>
