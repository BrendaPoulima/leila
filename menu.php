<?php
  $page = 'menu';

  // Inclure l'entête
  include('inclusions/entete.php');

  // Inclure la librairie 'citations'
  include('lib/citations.lib.php');
  // Obtenir une citation aléatoire
  $citation = citationAleatoire($langueChoisie, 'menu');

// Gestion de l'affichage dynamique du menu

// Étape 1 : lire le contenu du fichier dans une chaîne de caractères
// Tester si le fichier existe avant ... 
$menuChaine = file_get_contents("data/menu-$langueChoisie.json");
echo $menuChaine;

// Étape 2 : "décoder" la chaîne JSON pour obtenir un tableau PHP
$menuTableau = json_decode($menuChaine, true);
print_r($menuTableau);

?>
    <div class="contenu-principal">
      <div class="citation">
        <img src="images/menu-citation.jpg" alt="">
        <blockquote>
          <?= $citation['texte']; ?>
          <cite>- <?= $citation['auteur']; ?></cite>
        </blockquote>
      </div>
      <div class="carte">

      <!-- Boucle pour générer dynamiquement les sections du menu-->   
      <?php foreach($menuTableau as $titreSection => $platsSection) : ?>   
        <section>
          <h2><?= $titreSection; ?></h2>
          <ul>

               <!-- Boucle pour générer dynamiquement les plats dans la section de menu courante -->    
               <?php foreach($platsSection as $plat) : ?>
            <li>
              <span><?= $plat['nom']; ?><br><i><?= $plat['desc']; ?></i></span>
              <span class="prix"><i class="article-menu-portion">(2 <?= $mnu_portion; ?>)</i><?= $plat["prix"]; ?></span>
            </li>
            <?php endforeach; ?>
               <!-- Fin de la boucle des plats d'une section -->    

          </ul>
        </section>
        <?php endforeach; ?>
           <!-- Fin de la boucle des sections -->    

      </div>
    </div>
<?php
  // Inclure le pied de page
  include('inclusions/pied2page.php');
?>