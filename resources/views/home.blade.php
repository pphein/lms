@extends('layouts.app')

@section('content')
<header>
    <!-- <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Carousel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav> -->
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="bx bx-search"></i></button>
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
                    <a href="#" class="nav_link active">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Users</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='bx bx-message-square-detail nav_icon'></i>
                        <span class="nav_name">Messages</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='bx bx-bookmark nav_icon'></i>
                        <span class="nav_name">Bookmark</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='bx bx-folder nav_icon'></i>
                        <span class="nav_name">Files</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                        <span class="nav_name">Stats</span>
                    </a>
                </div>
            </div>
            <a href="#" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span>
            </a>
        </nav>
    </div>
</header>

<main class="mt-4">
    <section class="pt-5">
        <h1>Categories</h1>
        <table id="categories_table" class="table table-striped">
        </table>
    </section>
    <section class="pt-5">
        <h1>Books</h1>
        <table id="books_table" class="table table-striped">
        </table>
    </section>
    <section class="pt-5">
        <h1>Authors</h1>
        <table id="authors_table" class="table table-striped">
        </table>
    </section>
    <section class="pt-5">
        <h1>Publishers</h1>
        <table id="publishers_table" class="table table-striped">
        </table>
    </section>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Album example</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
            </div>
        </div>
    </section>
    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                </svg>

                <h2>Heading</h2>
                <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                </svg>

                <h2>Heading</h2>
                <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
                <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                </svg>

                <h2>Heading</h2>
                <p>And lastly this, the third column of representative placeholder content.</p>
                <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
                <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
                </svg>

            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
                <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
                </svg>

            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
                </svg>

            </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>

                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>

                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>

                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>

                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>

                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>

                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>

                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>

                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>

                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>
<div id="dspBookList"></div>
<footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Back to top</a>
        </p>
        <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
    </div>
