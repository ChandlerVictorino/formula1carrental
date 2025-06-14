<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(to bottom, #000000, #dc3545);
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .sidebar .logo img {
            width: 50px;
            height: 20px;
        }
        .sidebar a.logout {
            color: white;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
        }
        .sidebar a.logout:hover {
            text-decoration: underline;
        }
        .main-container {
            margin-left: 270px;
            max-width: calc(100% - 270px);
            padding: 40px;
        }
        .container-box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
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

<div class="sidebar">
    <div class="logo">
        <img src="<?= base_url('assets/img/f1logii.png'); ?>" alt="Logo">
    </div>
    <div>
        <a href="<?= base_url('superadmin/change_info_view'); ?>" class="logout">Change Info</a><br>
        <a href="<?= base_url('welcome/logout'); ?>" class="logout">Logout</a>
    </div>
</div>

<div class="main-container">
    <div class="container-box">
        <h2 class="mb-4">Change Super Admin Info</h2>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('superadmin/update_info') ?>">
            <!-- CSRF token -->
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

            <div class="mb-3">
                <label for="admin_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="admin_name" name="admin_name" 
                       value="<?= set_value('admin_name', $superadmin->superadmin_username ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                        <i class="fas fa-eye eye-icon" id="eyeIcon"></i>
                    </span>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= base_url('superadmin') ?>" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>

<!-- Font Awesome + Bootstrap JS -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
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
