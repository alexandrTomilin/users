<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

</head>
<body>

<main class="container">
    <?php echo $content; ?>
</main>

<script src="/public/js/jquery-3.4.0.min.js" type="text/javascript"></script>
<script src="/public/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/public/js/form.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            language: {
//                processing:     "Traitement en cours...",
                search:         "Поиск:",
//                lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
//                info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
//                infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
//                infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
//                infoPostFix:    "",
//                loadingRecords: "Chargement en cours...",
//                zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
//                emptyTable:     "Aucune donnée disponible dans le tableau",
//
// paginate: {
//                    first:      "Premier",
//                    previous:   "Pr&eacute;c&eacute;dent",
//                    next:       "Suivant",
//                    last:       "Dernier"
//                },
//                aria: {
////                    sortAscending:  ": activer pour trier la colonne par ordre croissant",
////                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
//                }
            }
        });
    } );
</script>

</body>
</html>