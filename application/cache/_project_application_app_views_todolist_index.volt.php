<h1>Todo List</h1>
<?= $this->tag->linkTo(['/todolist/new/', 'New Task', 'class' => 'btn btn-info']) ?>

<table class="table">
  <thead class=".thead-dark">
   <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Note</th>
      <th scope="col">Actions</th>
  </thead>
  <tbody>
  <?php foreach ($todolists as $todolist) { ?>
    <tr>
      <th scope="row">1</th>
      <td><?= $todolist->title ?></td>
      <td><?= $todolist->note ?></td>
        
      <td> <?= $this->tag->linkTo(['/todolist/show/' . $todolist->id, 'Edit', 'class' => 'btn btn-info']) ?>
         <?= $this->tag->linkTo(['/todolist/delete/' . $todolist->id, 'Delete', 'class' => 'btn btn-danger']) ?>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
