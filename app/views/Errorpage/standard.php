<section class="errorPage">
    <h1><?php echo $dataObject->get('errorMessage'); ?></h1>
    <p>Error <?php echo $dataObject->get('httpCode'); ?></p>
</section>