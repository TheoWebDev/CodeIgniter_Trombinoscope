<div class="container mt-4">
    <h2 class="mb-4"><?php echo $title; ?></h2>

    <?php echo validation_errors(); ?>

    <?php echo form_open('goldenBook/create'); ?>

        <div class="mb-3">
            <label for="name" class="form-label">Nom / Prénom :</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Commentaire :</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>