</footer>
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
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>`;

        // Loop to access all rows
        data.forEach(r => {
            // console.log(JSON.stringify(r));
            tab += `<tr>
                        <th scope="row">${r.id}</th>
                        <td>${r.title}</td>
                        <td>${r.summary}</td>
                        <td>${r.author_id}</td>
                        <td>${r.price} MMK</td>
                        <td>
                        <button type="button" class="view-book btn btn-sm btn-outline-success" data-object='{"id":"${r.id}","title":"${r.title}","summary": "${r.summary}","author_id": "${r.author_id}","price":"${r.price}"}' onClick="show(this.getAttribute('data-object'))"><i class="fa-solid fa-check"></i></button>
                        <button type="button" class="edit-book btn btn-sm btn-outline-primary" data-object='{"id":"${r.id}","title":"${r.title}","summary": "${r.summary}","author_id": "${r.author_id}","price":"${r.price}"}' onClick="edit(this.getAttribute('data-object'))"><i class="fa-solid fa-pencil"></i></button>
                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>`;
            let objBook = new Book(r.id, r.title, r.summary, r.author_id, r.price);
            showBookList(objBook);
        });

        tab += `</tbody>`;
        // Setting innerHTML as tab variable
        document.getElementById("books_table").innerHTML = tab;

        var showButtons = document.querySelectorAll('.view-book');

        for (var i = 0; i < showButtons.length; i++) {
            var showButton = showButtons[i];
            showButton.removeAttribute('type');
            showButton.setAttribute('data-bs-toggle', 'modal');
            showButton.setAttribute('data-bs-target', '#loginModal');
        }

        var editButton = document.querySelectorAll('.edit-book');

        for (var i = 0; i < editButton.length; i++) {
            var editButton = editButton[i];
            editButton.removeAttribute('type');
            editButton.setAttribute('data-bs-toggle', 'modal');
            editButton.setAttribute('data-bs-target', '#loginModal');
        }
        // let newProductButton = document.getElementsByClassName('view-book');
        // newProductButton.removeAttribute('type');
        // newProductButton.setAttribute('data-bs-toggle', 'modal');
        // newProductButton.setAttribute('data-bs-target', '#loginModal');
    }

    function show(book) {

        var obj = JSON.parse(book);
        // alert(book);
        // console.log(obj.summary);
        var view = document.getElementById('loginModal');
        view.classList.add('show');
        // modal.removeAttribute('aria-hidden');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                             <h3 class="text-center">${obj.title}</h3>
                             <h5 style="text-align: left; float:left; width: 50%; display:inline-block">${obj.author_id} </h5>
                             <h5 style="text-align: right; width: 50%; display:inline-block"> ${obj.price} MMK</h5>
                             <p class="text-center pt-3">${obj.summary}</p>
                    </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function edit(book) {

        var obj = JSON.parse(book);
        // alert(book);
        // console.log(obj.summary);
        var view = document.getElementById('loginModal');
        view.classList.add('show');
        // modal.removeAttribute('aria-hidden');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        var content = `<div class="bg-light flex">
                        <h1 class="text-center">Edit Form</h1>
                            <form method="PUT" action="http://127.0.0.1:8000/api/books/${obj.id}">
                                @csrf
                                <div class="row mb-4">
                                    <label for="title" class="col-md-2 col-form-label text-md-end">{{ __('Title') }}</label>
                                    <div class="col-md-10">
                                        <input id="title" type="text" class="form-control" name="title" value="${obj.title}" required autocomplete="title" autofocus>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="summary" class="col-md-2 col-form-label text-md-end">{{ __('Summary') }}</label>
                                    <div class="col-md-10">
                                        <textarea id="summary" type="text" class="form-control @error('summary') is-invalid @enderror" name="summary" value="${obj.summary}" required autocomplete="current-summary">${obj.summary}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="author_id" class="col-md-2 col-form-label text-md-end">{{ __('Author') }}</label>
                                    <div class="col-md-10">
                                        <input id="author_id" type="text" class="form-control @error('author') is-invalid @enderror" name="summary" value="${obj.author_id}" required autocomplete="current-author_id">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="price" class="col-md-2 col-form-label text-md-end">{{ __('Price') }}</label>
                                    <div class="col-md-10">
                                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="${obj.price}" required autocomplete="current-price">
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

    function Book(bId, bTitle, bSummary, bAuthor, bPrice) {
        this.bookId = bId;
        this.bookTitle = bTitle;
        this.bookSummary = bSummary;
        this.bookAuthor = bAuthor;
        this.bookPrice = bPrice;
    }

    function showBookList(objBook) {
        //Create a new product content
        let newProductContent = document.createElement("article");
        newProductContent.innerHTML = "<p>" + objBook.bookTitle + "</p>" +
            "<p>" + objBook.bookSummary + "</p>" +
            "<p>" + objBook.bookAuthor + "</p>" +
            "<p>$" + objBook.bookPrice + "</p>";

        //Create a new button within the product content
        let newProductButton = document.createElement("button");
        newProductButton.classList.add('nav-link');
        newProductButton.setAttribute('data-bs-toggle', 'modal');
        newProductButton.setAttribute('data-bs-target', '#loginModal');
        newProductButton.innerHTML = "See info";

        //Append button to content
        newProductContent.appendChild(newProductButton);

        //Append all new elements into the parent element
        let parentElement = document.getElementById("dspBookList");
        parentElement.appendChild(newProductContent);

        //Passing this object as the argument to a onclick function
        newProductButton.addEventListener("click", function() {
            showBookInfo(objBook);
        });
    }

    function showBookInfo(objBook) {
        var view = document.getElementById('loginModal');
        view.classList.add('show');
        // modal.removeAttribute('aria-hidden');
        view.setAttribute('aria-modal', 'true');
        view.setAttribute('role', 'dialog');
        view.style.display = 'block';
        // view.innerHTML = `<div class="modal-dialog modal-dialog-centered">
        //         <div class="modal-content">
        //             <div class="modal-header">${objBook.bookTitle}<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
        //             <div class="modal-body">
        //                 <div class="myform bg-light">
        //                     <h1 class="text-center">Login Form</h1>
        //                 </div>
        //             </div>
        //         </div>
        //     </div>`;
        var content = `<div class="bg-light">
                             <h1 class="text-center">${objBook.bookTitle}</h1>
                    </div>`;
        document.querySelector('.modal-body').innerHTML = content;
    }

    function test() {
        var modal = document.getElementById('loginModal');
        modal.classList.remove('show');
        modal.style.display = 'none';
        modal.removeAttribute('aria-modal');
        modal.setAttribute('aria-hidden', 'true');
    }

    fetch('/api/categories')
        .then(res => {
            return res.json();
        })
        .then(data => {
            // alert(data);
            showCategories(data)
        })
        .catch(error => {
            console.log(error);
        })

    function showCategories(data) {
        let category = `<thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>`;

        // Loop to access all rows
        data.forEach(r => {
            category += `<tr>
                        <th scope="row">${r.id}</th>
                        <td>${r.name}</td>
                        <td>
                        <button type="button" class="btn btn-sm btn-outline-success"><i class="fa-solid fa-check"></i></button>
                        <button type="button" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pencil"></i></button>
                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>`;
        });

        category += `</tbody>`;
        // Setting innerHTML as tab variable
        document.getElementById("categories_table").innerHTML = category;
    }

    fetch('/api/authors')
        .then(res => {
            return res.json();
        })
        .then(data => {
            // alert(data);
            showAuthors(data)
        })
        .catch(error => {
            console.log(error);
        })

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
                <tbody>`;

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
                        <button type="button" class="btn btn-sm btn-outline-success" onClick="show()"><i class="fa-solid fa-check"></i></button>
                        <button type="button" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pencil"></i></button>
                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>`;
        });

        author += `</tbody>`;
        // Setting innerHTML as tab variable
        document.getElementById("authors_table").innerHTML = author;
    }

    fetch('/api/publishers')
        .then(res => {
            return res.json();
        })
        .then(data => {
            // alert(data);
            showPublishers(data)
        })
        .catch(error => {
            console.log(error);
        })

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
                <tbody>`;

        // Loop to access all rows
        data.forEach(r => {
            publisher += `<tr>
                        <th scope="row">${r.id}</th>
                        <td>${r.name ?? ''}</td>
                        <td>${r.address ?? ''}</td>
                        <td>${r.phone_number ?? ''}</td>
                        <td>
                        <button type="button" class="btn btn-sm btn-outline-success"><i class="fa-solid fa-check"></i></button>
                        <button type="button" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pencil"></i></button>
                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>`;
        });

        publisher += `</tbody>`;
        // Setting innerHTML as tab variable
        document.getElementById("publishers_table").innerHTML = publisher;
    }
</script>
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
</script>
<script src="https://kit.fontawesome.com/37b269d9af.js" crossorigin="anonymous"></script>
@endsection
