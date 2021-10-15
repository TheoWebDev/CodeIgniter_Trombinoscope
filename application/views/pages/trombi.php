<h1>Trombinoscope des étudiants</h1><hr>

<form action="/trombi" method="get" class="filter_form">
    <h2 class="filter_title">Trier par :</h2>
    
    <div>
        <label for="filter1">Campus :</label>
        <br>
        <select name="filter1" id="filter1">
            <option value="" selected disabled>-- Choisissez un campus --</option>
            <?php foreach ($campus as $campus) {
                $value = strtolower($campus->u_campus);
                $value = str_replace(' ', '', $value); ?>

                <option value="<?= $value ?>"><?= $campus->u_campus == 'lehavre' ? 'Le Havre' : ucfirst($campus->u_campus) ?></option>
            <?php } ?>
        </select>
    </div>
        
    <div>
        <label for="filter2">Promo :</label>
        <br>
        <select name="filter2" id="filter2">
            <option value="" selected disabled>-- Choisissez une promo --</option>
            <?php foreach ($promo as $promo) {
                $value = lcfirst($promo->u_promo);
                $value = str_replace(' ', '', $value); ?>

                <option value="<?= $value ?>"><?= ucfirst($promo->u_promo) ?></option>
            <?php } ?>
        </select>
    </div>

    <div>
        <input type="submit" value="Valider" class="filter_form_btn">
        <?php if (isset($_GET) && !empty($_GET)) { ?>
            <a href="/trombi" class="filter_form_btn">Annuler</a>
        <?php } ?>
    </div>
</form>

<div class="trombi_container">
    <?php foreach ($users as $user) : ?>
        <div class="user_container">
            <img src="../public/img/<?= $user->u_photo ?>" alt="<?= $user->u_photo ?>" class="trombi_photo">
            <p><?= $user->u_firstname ?> <b><?= strtoupper($user->u_lastname) ?></b></p>
            <p>Campus : <?= $user->u_campus == 'lehavre' ? '<b>Le Havre</b>' : '<b>' . ucfirst($user->u_campus) . '</b>' ?></p>
            <p>Promo : <?= '<b>' . ucfirst($user->u_promo) . '</b>' ?></p>
            <a href="/deleteuser/<?= $user->u_id ?>" class="filter_form_btn">Supprimer</a>
        </div>
    <?php endforeach; ?>
</div>