<?php
// pages/auth/index.php - AD-ProgrammingBasics Simulated Authentication Page

// This page is included by default.layout.php
// $currentUserRole is available from router.php/bootstrap.php scope.
?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow p-4">
            <h2 class="card-title text-center text-primary mb-4">Simulated Authentication</h2>
            <p class="text-center lead">This page demonstrates role-based access control without user input or classes.</p>
            <hr>
            <p class="text-center fs-5">Your current simulated role is: <span class="badge bg-success fs-5"><?php echo htmlspecialchars($currentUserRole); ?></span></p>

            <p class="text-center mt-3">
                Change your simulated role using the buttons in the header or directly via URL:
            </p>
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item"><a href="<?php echo $basePath; ?>auth?role=guest" class="btn btn-outline-secondary">Set Role to Guest</a></li>
                <li class="list-group-item"><a href="<?php echo $basePath; ?>auth?role=developer" class="btn btn-outline-info">Set Role to Developer</a></li>
                <li class="list-group-item"><a href="<?php echo $basePath; ?>auth?role=architect" class="btn btn-outline-primary">Set Role to Architect</a></li>
            </ul>

            <h4 class="mt-4 text-center text-secondary">Role Permissions:</h4>
            <ul class="list-group list-group-flush mx-auto" style="max-width: 400px;">
                <?php
                $allPermissions = getAllPermissions(); // Utility function from Auth.util.php
                foreach ($allPermissions as $permissionName) {
                    $hasAccess = hasPermission($permissionName);
                    echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                    echo '<span>' . htmlspecialchars(str_replace('_', ' ', ucfirst($permissionName))) . ':</span>';
                    echo '<span class="badge bg-' . ($hasAccess ? 'success' : 'danger') . '">' . ($hasAccess ? 'Allowed' : 'Denied') . '</span>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>