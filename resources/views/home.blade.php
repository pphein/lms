@extends('layouts.app')

@section('content')
<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <form class="d-flex">
        <input id="search" class="form-control" type="search" placeholder="Search" aria-label="Search">
    </form>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="nav_logo">
                <i class='bx bx-layer nav_logo-icon'></i>
                <span class="nav_logo-name">LMS</span>
            </a>
            <div class="nav_list">
                <a href="#" class="nav_link active" onclick="getStats()">
                    <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <a href="#" class="nav_link" onclick="changeMainData('users')">
                    <i class='bx bx-group nav_icon'></i>
                    <span class="nav_name">Users</span>
                </a>
                <a href="#" class="nav_link" onclick="changeMainData('categories');">
                    <i class='bx bx-category nav_icon'></i>
                    <span class="nav_name">Categories</span>
                </a>
                <a href="#" class="nav_link" onclick="changeMainData('books')">
                    <i class='bx bx-book nav_icon'></i>
                    <span class="nav_name">Books</span>
                </a>
                <a href="#" class="nav_link" onclick="changeMainData('authors')">
                    <i class='bx bx-user nav_icon'></i>
                    <span class="nav_name">Authors</span>
                </a>
                <a href="#" class="nav_link" onclick="changeMainData('publishers')">
                    <i class='bx bx-printer nav_icon'></i>
                    <span class="nav_name">Publishers</span>
                </a>
                <a href="#" class="nav_link" onclick="changeMainData('editions')">
                    <i class='bx bx-edit nav_icon'></i>
                    <span class=" nav_name">Edition</span>
                </a>
            </div>
        </div>
        <a href="{{ route('logout') }}" class="nav_link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class='bx bx-log-out nav_icon'></i>
            <span class="nav_name">SignOut</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </nav>
</div>

