<main class="flex-shrink-0">
	<div class="container">
		<div class="row justify-content-center py-3">
			<div class="col-lg-4 border p-4 rounded">
				<h3>Login Admin</h3>
				<form action="<?= base_url('auth/index'); ?>" method="post">
					<div class="form-group">
						<label for="username"><i class="fas fa-fw fa-user"></i> Username</label>
						<input type="text" id="username" class="form-control" name="username" required>
					</div>
					<div class="form-group">
						<label for="password"><i class="fas fa-fw fa-lock"></i> Password</label>
						<input type="password" id="password" class="form-control" name="password" required>
					</div>
					<div class="form-group text-right">
						<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-sign-in-alt"></i> Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>

<footer class="footer mt-auto  bg-light">
	<div class="container">
		<div class="row my-3">
			<div class="col-lg footer-copyright pt-2 my-auto">
				<h5 class="text-dark">Copyright &copy; 2021 by Andri Firman Saputra</h5>
				<!-- <a class="text-decoration-none text-dark" href="<?= base_url('admin'); ?>"><i class="fas fa-fw fa-user-tie"></i> Admin's Room</a> -->
			</div>
			<div class="col-lg footer-sosial-media my-auto">
				<a class="text-decoration-none mx-2 text-dark" target="_blank" href="https://github.com/hako-975"><i class="fab fa-2x fa-github"></i></a>
				<a class="text-decoration-none mx-2 text-dark" target="_blank" href="https://instagram.com/andri_firman_975"><i class="fab fa-2x fa-instagram"></i></a>
			</div>
		</div>
	</div>
</footer>

<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>