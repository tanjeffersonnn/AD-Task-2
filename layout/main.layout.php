<?php

$scriptName = $_SERVER['SCRIPT_NAME'];
$projectFolderName = basename(dirname(dirname(__FILE__))); 
$baseUrlPath = '';

$pos = strpos($scriptName, '/' . $projectFolderName);
if ($pos !== false) {
    $baseUrlPath = rtrim(substr($scriptName, 0, $pos + strlen('/' . $projectFolderName)), '/');
} else {

    $baseUrlPath = rtrim(dirname($scriptName), '/');
    if ($baseUrlPath === '\\' || $baseUrlPath === '/') {
        $baseUrlPath = '';
    }
}

$pageTitle = isset($pageTitle) ? $pageTitle : 'My To-Do List Application';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $baseUrlPath; ?>/assets/css/main.css?v=<?php echo time(); ?>">
</head>
<body>
    <header>
        <div class="container header-content">
            <span class="app-title">My To-Do List</span>
            <nav>
                <ul>

                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <?php
            
          
            if (isset($pageContentFile) && $pageContentFile && file_exists($pageContentFile)) {
                require_once $pageContentFile;
            } else {
                echo '<h1 class="app-header">Page Not Found</h1>';
                echo '<p style="text-align:center; color:#e0e0e0;">The page you are looking for does not exist.</p>';
            }
            ?>
        </div>
    </main>

    <footer>
        <div class="container">
            <p class="footer-text">&copy; <?php echo date("Y"); ?> My To-Do List. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
