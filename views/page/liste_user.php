<div>
    <?php
    $users = isset($users) ? $users :[];
    $num = 1;
    ?>
    <table>
        <tr>
            <th> N°</th>
            <th> Nom </th>
            <th> Prenom </th>
            <th> Email </th>
            <th colspan="2"> Opération </th>
        </tr>
        <?php foreach ($users as $key => $values) : ?>
        <tr>
            <td><?= $num++ ?></td>
            <td><?= $values['nom'] ?></td>
            <td><?= $values['prenom'] ?></td>
            <td><?= $values['email'] ?></td>

            <td><button>
                    <a href="index.php?id=<?= $values['id'] ?>&target=deleteUsers">Supprimer</a>
                </button>
            </td>
            <td>
                <button class="btn_modal">
                    <a href="index.php?id=<?= $values["id"]?>&target=updateUsers">Modifier </a>
                </button>
            </td>
        </tr>
        <?php endforeach ?>
    </table>



    <div id="modal">
        <form action="" method="post">
            <fieldset>
                <legend>FORMULAIRE D'INSCRIPTION</legend>
                <label for="lname">Nom</label>
                <input type="text" name="lname"
                    value="<?php isset($_GET[' value'])? $$_GET['value']['nom']:'' ?>" /><br>

                <label for="fname">Prénom</label>
                <input type="text" name="fname" /><br>

                <label for="email">Email</label>
                <input type="text" name="email" /><br>

                <label for="passwd">Mot de pass</label>
                <input type="password" name="passwd" /><br>

                <label for="confpwd">Confirmation Mot de pass</label>
                <input type="password" name="confpwd" /><br>

                <input type="submit" name="inscrire" value="inscription">

            </fieldset>
        </form>

    </div>
</div>