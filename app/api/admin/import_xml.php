<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AdminController.php";

if (isset($_POST['table'])) {
    $result = 0;
    $table = $_POST['table'];

    copy(
        $_FILES['xmlFile']['tmp_name'],
        'imported/' . $_FILES['xmlFile']['name']
    );
    $data = simplexml_load_file('imported/' . $_FILES['xmlFile']['name']);
    $result = (new Admin())->importData($data, $table);

?>

    <script>
        <?php if ($result == 0) { ?>
            alert("Ceva nu a mers bine! Reverifica structura XML-ului!");
        <?php } else { ?>
            alert("Importul s-a realizat!");
        <?php } ?>
        window.location.href = "http://localhost/class/public/admin.php";
    </script>
<?php }
