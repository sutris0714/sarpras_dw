<div class="container">
	<div class="jumbotron text-center">
		<h3>Kirim Masukan?</h3>
		<h3>Kami di sini untuk Anda...</h3>
	</div>
	<div style="margin:40px 0">
		<div class="row">
			<div class="col-sm-5">
				<div class="panel-body panel">
					<?php $this::display_page_errors(); ?>
					<h4>Bagikan Info Dengan Kami Melalui Email</h4>
					<hr />
					<form method="post" action="<?php print_link("info/contact"); ?>">
						<div class="form-group">
							<input type="text" class="form-control" required id="name" name="name" placeholder="Nama *">
						</div>

						<div class="form-group">
							<input type="email" class="form-control" required id="email" name="email" placeholder="Email *">
						</div>

						<div class="form-group">
							<textarea class="form-control" id="msg" name="msg" rows="4" required placeholder="Tulis Pesan Anda *"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Kirim</button>
					</form>

				</div>
			</div>

			<div class="col-sm-7">
				<div class="panel panel-body">
					<h4>Cara Lain Untuk Menghubungi Kami:</h4>
					<hr />

					<p>
						<b class="chead"><span class="material-icons">location_on</span>Address | Location</b><br />
						<p class="adr clearfix">
							<span class="adr-group">
								<span class="street-address">Company Location Address</span><br>
								<span class="postal-code">P.O. Box 1111</span><br>
								<span class="country-name">City, Country</span>
							</span>
						</p>
					</p>
					<hr />
					<p>
						<b class="chead"><span class="material-icons">contact_phone</span> Phone</b><br />
						<span class="editContent"> +6281316698414 / (021) 645 9109</span>
					</p>
					<hr />

					<p>
						<b class="chead"><span class="material-icons">email</span> Email</b><br />
						<a href="#" class="editContent">sutris@<?php echo SITE_NAME ?>.com</a>
					</p>
				</div>
			</div>
		</div>
	</div>
	<?php
	if (DEVELOPMENT_MODE) {
	?>
		<small class="text-muted">To edit this file, browse to :- <i>app/view/partials/info/contact.php</i></small>
	<?php
	}
	?>

</div>