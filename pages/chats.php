<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $user->pseudo ?></title>
    lin
</head>

<body>


    <?php
    if (!isset($_GET['user']) || isLogged() == 0 || user_exist() != 1) {
        header('Location:index.php?page=home');
    }

    $_SESSION['user'] = $_GET['user'];

    foreach (get_user() as $user) {
    ?>
        <h2 class="header"><?= $user->pseudo ?></h2>
        <div class="messages-box">
            <div class="bottom">
                <div class="field field-area">
                    <label for="" class="field-label">Votre Message</label>
                    <textarea name="message" id="message" rows="2" class="field-label field-textarea"></textarea>
                </div>
                <button type="submit" id="send" class="fas fa-paper-plane"></button>
            </div>
        </div>
    <?php

    }
    ?>
</body>
</html>