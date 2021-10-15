<div class="formCenter">

	<h1>Rajoutez-vous à notre Trombinoscope</h1>
	<hr>

	<?php echo validation_errors(); ?>


	<?php echo form_open_multipart('addusercontroller/myform'); ?>

	<div>
	<label for="lastname"></label>
	<input type="text" class="inputname" placeholder="NOM" name="lastname" size="50">
	</div>

	<div>
	<label for="firstname"></label>
	<input type="text" class="inputname" placeholder="PRÉNOM" name="firstname" size="50">
	</div>

	<div>
		<label for="campus"></label>
		<br>
		<select class="selectform" name="campus" id="campus">
			<option value="" selected disabled>Votre campus :</option>
			<option value="amiens">Amiens</option>
			<option value="lehavre">Le Havre</option>
			<option value="noyon">Noyon</option>
			<option value="versailles">Versailles</option>
			<option value="virtuel">Virtuel</option>
		</select>
	</div>

	<div>
		<label for="promo"></label>
		<br>
		<select class="selectform" name="promo" id="promo">
			<option value="" selected disabled>Votre promotion :</option>
			<option value="p1">P1</option>
			<option value="p2">P2</option>
			<option value="p3">P3</option>
			<option value="p4">P4</option>
			<option value="p5">P5</option>
			<option value="p6">P6</option>
			<option value="p7">P7</option>
		</select>
	</div>

	<div>
		<img src="" id="imgPreview" class="imgPreview" alt="">
	</div>

	<div>
		<label for="articleImage" class="filter_form_btn">Sélectionner votre image...</label>
		<input type="file" name="photo" id="articleImage" value="<?php set_value('photo') ?>">
	</div>

	<div class="divbtnsubmit">
		<input type="submit" value="Envoyer" name="adduserbtn" class="filter_form_btn">
	</div>

	</form>