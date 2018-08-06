<!DOCTYPE html>
<html>
<head>
    <!-- This is the template used by default, insert custom meta tags, CSS, JS etc needed on all pages here -->
    <title><?php echo $dataObject->get("titlePrefix") . $dataObject->get("title") . $dataObject->get("titlePostfix"); ?></title>
    <link rel="stylesheet" href="/styles/main.css">
    <?php // Include more JS files if model specifies
if ($dataObject->get("javascriptFiles") != null) {
    foreach ($dataObject->get("javascriptFiles") as $jsFile) {
        echo "<script src=\"/js/{$jsFile}\"></script>";
    }
}
?>
</head>
<body>
<header>
    <h1><b><i>Header edited in template</i></b></h1>
    <hr>
</header>
<main>
    <?php require_once $viewFileLocation;?>
</main>
<footer>
    <p><?php echo $dataObject->get("copyright"); ?></p>
</footer>
</body>
</html>