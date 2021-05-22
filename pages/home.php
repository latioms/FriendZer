<?php
if (isLogged() == 0) {
    header('Location:index.php?page=login');
}
$articles = publier_post();
$infos = infos_membre();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/homestyle.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9f37ddf547.js"></script>
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
    <title>FriendSter</title>
</head>

<body>
    <!-- <section id="pageContent" class="Home">
        <main role="main">
            <article>
                <h2>Stet facilis ius te</h2>
                <p>Lorem ipsum dolor sit amet, nonumes voluptatum mel ea, cu case ceteros cum. Novum commodo malorum vix ut. Dolores consequuntur in ius, sale electram dissentiunt quo te. Cu duo omnes invidunt, eos eu mucius fabellas. Stet facilis ius te, quando voluptatibus eos in. Ad vix mundi alterum, integre urbanitas intellegam vix in.</p>
            </article>
            <article>
                <h2>Illud mollis moderatius</h2>
                <p>Eum facete intellegat ei, ut mazim melius usu. Has elit simul primis ne, regione minimum id cum. Sea deleniti dissentiet ea. Illud mollis moderatius ut per, at qui ubique populo. Eum ad cibo legimus, vim ei quidam fastidii.</p>
            </article>
            <article>
                <h2>Ex ignota epicurei quo</h2>
                <p>Quo debet vivendo ex. Qui ut admodum senserit partiendo. Id adipiscing disputando eam, sea id magna pertinax concludaturque. Ex ignota epicurei quo, his ex doctus delenit fabellas, erat timeam cotidieque sit in. Vel eu soleat voluptatibus, cum cu exerci mediocritatem. Malis legere at per, has brute putant animal et, in consul utamur usu.</p>
            </article>
            <article>
                <h2>His at autem inani volutpat</h2>
                <p>Te has amet modo perfecto, te eum mucius conclusionemque, mel te erat deterruisset. Duo ceteros phaedrum id, ornatus postulant in sea. His at autem inani volutpat. Tollit possit in pri, platonem persecuti ad vix, vel nisl albucius gloriatur no.</p>
            </article>
        </main>

    </section> -->
    <div class="corp">

        <!--  la gauche   -->
        <div id="bodyleft">
            <div class="settings">
                        <h4> <em>  <i class="fa fa-cogs" aria-hidden="true"></i> Paramètres et modifications:</em></h4>
                    </div>
                    <div class="settings">
                        Modifier informations:
                        <ul>
                            <li>
                                <span><a href="index.php?page=pseudo">Modifier son Pseudo</a></span>
                            </li>
                            <li>
                                <span><a href="index.php?page=password">Modifier son mot de passe</a></span>
                            </li>
                            <li>
                                <span><a href="index.php?page=changer_avatar">Modifier photo de profil</a></span>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>
      
        <!--    le milieu     -->
        <div class="newsfeed">
         <p class="post" id="poster"><a href="index.php?page=post_photo" class="icon-picture">
                    <strong>Publier quelque chose! </strong></a><br /><br /></p>

            <!-- <div class="publication"> -->

            <?php
            foreach ($articles as $article) {
            ?>
                <div class="card">
                    <div class="picture">
                        <a href="index.php?page=visual_publication&id=<?= $article->id_arts ?>">
                            <img src="./miniature/<?= $article->id_arts ?>.jpg" height="350" >
                        </a>
                    </div>
                    <div class="content">
                        <div class="header">
                            <div class="profile-pic"><img src="avatar/<?= $article->avatar ?>" height="50" width="50" alt="avatar" style="border-radius: 50%" ></div>
                            <div class="detail">
                                <p class="name"> <a href="index.php?page=chat&user=<?= $article->pseudo_post ?>"></a></p>
                                <p class="posted"><?= $article->date_publication ?></p>
                            </div>
                        </div>
                        <div class="desc">
                            <?= $article->contenu ?>
                        </div>
                        <div class="tags">
                            <span>#party</span>
                            <span>#colorful</span>
                        </div>
                        <div class="footer">
                            <div class="like">
                                <i class="fas fa-heart"></i>
                                <span></span>
                            </div>
                            <div class="comment">
                                <i class="fas fa-comment"></i>
                                <span></span>
                            </div>
                            <div class="share">
                                <i class="fas fa-share"></i>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <!--  la droite  -->
        <aside>
                <div class="info">
                    <?php
                    foreach ($infos as $info) {
                    ?>
                        <h2 class="header header-form"><?= $info->pseudo ?></h2><br />
                        <img src="avatar/<?= $info->avatar ?>" width="100" alt="avatar">
                        <p>Email: <span><a href="https://<?= $info->email ?>"><?= $info->email ?></a></span></p>
                        <p>Nom: <span><?= $info->nom ?></span></p>
                        <p>Prenom: <span><?= $info->prenom ?></span></p>
                        <p class="photo"><a href="index.php?page=photos" class="icon-picture" style="color: black;">Photos</a></b></p>
                    <?php
                    }
                    ?>

                </div>
        </aside>
        <script src="./js/2dda698767.js"></script>

    </div>
        
</body>

</html>