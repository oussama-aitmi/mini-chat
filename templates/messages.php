<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Tchat</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form action="/Auth/logout" method='post'>
                        <h3 class="panel-title">Connecté en tant que : <?php echo $_SESSION['user']['pseudo'] ?></h3>
                        <input name='logout' id='logout' class='btn btn-link' type="submit" value="Déconnexion" /></form>
                </div>
                <div id='chat_area' class="panel-body">
                    
                </div>
                <div class="panel-footer">
                    <form id='form-message' action="#" method="post">
                        <textarea id = "message" name="message" rows="2" cols="87" placeholder='Enter votre message ici'></textarea>
                        <input id='envoyer-message' class='btn  btn-primary btn-block' type="button" value="Envoyer" name="envoyer" />

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Liste des connectées</div>
                <div id='liste-connecte' class="panel-body">
                    <ul class='list-group'>
                        <?php foreach ($listConnected as $value):?>
                        <li class='list-group-item'><?php echo $value['pseudo'];?></li>
                        <?php endforeach; ?>
                    </ul>
                  
                </div>
            </div>
        </div>
    </div>
</div>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="js/script.js" type="text/javascript"></script>
 </body>
</html>