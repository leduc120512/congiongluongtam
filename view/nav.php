<ul class="sidebar-nav">
    <li class="sidebar-header">
        Pages
    </li>

    <li class="sidebar-item active">
        <a class="sidebar-link" href="index.html">
            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
        </a>
    </li>

    <!-- <li class="sidebar-item">
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <a class="sidebar-link" href="?controller=farming_process&action=manage">
                <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Quản lí sản đơn hàng</span>
            </a>
        <?php endif; ?>

    </li> -->

    <li class="sidebar-item">
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <a class="sidebar-link" href="?controller=product&action=inventory">
                <i class="align-middle" data-feather="user-plus"></i>
                <pan class="align-middle">Quản lí đơn hàng</pan>
            </a>
        <?php endif; ?>

    </li>
    <?php if ($_SESSION['role'] === 'admin'): ?>
        <!-- Quản lý bài báo -->
        <li class="sidebar-item">
            <a data-bs-toggle="collapse" href="#dropdownArticles" class="sidebar-link collapsed" aria-expanded="false">
                <i class="align-middle" data-feather="file-text"></i>
                <span class="align-middle">Quản lý bài báo</span>
            </a>
            <ul id="dropdownArticles" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="?controller=category_art&action=index">
                        <i class="align-middle" data-feather="folder"></i> Quản lý danh mục bài báo
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="?controller=article&action=manage">
                        <i class="align-middle" data-feather="file"></i> Quản bài viết
                    </a>
                </li>
            </ul>
        </li>

        <!-- Quản lý sản phẩm -->
        <li class="sidebar-item">
            <a data-bs-toggle="collapse" href="#dropdownProducts" class="sidebar-link collapsed" aria-expanded="false">
                <i class="align-middle" data-feather="box"></i>
                <span class="align-middle">Quản lý sản phẩm</span>
            </a>
            <ul id="dropdownProducts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="?controller=category&action=index">
                        <i class="align-middle" data-feather="folder"></i> Quản lý danh mục sản phẩm
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="?controller=product&action=manage">
                        <i class="align-middle" data-feather="package"></i> Quản sản phẩm
                    </a>
                </li>
            </ul>
        </li>

        <!-- Quản lý chăn nuôi -->
        <li class="sidebar-item">
            <a data-bs-toggle="collapse" href="#dropdownFarming" class="sidebar-link collapsed" aria-expanded="false">
                <i class="align-middle" data-feather="activity"></i>
                <span class="align-middle">Quản lý chăn nuôi</span>
            </a>
            <ul id="dropdownFarming" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="?controller=category_fm&action=index">
                        <i class="align-middle" data-feather="folder"></i> Quản lý danh mục chăn nuôi
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="?controller=farming_process&action=manage">
                        <i class="align-middle" data-feather="book"></i> Quản bài viết chăn nuôi
                    </a>
                </li>
            </ul>
        </li>
    <?php endif; ?>

    <!-- <li class="sidebar-item">
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <a class="sidebar-link" href="?controller=farming_process&action=manage">
                <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Quản lí cách chăn nuôi </span>
            </a>
        <?php endif; ?>

    </li>

    <li class="sidebar-item">
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <a class="sidebar-link" href="?controller=product&action=manage">
                <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Quản lí sản sản phẩm</span>
            </a>
        <?php endif; ?>

    </li> -->
    <li class="sidebar-item">
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <a class="sidebar-link" href="?controller=product&action=inventory">
                <i class="align-middle" data-feather="user-plus"></i>
                <pan class="align-middle">Quản lí sản phẩm lâu ngày</pan>
            </a>
        <?php endif; ?>

    </li>
    <li class="sidebar-item">
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <a class="sidebar-link" href="?controller=auth&action=logout">
                <i class="align-middle" data-feather="user-plus"></i>
                <pan class="align-middle">Đăng xuất</pan>
            </a>
        <?php endif; ?>

    </li>

    <li class="sidebar-item">
        <?php if ($_SESSION['role'] === 'create'): ?>
            <a class="sidebar-link" href="?controller=auth&action=logout">
                <i class="align-middle" data-feather="user-plus"></i>
                <pan class="align-middle">Đăng xuất</pan>
            </a>
        <?php endif; ?>

    </li>


</ul>