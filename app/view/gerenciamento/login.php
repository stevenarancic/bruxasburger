<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'app/view/structure/head.php' ?>

    <title>Login - Gerenciamento</title>
</head>

<body>
    <section class="container" style="height: 100vh">
        <h1 class="p-5 d-flex justify-content-center">
            Login
        </h1>
        <form action="../../controller/usuarios/login.php" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" placeholder=" " name="login">
                <label for="floatingInput">Login</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" placeholder=" " name="senha">
                <label for="floatingPassword">Senha</label>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </section>
</body>

</html>