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

    #homelogin {
        position: fixed;
        bottom: 3%;
        left: 2%;
        width: 4em;
        background: url("img/menu.png") no-repeat;
    }

    #homelogin:hover {
        position: fixed;
        bottom: 3%;
        left: 2%;
        width: 4.5em;
        color: antiquewhite;
        background: url("img/hovermenu.png") no-repeat;
    }
</style>

<body>
    <header>
        <a href="loginpage.php">
        <input type="image" id="homelogin" src="img/menu.png"/></a>
    </header>
    <main>
        <div class="container mt-5 p-3 align-items-center">
            <div id="liveAlertPlaceholder" style="width: 60vw; margin-left: auto; margin-right: auto;"></div>
            <div class="card p-3" style="width: 60vw; margin-left: auto; margin-right: auto;">
                <div class="container text-center mt-3">
                    <h1><strong>Register Account</strong></h1>
                </div>
                <div class="container mt-3">
                    <form id="register" method="POST">
                        <input type="hidden" name="_method" value="ADD">
                        <div class="row">
                            <div class="col">
                                <label for="username" class="form-label">Username</label>
                                <input type="email" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
                        <input type="hidden" name="_method" value="ADD">
                        <div class="row">
                            <div class="col">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="password2" class="form-label">Re-type Password</label>
                                <input type="password" name="password2" id="password2" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" name="firstname" id="firstName" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" name="lastname" id="lastName" class="form-control" required>
                            </div>
                        </div>

                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address" class="form-control" required>

                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="number" name="phone" id="phone" class="form-control" required>

                        <div class="d-grid gap-2 mt-3 mb-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#register').submit(function(e) {
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
                            alert('Berhasil Mendaftar, Silahkan Login Kembali', 'success');
                            $(body).fadeOut(1000);
                            setTimeout(function() {
                                location = 'loginpage.php';
                            }, 2000)
                        } else {
                            alert('Gagal Mendaftarkan Akun!', 'danger');
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