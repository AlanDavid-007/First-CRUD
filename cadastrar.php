<?php 
    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Vaga;
    $obVaga = new Vaga;

    echo "<pre>"; print_r($_POST); echo "</pre>"; exit;
    
    
    require __DIR__.'/INCLUDES/header.php';

    require __DIR__.'/INCLUDES/formulario.php';

    require __DIR__.'/INCLUDES/footer.php';
        
?>