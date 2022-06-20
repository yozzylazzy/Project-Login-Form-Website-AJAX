<?php

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<style>
    body {
        background-image: linear-gradient(to right, purple, red);
    }
</style>

<body>
    <header>

    </header>
    <main>
        <div class="container mt-5 p-5 align-items-center" id="maincontent">
            <div id="liveAlertPlaceholder"  style="width: 30em; margin-left: auto; margin-right: auto;"></div>
            <div class="card p-3" style="width: 30em; margin-left: auto; margin-right: auto;">
                <div class="container text-center mt-3">
                    <h1><strong>LOG IN</strong></h1>
                </div>
                <hr>
                <div class="container mt-3">
                    <form id="login" method="POST">
                        <label for="username" class="form-label">Username</label>
                        <input type="email" name="username" id="username" class="form-control" required>
                        <br>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required> 

                        <div class="d-grid gap-3 mt-4 mb-3">
                            <button type="submit" value="login" class="btn btn-primary">Login</button>
                            <a class="btn btn-secondary" href="register.php">Register</a>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="d-grid d-md-flex justify-content-md-end">
                    <a href="#">Forgot Your Password?</a>
                </div>
            </div>
        </div>
    </main>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        let content = document.getElementById('maincontent');

        $(document).ready(function() {
            $('#login').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'controller.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        // try {
                        const jsonData = response;
                        console.log(jsonData);
                        //} catch (err) {
                        // 👇️ This runs
                        //  console.log('Error: ', err.message);
                        // }
                        //let jsonData = JSON.parse(response);
                        //print(jsonData);
                        if (jsonData == "1") {
                            alert('Berhasil Masuk, mohon Tunggu Sebentar', 'success');
                            $(content).fadeOut(3000);
                            setTimeout(function() {
                                location = 'index.php';
                            }, 2000)
                        } else {
                            alert('Username atau Password Salah!!!', 'danger');
                        }
                    }
                })
            })
        })


        let alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        let alertTrigger = document.getElementById('liveAlertBtn')

        function alert(message, type) {
            let wrapper = document.createElement('div')
            wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
            if (alertPlaceholder.hasChildNodes()) {
                alertPlaceholder.removeChild(alertPlaceholder.firstChild);
            } else {

            }
            alertPlaceholder.append(wrapper);
        }

        function deleteMessage() {
            $(alertPlaceholder).fadeToggle(300);
        }
    </script>
</body>

</html>