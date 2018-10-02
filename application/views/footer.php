</body>
<script>
    $('#fileInput').on('change',function(){
        var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
<footer class="footer">
<hr>
	<div class="card-group">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title text-center">Contact Us</h5>
				<div class="card-text text-center">Rizki</div>
				<div class="card-text text-center">&#9742; +62 023423234</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<h5 class="card-title text-center">Our location</h5>
				<p class="card-text text-center">Jl. Telekomunikasi - Ters. Buah Batu, Bandung 40257 Indonesia.</p>
				<hr>
				<p class="card-text text-center text-muted">Copyright&copy;Boutique - Bandung</p>

			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<h5 class="card-title text-center">Social media</h5>
				<p class="card-text text-center"><i class="fa fa-facebook-official" style="font-size:30px"></i> <i
						class="fa fa-twitter" style="font-size:30px"></i> <i class="fa fa-google-plus-official"
																			 style="font-size:30px"></i></p>
			</div>
		</div>
	</div>
</footer>
</html>