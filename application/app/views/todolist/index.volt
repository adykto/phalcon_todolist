<h1>Todo List</h1>
{{ link_to("/todolist/new/", "New Task", "class": "btn btn-info") }}

<table class="table">
  <thead class=".thead-dark">
   <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Note</th>
      <th scope="col">Actions</th>
  </thead>
  <tbody>
  {% for todolist in todolists %}
    <tr>
      <th scope="row">1</th>
      <td>{{todolist.title}}</td>
      <td>{{todolist.note}}</td>
        
      <td> {{ link_to("/todolist/show/" ~ todolist.id, "Edit", "class": "btn btn-info") }}
         {{ link_to("/todolist/delete/" ~ todolist.id, "Delete", "class": "btn btn-danger") }}
      </td>
    </tr>
    {% endfor %}
  </tbody>
</table>
