<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>chat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Bienvenue sur le Mini Chat</h1>
            <div class="account-wall">
                <form id="form-signin" class="form-signin" action="/auth/login" method="post" name="signin">
                    <input name='pseudo' type="text" class="form-control" placeholder="pseudo" required autofocus>
                    <input name='password' type="password" class="form-control" placeholder="Mot de passe" required>
                    <input name='envoyer' value='Envoyer' class="btn btn-lg btn-primary btn-block" type="submit">
                </form>
            </div>
            <div>
                <?php if(isset($_SESSION['errors'])): ?>
                <ul>
                    <?php foreach ($_SESSION['errors'] as $key => $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; unset($_SESSION['errors']); ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
