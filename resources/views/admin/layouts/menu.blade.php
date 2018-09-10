<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>{{ config('app.name') }}</h3>
            <strong>GIF</strong>
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="#">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-tachometer-alt"></i> Portfolio
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-tachometer-alt"></i> Users
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-tachometer-alt"></i> Team
                </a>
            </li>

            <li>
                <a href="{{ route('admin.tags.index') }}">
                    <i class="fas fa-tachometer-alt"></i> Tags
                </a>
            </li>

            <li>
                <a href="{{ route('admin.categories.index') }}">
                    <i class="fas fa-tachometer-alt"></i> Categories
                </a>
            </li>

            <li>
                <a href="{{ route('admin.posts.index') }}">
                    <i class="fas fa-tachometer-alt"></i> Blog
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-tachometer-alt"></i> Clients
                </a>
            </li>

            <li>
                <a href="{{ route('admin.roles.index') }}">
                    <i class="fas fa-tachometer-alt"></i> Roles
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-tachometer-alt"></i> Permissions
                </a>
            </li>
        </ul>
    </nav>

    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a id="sidebarCollapse">
                <i class="fas fa-align-left"></i>
            </a>
        </nav>
        
        <main>