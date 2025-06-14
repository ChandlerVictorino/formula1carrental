<!DOCTYPE html>
<html>
<head>
    <title>Create Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        h2 {
            font-weight: bold;
            margin-bottom: 30px;
        }
        .btn-create {
            background-color: #157347;
            color: white;
        }
        .btn-create:hover {
            background-color: #146c43;
        }
        .input-group-text {
            background-color: #fff;
            border-left: none;
        }
        .eye-icon {
            font-size: 0.9rem;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Create New Admin</h2>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('superadmin/store_admin'); ?>" enctype="multipart/form-data">
        <!-- CSRF Token -->
        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
               value="<?= $this->security->get_csrf_hash(); ?>"/>

        <div class="mb-3">
            <label for="admin_name" class="form-label">Admin Name</label>
            <input type="text" class="form-control" id="admin_name" name="admin_name" required>
        </div>

        <div class="mb-3">
            <label for="admin_username" class="form-label">Username</label>
            <input type="text" class="form-control" id="admin_username" name="admin_username" required>
        </div>

        <div class="mb-3">
            <label for="admin_password" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="admin_password" name="admin_password" required>
                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                    <i class="fas fa-eye eye-icon" id="eyeIcon"></i>
                </span>
            </div>
        </div>

        <div class="mb-3">
            <label for="admin_image" class="form-label">Profile Image (Max 1MB)</label>
            <input type="file" class="form-control" id="admin_image" name="admin_image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-create">Create Admin</button>
        <a href="<?= base_url('superadmin/dashboard'); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- FontAwesome + Script -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('admin_password');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        eyeIcon.classList.toggle('fa-eye');
        eyeIcon.classList.toggle('fa-eye-slash');
    });
</script>

</body>
</html>
