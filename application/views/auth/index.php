<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg-4 border p-4 rounded">
			<h3>Login</h3>
			<form action="<?= base_url('auth/index'); ?>" method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" id="username" class="form-control" name="username" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" class="form-control" name="password" required>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>