<main class="mt-4">
    @if(Session::has('success'))
    <div class="alert alert-success mt-6 pt-6 alert-dismissible" role="alert" style="z-index: 1000;">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-danger mt-6 pt-6 alert-dismissible" role="alert" style="z-index: 1000;">
        {{ Session::get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div id="main">
        <section></section>
    </div>
    <datalist id="authorList">
    </datalist>
    <datalist id="categoryList">
    </datalist>
    <datalist id="publisherList">
    </datalist>
    <datalist id="editionList">
    </datalist>
    <datalist id="roleList">
    </datalist>
    <section id="stats" class="pt-5 d-none">
        <div class="container mt-5">
            <h2 class="mb-4">Library Statistics</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Books</h5>
                            <p class="card-text">500</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Active Borrowers</h5>
                            <p class="card-text">200</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Popular Genre</h5>
                            <p class="card-text">Mystery</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Most Borrowed Book</h5>
                            <p class="card-text">"The Great Gatsby" by F. Scott Fitzgerald</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Average Borrowing Duration</h5>
                            <p class="card-text">14 days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="users" class="pt-5 d-none">
        <h1 class="d-inline-block mx-2">Users</h1>
        <button id="new-user" type="button" class="btn btn-sm btn-outline-success mb-2" data-bs-toggle="modal" data-bs-target="#popModal" onclick="newUser()"><i class="fa-solid fa-plus"></i></button>
        <div class="table-responsive-sm">
            <table id="users_table" class="table table-responsive table-striped">
            </table>
        </div>
    </section>
    <section id="categories" class="pt-5 d-none">
        <h1 class="d-inline-block mx-2">Categories</h1>
        <button id="new-category" type="button" class="btn btn-sm btn-outline-success mb-2" data-bs-toggle="modal" data-bs-target="#popModal" onclick="newCategory()"><i class="fa-solid fa-plus"></i></button>
        <div class="table-responsive-sm">
            <table id="categories_table" class="table table-responsive table-striped">
            </table>
        </div>
    </section>
    <section id="books" class="pt-5 d-none">
        <h1 class="d-inline-block mx-2">Books</h1>
        <button id="new-book" type="button" class="btn btn-sm btn-outline-success mb-3" data-bs-toggle="modal" data-bs-target="#popModal" onclick="newBook()"><i class="fa-solid fa-plus"></i></button>
        <div class="table-responsive-sm">
            <table id="books_table" class="table table-responsive table-striped">
            </table>
        </div>
    </section>
    <section id="authors" class="pt-5 d-none">
        <h1 class="d-inline-block mx-2">Authors</h1>
        <button id="new-author" type="button" class="btn btn-sm btn-outline-success mb-3" data-bs-toggle="modal" data-bs-target="#popModal" onclick="newAuthor()"><i class="fa-solid fa-plus"></i></button>
        <div class="table-responsive-sm">
            <table id="authors_table" class="table table-responsive table-striped">
            </table>
        </div>
    </section>
    <section id="publishers" class="pt-5 d-none">
        <h1 class="d-inline-block mx-2">Publishers</h1>
        <button id="new-publisher" type="button" class="btn btn-sm btn-outline-success mb-3" data-bs-toggle="modal" data-bs-target="#popModal" onclick="newPublisher()"><i class="fa-solid fa-plus"></i></button>
        <div class="table-responsive-sm table-responsive-md">
            <table id="publishers_table" class="table table-responsive table-striped">
            </table>
        </div>
    </section>
    <section id="editions" class="pt-5 d-none">
        <h1 class="d-inline-block mx-2">Editions</h1>
        <button id="new-edition" type="button" class="btn btn-sm btn-outline-success mb-3" data-bs-toggle="modal" data-bs-target="#popModal" onclick="newEdition()"><i class="fa-solid fa-plus"></i></button>
        <div class="table-responsive-sm table-responsive-md">
            <table id="editions_table" class="table table-responsive table-striped">
            </table>
        </div>
    </section>
</main>
<div class="modal fade" id="popModal" tabindex="-1" aria-labelledby="popModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>
<footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Back to top</a>
        </p>
    </div>
</footer>
<!-- Role script -->
<script>
    fetch('/api/roles')
        .then(res => {
            return res.json();
        })
        .then(data => {
            suggestRoles(data.data);
        })
        .catch(error => {
            console.log(error)
        });

    function suggestRoles(data) {
        var userList = document.getElementById("roleList");
        data.forEach(r => {
            var option = document.createElement('option');
            option.value = r.identifier;
            userList.appendChild(option);
        })
    }
</script>
<!-- User Script -->
<script>
    fetch('/api/users')
        .then(res => {
            return res.json();
        })
        .then(data => {
            showUsers(data.data)
            // suggestUsers(data.data)
        })
        .catch(error => {
            console.log(error);
        })

    // function suggestUsers(data) {
    //     var userList = document.getElementById("userList");
    //     data.forEach(r => {
    //         var option = document.createElement('option');
    //         option.value = r.name;
    //         userList.appendChild(option);
    //     })
    // }

    function showUsers(data) {
        let user = `<thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="data">`;

        // Loop to access all rows
        data.forEach(r => {
            user += `<tr>
                        <th scope="row">${r.id}</th>
                        <td>${r.name}</td>
                        <td>${r.email}</td>
                        <td>${r.role}</td>
                        <td>
                        <button type="button" class="view-user btn btn-sm btn-outline-success" data-object='{"id":"${r.id}","name":"${r.name}","email":"${r.email}", "role":"${r.role}"}' onClick="showUser(this.getAttribute('data-object'))"><i class="fa-solid fa-eye"></i></button>
                        <button type="button" class="edit-user btn btn-sm btn-outline-primary" data-object='{"id":"${r.id}","name":"${r.name}","email":"${r.email}", "role":"${r.role}"}' onClick="editUser(this.getAttribute('data-object'))"><i class="fa-solid fa-pencil"></i></button>
                        <button type="button" class="edit-user btn btn-sm btn-outline-danger" data-object='{"id":"${r.id}","name":"${r.name}","email":"${r.email}", "role":"${r.role}"}' onClick="deleteUser(this.getAttribute('data-object'))"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>`;
        });

        user += `</tbody>`;
        // Setting innerHTML as tab variable
        document.getElementById("users_table").innerHTML = user;

        var showButtons = document.querySelectorAll('.view-user');

        for (var i = 0; i < showButtons.length; i++) {
            var showButton = showButtons[i];
            showButton.removeAttribute('type');
            showButton.setAttribute('data-bs-toggle', 'modal');
            showButton.setAttribute('data-bs-target', '#popModal');
        }

        var editButtons = document.querySelectorAll('.edit-user');

        for (var i = 0; i < editButtons.length; i++) {
            var editButton = editButtons[i];
            editButton.removeAttribute('type');
            editButton.setAttribute('data-bs-toggle', 'modal');
            editButton.setAttribute('data-bs-target', '#popModal');
        }

        var deleteButtons = document.querySelectorAll('.delete-user');

        for (var i = 0; i < deleteButtons.length; i++) {
            var deleteButton = deleteButtons[i];
            deleteButton.removeAttribute('type');
            deleteButton.setAttribute('data-bs-toggle', 'modal');
            deleteButton.setAttribute('data-bs-target', '#popModal');
        }
    }

    function showUser(user) {
        var obj = JSON.parse(user);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                             <form>
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="${obj.name}" required autocomplete="current-name" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control" name="email" value="${obj.email}" required autocomplete="current-email" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                                    <div class="col-md-8">
                                        <input id="role" type="text" class="form-control" name="role" value="${obj.role}" required autocomplete="current-role" readonly>
                                    </div>
                                </div>
                            </form>
                    </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function editUser(user) {

        var obj = JSON.parse(user);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                        <h1 class="text-center">Edit Form</h1>
                            <form method="POST" action="{{ route('update-user') }}">
                                @csrf
                                <input type="hidden" name="id" value="${obj.id}">
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="${obj.name}" autocomplete="current-name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control" name="email" value="${obj.email}" autocomplete="current-email">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                                    <div class="col-md-8">
                                        <input list="roleList" id="role" type="text" class="form-control" name="role" value="${obj.role}" autocomplete="current-role">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function deleteUser(user) {

        var obj = JSON.parse(user);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                            <h1 class="text-center">Delete this user</h1>
                            <form method="POST" action="{{ route('delete-category') }}">
                                @csrf
                                <input type="hidden" name="id" value="${obj.id}">
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="${obj.name}" autocomplete="current-name" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control" name="email" value="${obj.email}" autocomplete="current-email" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                                    <div class="col-md-8">
                                        <input id="role" type="text" class="form-control" name="role" value="${obj.role}" autocomplete="current-role" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Confirm') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function newUser() {
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                            <h1 class="text-center">Create a user</h1>
                            <form method="POST" action="{{ route('create-user') }}">
                                @csrf
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="" autocomplete="current-name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control" name="email" value="" autocomplete="current-email">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                    <div class="col-md-8">
                                        <input id="password" type="password" class="form-control" name="password" value="" autocomplete="current-email">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                                    <div class="col-md-8">
                                        <input list="roleList" id="role" type="text" class="form-control" name="role" value="" autocomplete="current-role">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }
</script>
<!-- User Script -->
<script>
    fetch('/api/categories')
        .then(res => {
            return res.json();
        })
        .then(data => {
            showCategories(data.data)
            suggestCategories(data.data)
        })
        .catch(error => {
            console.log(error);
        })

    function suggestCategories(data) {
        var categoryList = document.getElementById("categoryList");
        data.forEach(r => {
            var option = document.createElement('option');
            option.value = r.name;
            categoryList.appendChild(option);
        })
    }

    function showCategories(data) {
        let category = `<thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="data">`;

        // Loop to access all rows
        data.forEach(r => {
            category += `<tr>
                        <th scope="row">${r.id}</th>
                        <td>${r.name}</td>
                        <td>
                        <button type="button" class="view-category btn btn-sm btn-outline-success" data-object='{"id":"${r.id}","name":"${r.name}"}' onClick="showCategory(this.getAttribute('data-object'))"><i class="fa-solid fa-eye"></i></button>
                        <button type="button" class="edit-category btn btn-sm btn-outline-primary" data-object='{"id":"${r.id}","name":"${r.name}"}' onClick="editCategory(this.getAttribute('data-object'))"><i class="fa-solid fa-pencil"></i></button>
                        <button type="button" class="edit-category btn btn-sm btn-outline-danger" data-object='{"id":"${r.id}","name":"${r.name}"}' onClick="deleteCategory(this.getAttribute('data-object'))"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>`;
        });

        category += `</tbody>`;
        // Setting innerHTML as tab variable
        document.getElementById("categories_table").innerHTML = category;

        var showButtons = document.querySelectorAll('.view-category');

        for (var i = 0; i < showButtons.length; i++) {
            var showButton = showButtons[i];
            showButton.removeAttribute('type');
            showButton.setAttribute('data-bs-toggle', 'modal');
            showButton.setAttribute('data-bs-target', '#popModal');
        }

        var editButtons = document.querySelectorAll('.edit-category');

        for (var i = 0; i < editButtons.length; i++) {
            var editButton = editButtons[i];
            editButton.removeAttribute('type');
            editButton.setAttribute('data-bs-toggle', 'modal');
            editButton.setAttribute('data-bs-target', '#popModal');
        }

        var deleteButtons = document.querySelectorAll('.delete-category');

        for (var i = 0; i < deleteButtons.length; i++) {
            var deleteButton = deleteButtons[i];
            deleteButton.removeAttribute('type');
            deleteButton.setAttribute('data-bs-toggle', 'modal');
            deleteButton.setAttribute('data-bs-target', '#popModal');
        }
    }

    function showCategory(category) {
        var obj = JSON.parse(category);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                             <form>
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="${obj.name}" required autocomplete="current-name" readonly>
                                    </div>
                                </div>
                            </form>
                    </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function editCategory(category) {

        var obj = JSON.parse(category);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                        <h1 class="text-center">Edit Form</h1>
                            <form method="POST" action="{{ route('update-category') }}">
                                @csrf
                                <input type="hidden" name="id" value="${obj.id}">
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-8">
                                        <input list="categoryList" id="name" type="text" class="form-control" name="name" value="${obj.name}" autocomplete="current-name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function deleteCategory(category) {

        var obj = JSON.parse(category);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                            <h1 class="text-center">Delete this category</h1>
                            <form method="POST" action="{{ route('delete-category') }}">
                                @csrf
                                <input type="hidden" name="id" value="${obj.id}">
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="${obj.name}" autocomplete="current-name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Confirm') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function newCategory() {
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                            <h1 class="text-center">Create a category</h1>
                            <form method="POST" action="{{ route('create-category') }}">
                                @csrf
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="" autocomplete="current-name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }
</script>
<!-- Book Script -->
<script>
    fetch('/api/books')
        .then(res => {
            return res.json();
        })
        .then(data => {
            showBooks(data.data)
        })
        .catch(error => {
            console.log(error);
        })

    function showBooks(data) {
        let tab = `<thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Summary</th>
                    <th scope="col">Author</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Edition</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Published_Date</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="data">`;

        // Loop to access all rows
        data.forEach(r => {
            tab += `<tr>
                        <th scope="row">${r.id}</th>
                        <td>${r.title}</td>
                        <td>${r.summary}</td>
                        <td>${r.author}</td>
                        <td>${r.publisher}</td>
                        <td>${r.edition}</td>
                        <td>${r.price} MMK</td>
                        <td>${r.category}</td>
                        <td>${r.published_date ?? ''}</td>
                        <td>
                        <button type="button" class="view-book btn btn-sm btn-outline-success" data-object='{"id":"${r.id}","title":"${r.title}","summary": "${r.summary}","author": "${r.author}","publisher":"${r.publisher}","edition":"${r.edition}","price":"${r.price}","category":"${r.category}","published_date":"${r.published_date}"}' onClick="showBook(this.getAttribute('data-object'))"><i class="fa-solid fa-eye"></i></i></button>
                        <button type="button" class="edit-book btn btn-sm btn-outline-primary" data-object='{"id":"${r.id}","title":"${r.title}","summary": "${r.summary}","author": "${r.author}","publisher":"${r.publisher}","edition":"${r.edition}","price":"${r.price}","category":"${r.category}","published_date":"${r.published_date}"}' onClick="editBook(this.getAttribute('data-object'))"><i class="fa-solid fa-pencil"></i></button>
                        <button type="button" class="delete-book btn btn-sm btn-outline-danger" data-object='{"id":"${r.id}","title":"${r.title}","summary": "${r.summary}","author": "${r.author}","publisher":"${r.publisher}","edition":"${r.edition}","price":"${r.price}","category":"${r.category}","published_date":"${r.published_date}"}' onClick="deleteBook(this.getAttribute('data-object'))"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>`;
        });

        tab += `</tbody>`;
        // Setting innerHTML as tab variable
        document.getElementById("books_table").innerHTML = tab;

        var showButtons = document.querySelectorAll('.view-book');

        for (var i = 0; i < showButtons.length; i++) {
            var showButton = showButtons[i];
            showButton.removeAttribute('type');
            showButton.setAttribute('data-bs-toggle', 'modal');
            showButton.setAttribute('data-bs-target', '#popModal');
        }

        var editButtons = document.querySelectorAll('.edit-book');

        for (var i = 0; i < editButtons.length; i++) {
            var editButton = editButtons[i];
            editButton.removeAttribute('type');
            editButton.setAttribute('data-bs-toggle', 'modal');
            editButton.setAttribute('data-bs-target', '#popModal');
        }

        var deleteButtons = document.querySelectorAll('.delete-book');

        for (var i = 0; i < deleteButtons.length; i++) {
            var deleteButton = deleteButtons[i];
            deleteButton.removeAttribute('type');
            deleteButton.setAttribute('data-bs-toggle', 'modal');
            deleteButton.setAttribute('data-bs-target', '#popModal');
        }
    }

    function showBook(book) {

        var obj = JSON.parse(book);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                             <h3 class="text-center">${obj.title}</h3>
                             <h5 style="text-align: left; float:left; width: 50%; display:inline-block">${obj.author} </h5>
                             <h5 style="text-align: right; width: 50%; display:inline-block"> ${obj.price} MMK</h5>
                             <p class="text-center pt-3">${obj.summary}</p>
                    </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function editBook(book) {

        var obj = JSON.parse(book);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                        <h1 class="text-center">Edit Form</h1>
                            <form method="POST" action="{{ route('update-book') }}">
                                @csrf
                                <input type="hidden" name="id" value="${obj.id}">
                                <div class="row mb-4">
                                    <label for="title" class="col-md-2 col-form-label text-md-end">{{ __('Title') }}</label>
                                    <div class="col-md-10">
                                        <input id="title" type="text" class="form-control" name="title" value="${obj.title}" required autocomplete="title" autofocus>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="summary" class="col-md-2 col-form-label text-md-end">{{ __('Summary') }}</label>
                                    <div class="col-md-10">
                                        <textarea id="summary" type="text" class="form-control" name="summary" value="${obj.summary}" required autocomplete="current-summary">${obj.summary}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="author" class="col-md-2 col-form-label text-md-end">{{ __('Author') }}</label>
                                    <div class="col-md-10">
                                        <input list="authorList" id="author" type="text" class="form-control" name="author" value="${obj.author}" required autocomplete="current-author">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="publisher" class="col-md-2 col-form-label text-md-end">{{ __('Publisher') }}</label>
                                    <div class="col-md-10">
                                        <input list="publisherList" id="publisher" type="text" class="form-control" name="publisher" value="${obj.publisher}" required autocomplete="current-publisher">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="edition" class="col-md-2 col-form-label text-md-end">{{ __('Edition') }}</label>
                                    <div class="col-md-10">
                                        <input list="editionList" id="edition" type="text" class="form-control" name="edition" value="${obj.edition}" required autocomplete="current-edition">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="price" class="col-md-2 col-form-label text-md-end">{{ __('Price') }}</label>
                                    <div class="col-md-10">
                                        <input id="price" type="number" class="form-control" name="price" value="${obj.price}" required autocomplete="current-price">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="category" class="col-md-2 col-form-label text-md-end">{{ __('Category') }}</label>
                                    <div class="col-md-10">
                                        <input list="categoryList" id="category" type="text" class="form-control" name="category" value="${obj.category}" required autocomplete="current-price">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function deleteBook(book) {

        var obj = JSON.parse(book);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                            <h1 class="text-center">Delete this book</h1>
                            <form method="POST" action="{{ route('delete-book') }}">
                                @csrf
                                <input type="hidden" name="id" value="${obj.id}">
                                <div class="row mb-4">
                                    <label for="title" class="col-md-2 col-form-label text-md-end">{{ __('Title') }}</label>
                                    <div class="col-md-10">
                                        <input id="title" type="text" class="form-control" name="title" value="${obj.title}" required autocomplete="title" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="summary" class="col-md-2 col-form-label text-md-end">{{ __('Summary') }}</label>
                                    <div class="col-md-10">
                                        <textarea id="summary" type="text" class="form-control" name="summary" value="${obj.summary}" required autocomplete="current-summary" readonly>${obj.summary}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="author" class="col-md-2 col-form-label text-md-end">{{ __('Author') }}</label>
                                    <div class="col-md-10">
                                        <input id="author" type="text" class="form-control" name="author" value="${obj.author}" required autocomplete="current-author_id" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="price" class="col-md-2 col-form-label text-md-end">{{ __('Price') }}</label>
                                    <div class="col-md-10">
                                        <input id="price" type="number" class="form-control" name="price" value="${obj.price}" required autocomplete="current-price" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Confirm') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function newBook() {
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                            <h1 class="text-center">Create a book</h1>
                            <form method="POST" action="{{ route('create-book') }}">
                                @csrf
                                <div class="row mb-4">
                                    <label for="title" class="col-md-2 col-form-label text-md-end">{{ __('Title') }}</label>
                                    <div class="col-md-10">
                                        <input id="title" type="text" class="form-control" name="title" required autocomplete="title">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="author" class="col-md-2 col-form-label text-md-end">{{ __('Author') }}</label>
                                    <div class="col-md-10">
                                        <input list="authorList" id="author" type="text" class="form-control" name="author" required autocomplete="author">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="summary" class="col-md-2 col-form-label text-md-end">{{ __('Summary') }}</label>
                                    <div class="col-md-10">
                                        <textarea id="summary" type="text" class="form-control" name="summary" required></textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="price" class="col-md-2 col-form-label text-md-end number-to-text">{{ __('Price') }}</label>
                                    <div class="col-md-10">
                                        <input id="price" type="number" class="form-control" name="price" required>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="publisher" class="col-md-2 col-form-label text-md-end">{{ __('Publisher') }}</label>
                                    <div class="col-md-10">
                                        <input list="publisherList" id="publisher" type="text" class="form-control" name="publisher" required>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="edition" class="col-md-2 col-form-label text-md-end">{{ __('Edition') }}</label>
                                    <div class="col-md-10">
                                        <input list="editionList" id="edition" type="text" class="form-control" name="edition" required>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="category" class="col-md-2 col-form-label text-md-end">{{ __('Category') }}</label>
                                    <div class="col-md-10">
                                        <input list="categoryList" id="category" type="text" class="form-control" name="category" required>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="published_date" class="col-md-2 col-form-label text-md-end">{{ __('Published Date') }}</label>
                                    <div class="col-md-10">
                                        <input id="published_date" type="date" class="form-control" name="published_date">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }
</script>
<!-- Author Script -->
<script>
    fetch('/api/authors')
        .then(res => {
            return res.json();
        })
        .then(data => {
            showAuthors(data.data)
            suggestAuthors(data.data)
        })
        .catch(error => {
            console.log(error);
        })

    function suggestAuthors(data) {
        var authorList = document.getElementById("authorList");
        data.forEach(r => {
            var option = document.createElement('option');
            option.value = r.pen_name;
            authorList.appendChild(option);
        })
    }

    function showAuthors(data) {
        let author = `<thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pen Name</th>
                    <th scope="col">Name</th>
                    <th scope="col">Profile</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="data">`;

        // Loop to access all rows
        data.forEach(r => {
            author += `<tr>
                        <th scope="row">${r.id}</th>
                        <td>${r.pen_name}</td>
                        <td>${r.name ?? ''}</td>
                        <td>${r.profile ?? ''}</td>
                        <td>${r.address ?? ''}</td>
                        <td>${r.phone_number ?? ''}</td>
                        <td>
                        <button type="button" class="view-author btn btn-sm btn-outline-success" data-object='{"id":"${r.id}","pen_name":"${r.pen_name ?? ''}","name":"${r.name ?? ''}","profile":"${r.profile ?? ''}","address":"${r.address ?? ''}","phone_number":"${r.phone_number ?? ''}"}' onClick="showAuthor(this.getAttribute('data-object'))"><i class="fa-solid fa-eye"></i></i></button>
                        <button type="button" class="edit-author btn btn-sm btn-outline-primary" data-object='{"id":"${r.id}","pen_name":"${r.pen_name ?? ''}","name":"${r.name ?? ''}","profile":"${r.profile ?? ''}","address":"${r.address ?? ''}","phone_number":"${r.phone_number ?? ''}"}' onClick="editAuthor(this.getAttribute('data-object'))"><i class="fa-solid fa-pencil"></i></button>
                        <button type="button" class="delete-author btn btn-sm btn-outline-danger" data-object='{"id":"${r.id}","pen_name":"${r.pen_name ?? ''}","name":"${r.name ?? ''}","profile":"${r.profile ?? ''}","address":"${r.address ?? ''}","phone_number":"${r.phone_number ?? ''}"}' onClick="deleteAuthor(this.getAttribute('data-object'))"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>`;
        });

        author += `</tbody>`;
        // Setting innerHTML as tab variable
        document.getElementById("authors_table").innerHTML = author;

        var showButtons = document.querySelectorAll('.view-author');

        for (var i = 0; i < showButtons.length; i++) {
            var showButton = showButtons[i];
            showButton.removeAttribute('type');
            showButton.setAttribute('data-bs-toggle', 'modal');
            showButton.setAttribute('data-bs-target', '#popModal');
        }

        var editButtons = document.querySelectorAll('.edit-author');

        for (var i = 0; i < editButtons.length; i++) {
            var editButton = editButtons[i];
            editButton.removeAttribute('type');
            editButton.setAttribute('data-bs-toggle', 'modal');
            editButton.setAttribute('data-bs-target', '#popModal');
        }

        var deleteButtons = document.querySelectorAll('.delete-author');

        for (var i = 0; i < deleteButtons.length; i++) {
            var deleteButton = deleteButtons[i];
            deleteButton.removeAttribute('type');
            deleteButton.setAttribute('data-bs-toggle', 'modal');
            deleteButton.setAttribute('data-bs-target', '#popModal');
        }
    }

    function showAuthor(author) {
        var obj = JSON.parse(author);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                             <form>
                                <div class="row mb-4">
                                    <label for="pen_name" class="col-md-4 col-form-label text-md-end">{{ __('Pen Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="pen_name" type="text" class="form-control" name="pen_name" value="${obj.pen_name}" required autocomplete="current-pen-name" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="${obj.name ?? ''}" required autocomplete="current-name" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="profile" class="col-md-4 col-form-label text-md-end">{{ __('Profile') }}</label>
                                    <div class="col-md-8">
                                        <input id="profile" type="text" class="form-control" name="profile" value="${obj.profile ?? ''}" required autocomplete="current-profile" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                                    <div class="col-md-8">
                                        <input id="address" type="text" class="form-control" name="address" value="${obj.address ?? ''}" required autocomplete="current-address" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
                                    <div class="col-md-8">
                                        <input id="phone_number" type="tel" class="form-control" name="phone_number" value="${obj.phone_number ?? ''}" required autocomplete="current-phone_number" readonly>
                                    </div>
                                </div>
                                </form>
                    </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function editAuthor(author) {

        var obj = JSON.parse(author);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                <h1 class="text-center">Edit Form</h1>
                    <form method="POST" action="{{ route('update-author') }}">
                        @csrf
                        <input type="hidden" name="id" value="${obj.id}">
                        <div class="row mb-4">
                            <label for="pen_name" class="col-md-4 col-form-label text-md-end">{{ __('Pen Name') }}</label>
                            <div class="col-md-8">
                                <input id="pen_name" type="text" class="form-control" name="pen_name" value="${obj.pen_name}" autocomplete="current-pen-name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="${obj.name}" autocomplete="current-name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="profile" class="col-md-4 col-form-label text-md-end">{{ __('Profile') }}</label>
                            <div class="col-md-8">
                                <input id="profile" type="text" class="form-control" name="profile" value="${obj.profile}" autocomplete="current-profile">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                            <div class="col-md-8">
                                <input id="address" type="text" class="form-control" name="address" value="${obj.address}" autocomplete="current-address">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
                            <div class="col-md-8">
                                <input id="phone_number" type="tel" pattern="^(09)[0-9]{7,9}$" class="form-control" name="phone_number" value="${obj.phone_number}" autocomplete="current-phone_number">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function deleteAuthor(author) {
        var obj = JSON.parse(author);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                            <h1 class="text-center">Delete this author</h1>
                            <form method="POST" action="{{ route('delete-author') }}">
                                @csrf
                                <input type="hidden" name="id" value="${obj.id}">
                                <div class="row mb-4">
                                    <label for="pen_name" class="col-md-4 col-form-label text-md-end">{{ __('Pen Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="pen_name" type="text" class="form-control" name="pen_name" value="${obj.pen_name}" autocomplete="current-pen-name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="${obj.name}" autocomplete="current-name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="profile" class="col-md-4 col-form-label text-md-end">{{ __('Profile') }}</label>
                                    <div class="col-md-8">
                                        <input id="profile" type="text" class="form-control" name="profile" value="${obj.profile}" autocomplete="current-profile">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                                    <div class="col-md-8">
                                        <input id="address" type="text" class="form-control" name="address" value="${obj.address}" autocomplete="current-address">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
                                    <div class="col-md-8">
                                        <input id="phone_number" type="tel" pattern="^(09)[0-9]{7,9}$" class="form-control" name="phone_number" value="${obj.phone_number}" autocomplete="current-phone_number">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Confirm') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function newAuthor() {
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                            <h1 class="text-center">Create a author</h1>
                            <form method="POST" action="{{ route('create-author') }}">
                                @csrf
                                <div class="row mb-4">
                                    <label for="pen_name" class="col-md-4 col-form-label text-md-end">{{ __('Pen Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="pen_name" type="text" class="form-control" name="pen_name" value="" autocomplete="current-pen-name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="" autocomplete="current-name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="profile" class="col-md-4 col-form-label text-md-end">{{ __('Profile') }}</label>
                                    <div class="col-md-8">
                                        <input id="profile" type="text" class="form-control" name="profile" value="" autocomplete="current-profile">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                                    <div class="col-md-8">
                                        <input id="address" type="text" class="form-control" name="address" value="" autocomplete="current-address">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
                                    <div class="col-md-8">
                                        <input id="phone_number" type="tel" pattern="^(09)[0-9]{7,9}$" class="form-control" name="phone_number" value="" autocomplete="current-phone_number">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }
</script>
<!-- Publisher Script -->
<script>
    fetch('/api/publishers')
        .then(res => {
            return res.json();
        })
        .then(data => {
            suggestPublishers(data.data)
            showPublishers(data.data)
        })
        .catch(error => {
            console.log(error);
        })

    function suggestPublishers(data) {
        var publisherList = document.getElementById("publisherList");
        data.forEach(r => {
            var option = document.createElement('option');
            option.value = r.name;
            publisherList.appendChild(option);
        })
    }

    function showPublishers(data) {
        let publisher = `<thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="data">`;

        // Loop to access all rows
        data.forEach(r => {
            publisher += `<tr>
                        <th scope="row">${r.id}</th>
                        <td>${r.name ?? ''}</td>
                        <td>${r.address ?? ''}</td>
                        <td>${r.phone_number ?? ''}</td>
                        <td>
                        <button type="button" class="view-publisher btn btn-sm btn-outline-success" data-object='{"id":"${r.id}","name":"${r.name}","address":"${r.address ??''}","phone_number":"${r.phone_number ??''}"}' onClick="showPublisher(this.getAttribute('data-object'))"><i class="fa-solid fa-eye"></i></button>
                        <button type="button" class="edit-publisher btn btn-sm btn-outline-primary" data-object='{"id":"${r.id}","name":"${r.name ??''}","address":"${r.address ??''}","phone_number":"${r.phone_number ??''}"}' onClick="editPublisher(this.getAttribute('data-object'))"><i class="fa-solid fa-pencil"></i></button>
                        <button type="button" class="delete-publisher btn btn-sm btn-outline-danger" data-object='{"id":"${r.id}","name":"${r.name}","address":"${r.address ??''}","phone_number":"${r.phone_number ??''}"}' onClick="deletePublisher(this.getAttribute('data-object'))"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>`;
        });

        publisher += `</tbody>`;
        // Setting innerHTML as tab variable
        document.getElementById("publishers_table").innerHTML = publisher;

        var showButtons = document.querySelectorAll('.view-publisher');

        for (var i = 0; i < showButtons.length; i++) {
            var showButton = showButtons[i];
            showButton.removeAttribute('type');
            showButton.setAttribute('data-bs-toggle', 'modal');
            showButton.setAttribute('data-bs-target', '#popModal');
        }

        var editButtons = document.querySelectorAll('.edit-publisher');

        for (var i = 0; i < editButtons.length; i++) {
            var editButton = editButtons[i];
            editButton.removeAttribute('type');
            editButton.setAttribute('data-bs-toggle', 'modal');
            editButton.setAttribute('data-bs-target', '#popModal');
        }

        var deleteButtons = document.querySelectorAll('.delete-publisher');

        for (var i = 0; i < deleteButtons.length; i++) {
            var deleteButton = deleteButtons[i];
            deleteButton.removeAttribute('type');
            deleteButton.setAttribute('data-bs-toggle', 'modal');
            deleteButton.setAttribute('data-bs-target', '#popModal');
        }
    }

    function showPublisher(publisher) {
        var obj = JSON.parse(publisher);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                             <form>
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="${obj.name}" required autocomplete="current-name" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                                    <div class="col-md-8">
                                        <input id="address" type="text" class="form-control" name="address" value="${obj.address ?? ''}" required autocomplete="current-address" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
                                    <div class="col-md-8">
                                        <input id="phone_number" type="tel" class="form-control" name="phone_number" value="${obj.phone_number ?? ''}" required autocomplete="current-phone_number" readonly>
                                    </div>
                                </div>
                                </form>
                    </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function editPublisher(publisher) {

        var obj = JSON.parse(publisher);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                        <h1 class="text-center">Edit Form</h1>
                            <form method="POST" action="{{ route('update-publisher') }}">
                                @csrf
                                <input type="hidden" name="id" value="${obj.id}">
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="${obj.name}" autocomplete="current-name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                                    <div class="col-md-8">
                                        <input id="address" type="text" class="form-control" name="address" value="${obj.address}" autocomplete="current-address">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
                                    <div class="col-md-8">
                                        <input id="phone_number" type="tel" pattern="^(09)[0-9]{7,9}$" class="form-control" name="phone_number" value="${obj.phone_number}" autocomplete="current-phone_number">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function deletePublisher(publisher) {
        var obj = JSON.parse(publisher);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                            <h1 class="text-center">Delete this publisher</h1>
                            <form method="POST" action="{{ route('delete-publisher') }}">
                                @csrf
                                <input type="hidden" name="id" value="${obj.id}">
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="${obj.name}" autocomplete="current-name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                                    <div class="col-md-8">
                                        <input id="address" type="text" class="form-control" name="address" value="${obj.address}" autocomplete="current-address">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
                                    <div class="col-md-8">
                                        <input id="phone_number" type="tel" class="form-control" name="phone_number" value="${obj.phone_number}" autocomplete="current-phone_number">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Confirm') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function newPublisher() {
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                            <h1 class="text-center">Create a publisher</h1>
                            <form method="POST" action="{{ route('create-publisher') }}">
                                @csrf
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="" autocomplete="current-name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                                    <div class="col-md-8">
                                        <input id="address" type="text" class="form-control" name="address" value="" autocomplete="current-address">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
                                    <div class="col-md-8">
                                        <input id="phone_number" type="tel" placeholder="09123456789" pattern="(09)[0-9]{9}" class="form-control" name="phone_number" value="" autocomplete="current-phone_number">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }
</script>
<!-- Edition Script -->
<script>
    fetch('/api/editions')
        .then(res => {
            return res.json();
        })
        .then(data => {
            showEditions(data.data)
            suggestEditions(data.data)
        })
        .catch(error => {
            console.log(error);
        })

    function suggestEditions(data) {
        var editionList = document.getElementById("editionList");
        data.forEach(r => {
            var option = document.createElement('option');
            option.value = r.name;
            editionList.appendChild(option);
        })
    }

    function showEditions(data) {
        let edition = `<thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="data">`;

        // Loop to access all rows
        data.forEach(r => {
            edition += `<tr>
                        <th scope="row">${r.id}</th>
                        <td>${r.name}</td>
                        <td>
                        <button type="button" class="view-edition btn btn-sm btn-outline-success" data-object='{"id":"${r.id}","name":"${r.name}"}' onClick="showEdition(this.getAttribute('data-object'))"><i class="fa-solid fa-eye"></i></button>
                        <button type="button" class="edit-edition btn btn-sm btn-outline-primary" data-object='{"id":"${r.id}","name":"${r.name}"}' onClick="editEdition(this.getAttribute('data-object'))"><i class="fa-solid fa-pencil"></i></button>
                        <button type="button" class="edit-edition btn btn-sm btn-outline-danger" data-object='{"id":"${r.id}","name":"${r.name}"}' onClick="deleteEdition(this.getAttribute('data-object'))"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>`;
        });

        edition += `</tbody>`;
        // Setting innerHTML as tab variable
        document.getElementById("editions_table").innerHTML = edition;

        var showButtons = document.querySelectorAll('.view-edition');

        for (var i = 0; i < showButtons.length; i++) {
            var showButton = showButtons[i];
            showButton.removeAttribute('type');
            showButton.setAttribute('data-bs-toggle', 'modal');
            showButton.setAttribute('data-bs-target', '#popModal');
        }

        var editButtons = document.querySelectorAll('.edit-edition');

        for (var i = 0; i < editButtons.length; i++) {
            var editButton = editButtons[i];
            editButton.removeAttribute('type');
            editButton.setAttribute('data-bs-toggle', 'modal');
            editButton.setAttribute('data-bs-target', '#popModal');
        }

        var deleteButtons = document.querySelectorAll('.delete-edition');

        for (var i = 0; i < deleteButtons.length; i++) {
            var deleteButton = deleteButtons[i];
            deleteButton.removeAttribute('type');
            deleteButton.setAttribute('data-bs-toggle', 'modal');
            deleteButton.setAttribute('data-bs-target', '#popModal');
        }
    }

    function showEdition(edition) {
        var obj = JSON.parse(edition);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                             <form>
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="${obj.name}" required autocomplete="current-name" readonly>
                                    </div>
                                </div>
                            </form>
                    </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function editEdition(edition) {
        var obj = JSON.parse(edition);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                        <h1 class="text-center">Edit Form</h1>
                            <form method="POST" action="{{ route('update-edition') }}">
                                @csrf
                                <input type="hidden" name="id" value="${obj.id}">
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="${obj.name}" autocomplete="current-name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function deleteEdition(edition) {

        var obj = JSON.parse(edition);
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                            <h1 class="text-center">Delete this edition</h1>
                            <form method="POST" action="{{ route('delete-edition') }}">
                                @csrf
                                <input type="hidden" name="id" value="${obj.id}">
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="${obj.name}" autocomplete="current-name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Confirm') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function newCategory() {
        var view = document.getElementById('popModal');
        view.classList.add('show');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                            <h1 class="text-center">Create a category</h1>
                            <form method="POST" action="{{ route('create-category') }}">
                                @csrf
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="" autocomplete="current-name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }
</script>
<!-- Sidebar Script -->
<script>
    document.addEventListener("DOMContentLoaded", function(event) {

        const showNavbar = (toggleId, navId, bodyId, headerId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId)

            // Validate that all variables exist
            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener('click', () => {
                    // show navbar
                    nav.classList.toggle('show')
                    // change icon
                    toggle.classList.toggle('bx-x')
                    // add padding to body
                    bodypd.classList.toggle('body-pd')
                    // add padding to header
                    headerpd.classList.toggle('body-pd')
                })
            }
        }

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink() {
            if (linkColor) {
                linkColor.forEach(l => l.classList.remove('active'))
                this.classList.add('active')
            }
        }
        linkColor.forEach(l => l.addEventListener('click', colorLink))

        // Your code to run since DOM is loaded and ready
    });

    function changeMainData(sectionId) {
        var section = document.getElementById(sectionId).cloneNode(true);
        var main = document.getElementById('main');
        var blankSection = main.firstElementChild;
        main.replaceChild(section, blankSection);
        main.firstElementChild.classList.remove('d-none');
    }

    function getStats() {
        var stats = document.getElementById('stats').cloneNode(true);
        var main = document.getElementById('main');
        var blankSection = main.firstElementChild;
        main.replaceChild(stats, blankSection);
        main.firstElementChild.classList.remove('d-none');
    }

    getStats();
</script>
<script src="https://kit.fontawesome.com/37b269d9af.js" crossorigin="anonymous"></script>
@endsection
