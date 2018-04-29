<html>
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js" />
</head>
<h1>Todo List</h1>

<table>
<?php foreach ($todolists as $todolist) { ?>
<tr>
<td><?= $todolist->title ?></td>
</tr>
<?php } ?>
</table>
</html>