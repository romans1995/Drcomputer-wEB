@extends('cms.cms_master')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <style>
    a:hover {
      color: #007bff;
      text-decoration: initial;
    }
  </style>


  <h1 class="h2">Users</h1>
  <input id="searchText" type="text" placeholder="Search here..." onkeyup="filterUsers()">

</div>
<p><a href="{{ url('cms/users/create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>Add new
    User</a>
</p>

<table class="table table-bordered mt-5">
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Permission</th>
      <th>Operations</th>

    </tr>
  </thead>


  <tbody id="usertable">




    <tr>


    </tr>


  </tbody>
</table>

<script>
  let users = '<?php echo $ur ?>';
  users = JSON.parse(users);

  filterHelper(users);

  function filterUsers() {
    let fullText = document.getElementById('searchText').value;
    const filteredUsers = users.filter(
      currName =>
        currName.firstName.toLowerCase().match(fullText.toLowerCase()))
      document.getElementById('usertable').innerHTML = '';
      filterHelper(filteredUsers);
  }

  function filterHelper(array) {
    array.forEach(object => {
        document.getElementById('usertable').innerHTML += `<tr><td>${object.firstName}</td>
                                                           <td>${object.lastName}</td>
                                                           <td>${object.Kind}</td>
                                                           <td><a href="./users/${object.user_id}/edit"><i class="fas fa-pen"></i>Edit</a>
                                                            <a href="./users/${object.user_id}"><i class="fas fa-eraser"></i>Delete</a>
                                                           </td>
                                                           </tr>`;
    });
  }
</script>
@endsection