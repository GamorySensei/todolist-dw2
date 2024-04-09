<?php

require 'classes/Task.php';

// Récupération des tâches en BDD
require 'includes/db-connect.php';

$query = $db->query("SELECT task_id, title_task, description_task, task_created_at, task_completed_at FROM task");
$taskCollection = $query->fetchAll();

// Construire un objet "Task" pour chacune d'entre-elles
$tasks = [];
foreach ($taskCollection as $task) {
    $tasks[] = new Task(
        $id = $task['task_id'], 
        $title = $task['title_task'], 
        $description = $task['description_task'],
        $createdAt = new DateTime($task['task_created_at']),
        $completedAt = $task['task_completed_at'] ? new DateTime($task['task_completed_at']) : null,
    );
}

// On vérifie si le formulaire est envoyé et on traite les tâches cochées






// Afficher les tâches dans un tableau HTML
// Titre | Description | Créée le | Status (case à cocher)
// Pour afficher une date en "string" : $date->format('d-m-Y H:i:s') *$date est une variables de type DateTime
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <form method="POST">
        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Créée le</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $index => $task) : ?>
                    <tr>
                        <td><?= $task->getTitle() ?></td>
                        <td><?= $task->getDescription() ?></td>
                        <td><?= $task->getCreatedAt()->format('d-m-Y H:i') ?>
                        <td>
                            <input type="checkbox" <?= $task->getCompletedAt() ? 'checked' : '' ?> name="checked[]" value="<?= $task->getId() ?>">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <input type="submit" name="submit" value="Mettre à jour">
    </form>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>