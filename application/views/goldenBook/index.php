<div class="container mt-4">
	<h2 class="mb-4"><?php echo $title; ?></h2>
	<a href="<?php echo base_url(); ?>goldenBook/create" class="filter_form_btn">Ajouter</a>
	<?php  
foreach ($goldenBooks as $book):
        $bookDate = new DateTime($book['b_postDate']);
        $frTime = $bookDate->format('d/m/Y à H:i'); ?>
	<div class="card bookCard p-3 mb-2">
		<h3><?= $book['b_name']; ?> - <span class="goldenBook_date"><?= $frTime ?></span></h3>
		<hr>
		<div class="main">
			<?php echo $book['b_content']; ?>
		</div>
		<div class="cardfooter">
		<div class="btn_suceptible">
			<a href="/deletebook/<?= $book['b_id'] ?>" class="filter_form_btn">Supprimer</a>
		</div>
		</div>
	</div>

	<?php endforeach; ?>
</div>