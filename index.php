<?php

include '../../Controller/LivraisonC.php';
require_once '../../Model/livraison.php';

$livC = new LivraisonC();
$listeLiv = $livC->afficherliv();
if (isset($_REQUEST['add'])) {
  $livraison = new livraison(0, $_POST['prix'],$_POST['nom'],0);
  $livC->ajouterlivraison($livraison);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=>, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
          <input type="text"id = "reference" name="reference" placeholder="entrer votre reference"> 
          <br> <br>
          <select  id="prix" name = "prix">
            <option>Livraison</option>
            <option value="7" >7 TND(1 day)</option>
            <option value="0" >FREE (4 days) </option>

          </select>
          <br> <br>
          <input type="text" name="nom" id = "nom" placeholder="entrer votre nom"> 
          <br> <br>
          
          <button type="submit" name="add">Envoyer</button>
    </form>
    <div>
                    <table >
                      <thead>
                        <tr>
                          <th>
                            Reference
                          </th>
                          <th>
                            prix
                          </th>
                          <th>
                            nom
                          </th>
                          <th>
                            Date
                          </th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listeLiv as $key) {
                        ?>
                          <tr>
                            <td>
                              <?php echo $key['Reference']; ?>
                            </td>
                            <td>
                              <?php echo $key['prix']; ?>
                            </td>
                            <td>
                              <?php echo $key['Nom']; ?>
                            </td>
                            <td>
                              <?php echo $key['date']; ?>
                            </td>
                            <td>
                              <a href="supprimerlivraison.php?ref=<?php echo $key['Reference']; ?>">
                                <button type="button">Supprimer</button>
                            </td>
                            </a>

                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
</body>
</html>