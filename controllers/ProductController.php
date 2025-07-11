<?php
require_once __DIR__ . '/../config/database.php';
require_once  __DIR__ .'/../models/Product.php';
require_once  __DIR__ . '/../models/ProductReview.php';
require_once  __DIR__ . '/../models/ProductComment.php';
require_once  __DIR__ . '/../models/CommentReply.php';
require_once  __DIR__ . '/../models/ArticleModel.php';
require_once  __DIR__ . '/../models/FarmingProcessModel.php';
class ProductController
{
    private $product;
    private $productReview;
    private $productComment;
    private $commentReply;
    private $article;
    private $FarmingProcess;
    public function __construct()
    {
        $db = Database::getInstance();
        $this->product = new Product($db->getConnection());
        $this->productReview = new ProductReview($db->getConnection());
        $this->productComment = new ProductComment($db->getConnection());
        $this->commentReply = new CommentReply($db->getConnection());
        $this->article = new ArticleModel($db->getConnection());
        $this->FarmingProcess = new FarmingProcessModel($db->getConnection());
    }
    public function index()
    {
        // Lấy 3 sản phẩm mới nhất
        $latestProducts = $this->product->getLatest();

        // Thiết lập phân trang, tìm kiếm, sắp xếp và danh mục
        $itemsPerPage = 8;
        $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($currentPage < 1) $currentPage = 1;
        $keyword = isset($_GET['search']) ? trim($_GET['search']) : '';
        $sort = isset($_GET['sort']) && strtoupper($_GET['sort']) === 'DESC' ? 'DESC' : 'ASC';
        $category_id = isset($_GET['category_id']) && $_GET['category_id'] !== '' && is_numeric($_GET['category_id']) ? (int)$_GET['category_id'] : null;
        $offset = ($currentPage - 1) * $itemsPerPage;

        if (!empty($keyword) || $category_id !== null) {
            $allProducts = $this->product->searchByName($keyword, $itemsPerPage, $offset, $sort, $category_id);
            $totalItems = $this->product->getTotalByNameAndCategory($keyword, $category_id);
        } else {
            $allProducts = $this->product->getPaginated($itemsPerPage, $offset, $sort);
            $totalItems = $this->product->getTotal();
        }

        $totalPages = ceil($totalItems / $itemsPerPage);
        if ($currentPage > $totalPages) $currentPage = $totalPages;

        // Lấy dữ liệu cho bài báo
        $category_id_art = isset($_GET['category_id_art']) && is_numeric($_GET['category_id_art']) ? (int)$_GET['category_id_art'] : null;
        $articles = $this->article->getAllAttop3($category_id_art);
        $categoryArt = $this->article->CatergorygetAllAt();

        // Lấy dữ liệu cho quy trình chăn nuôi
        $category_id_fm = isset($_GET['category_id_fm']) && is_numeric($_GET['category_id_fm']) ? (int)$_GET['category_id_fm'] : null;
        $FarmingProcess = $this->FarmingProcess->getAll($category_id_fm);
        $categoryFm = $this->FarmingProcess->CatergorygetAllfm();
        $productsTop =  $this->product->getAlltop();

        $categoryFmProducts = $this->product->getAllCategory();

        // Chuyển dữ liệu sang view
        $products = $allProducts;
        require __DIR__ . '/../view/index.php';
    }
    public function indexART()
    {
        // Lấy 3 sản phẩm mới nhất
        $latestProducts = $this->product->getLatest();

        // Thiết lập phân trang, tìm kiếm, sắp xếp và danh mục
        $itemsPerPage = 8;
        $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($currentPage < 1) $currentPage = 1;
        $keyword = isset($_GET['search']) ? trim($_GET['search']) : '';
        $sort = isset($_GET['sort']) && strtoupper($_GET['sort']) === 'DESC' ? 'DESC' : 'ASC';
        $category_id = isset($_GET['category_id']) && $_GET['category_id'] !== '' && is_numeric($_GET['category_id']) ? (int)$_GET['category_id'] : null;
        $offset = ($currentPage - 1) * $itemsPerPage;

        if (!empty($keyword) || $category_id !== null) {
            $allProducts = $this->product->searchByName($keyword, $itemsPerPage, $offset, $sort, $category_id);
            $totalItems = $this->product->getTotalByNameAndCategory($keyword, $category_id);
        } else {
            $allProducts = $this->product->getPaginated($itemsPerPage, $offset, $sort);
            $totalItems = $this->product->getTotal();
        }

        $totalPages = ceil($totalItems / $itemsPerPage);
        if ($currentPage > $totalPages) $currentPage = $totalPages;

        // Lấy dữ liệu cho bài báo
        $category_id_art = isset($_GET['category_id_art']) && is_numeric($_GET['category_id_art']) ? (int)$_GET['category_id_art'] : null;
        $articles = $this->article->getAllAttop3($category_id_art);
        $categoryArt = $this->article->CatergorygetAllAt();

        // Lấy dữ liệu cho quy trình chăn nuôi
        $category_id_fm = isset($_GET['category_id_fm']) && is_numeric($_GET['category_id_fm']) ? (int)$_GET['category_id_fm'] : null;
        $FarmingProcess = $this->FarmingProcess->getAll($category_id_fm);
        $categoryFm = $this->FarmingProcess->CatergorygetAllfm();
        $productsTop =  $this->product->getAlltop();

        $categoryFmProducts = $this->product->getAllCategory();

        // Chuyển dữ liệu sang view
        $products = $allProducts;
        require __DIR__ . '/../view/detailArt.php';
    }
    private function createSlug($string)
{
    $slug = strtolower(trim($string));
    $slug = preg_replace('/[^a-z0-9\s-]/u', '', $slug);
    $slug = preg_replace('/[\s-]+/', '-', $slug);
    return $slug;
}

    public function indexART1()
    {
        // Lấy 3 sản phẩm mới nhất
        $latestProducts = $this->product->getLatest();

        // Thiết lập phân trang, tìm kiếm, sắp xếp và danh mục
        $itemsPerPage = 8;
        $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($currentPage < 1) $currentPage = 1;
        $keyword = isset($_GET['search']) ? trim($_GET['search']) : '';
        $sort = isset($_GET['sort']) && strtoupper($_GET['sort']) === 'DESC' ? 'DESC' : 'ASC';
        $category_id = isset($_GET['category_id']) && $_GET['category_id'] !== '' && is_numeric($_GET['category_id']) ? (int)$_GET['category_id'] : null;
        $offset = ($currentPage - 1) * $itemsPerPage;

        if (!empty($keyword) || $category_id !== null) {
            $allProducts = $this->product->searchByName($keyword, $itemsPerPage, $offset, $sort, $category_id);
            $totalItems = $this->product->getTotalByNameAndCategory($keyword, $category_id);
        } else {
            $allProducts = $this->product->getPaginated($itemsPerPage, $offset, $sort);
            $totalItems = $this->product->getTotal();
        }

        $totalPages = ceil($totalItems / $itemsPerPage);
        if ($currentPage > $totalPages) $currentPage = $totalPages;

        // Lấy dữ liệu cho bài báo
        $category_id_art = isset($_GET['category_id_art']) && is_numeric($_GET['category_id_art']) ? (int)$_GET['category_id_art'] : null;
        $articles = $this->article->getAllAttop3($category_id_art);
        $categoryArt = $this->article->CatergorygetAllAt();

        // Lấy dữ liệu cho quy trình chăn nuôi
        $category_id_fm = isset($_GET['category_id_fm']) && is_numeric($_GET['category_id_fm']) ? (int)$_GET['category_id_fm'] : null;
        $FarmingProcess = $this->FarmingProcess->getAll($category_id_fm);
        $categoryFm = $this->FarmingProcess->CatergorygetAllfm();
        $productsTop =  $this->product->getAlltop();

        $categoryFmProducts = $this->product->getAllCategory();

        // Chuyển dữ liệu sang view
        $products = $allProducts;
        require __DIR__ . '/../view/farming.php';
    }
    protected function shareCommonData()
    {
        $categoryArt = $this->article->CatergorygetAllAt();
        $categoryFm = $this->FarmingProcess->CatergorygetAllfm();
        $categoryFmProducts = $this->product->getAllCategory();
        require __DIR__ . '/../view/header_wrapper.php';
    }
    protected function shareCommonData1()
    {
        $categoryArt = $this->article->CatergorygetAllAt();
        $categoryFm = $this->FarmingProcess->CatergorygetAllfm();
        $categoryFmProducts = $this->product->getAllCategory();
        require __DIR__ . '/../view/farming.php';
    }
    public function indexdETAIL()
    {
        // Lấy 3 sản phẩm mới nhất
        $latestProducts = $this->product->getLatest();

        // Thiết lập phân trang, tìm kiếm, sắp xếp và danh mục
        $itemsPerPage = 8;
        $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($currentPage < 1) $currentPage = 1;
        $keyword = isset($_GET['search']) ? trim($_GET['search']) : '';
        $sort = isset($_GET['sort']) && strtoupper($_GET['sort']) === 'DESC' ? 'DESC' : 'ASC';
        $category_id = isset($_GET['category_id']) && $_GET['category_id'] !== '' && is_numeric($_GET['category_id']) ? (int)$_GET['category_id'] : null;
        $offset = ($currentPage - 1) * $itemsPerPage;

        if (!empty($keyword) || $category_id !== null) {
            $allProducts = $this->product->searchByName($keyword, $itemsPerPage, $offset, $sort, $category_id);
            $totalItems = $this->product->getTotalByNameAndCategory($keyword, $category_id);
        } else {
            $allProducts = $this->product->getPaginated($itemsPerPage, $offset, $sort);
            $totalItems = $this->product->getTotal();
        }

        $totalPages = ceil($totalItems / $itemsPerPage);
        if ($currentPage > $totalPages) $currentPage = $totalPages;

        // Lấy dữ liệu cho bài báo
        $category_id_art = isset($_GET['category_id_art']) && is_numeric($_GET['category_id_art']) ? (int)$_GET['category_id_art'] : null;
        $articles = $this->article->getAllAttop3($category_id_art);
        $categoryArt = $this->article->CatergorygetAllAt();

        // Lấy dữ liệu cho quy trình chăn nuôi
        $category_id_fm = isset($_GET['category_id_fm']) && is_numeric($_GET['category_id_fm']) ? (int)$_GET['category_id_fm'] : null;
        $FarmingProcess = $this->FarmingProcess->getAll($category_id_fm);
        $categoryFm = $this->FarmingProcess->CatergorygetAllfm();
        $productsTop =  $this->product->getAlltop();

        $categoryFmProducts = $this->product->getAllCategory();

        // Chuyển dữ liệu sang view
        $products = $allProducts;
        require __DIR__ . '/../view/detail.php';
    }
    public function indexHeader()
    {
        // Lấy 3 sản phẩm mới nhất
        $latestProducts = $this->product->getLatest();

        // Thiết lập phân trang, tìm kiếm, sắp xếp và danh mục
        $itemsPerPage = 8;
        $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($currentPage < 1) $currentPage = 1;
        $keyword = isset($_GET['search']) ? trim($_GET['search']) : '';
        $sort = isset($_GET['sort']) && strtoupper($_GET['sort']) === 'DESC' ? 'DESC' : 'ASC';
        $category_id = isset($_GET['category_id']) && $_GET['category_id'] !== '' && is_numeric($_GET['category_id']) ? (int)$_GET['category_id'] : null;
        $offset = ($currentPage - 1) * $itemsPerPage;

        if (!empty($keyword) || $category_id !== null) {
            $allProducts = $this->product->searchByName($keyword, $itemsPerPage, $offset, $sort, $category_id);
            $totalItems = $this->product->getTotalByNameAndCategory($keyword, $category_id);
        } else {
            $allProducts = $this->product->getPaginated($itemsPerPage, $offset, $sort);
            $totalItems = $this->product->getTotal();
        }

        $totalPages = ceil($totalItems / $itemsPerPage);
        if ($currentPage > $totalPages) $currentPage = $totalPages;

        // Lấy dữ liệu cho bài báo
        $category_id_art = isset($_GET['category_id_art']) && is_numeric($_GET['category_id_art']) ? (int)$_GET['category_id_art'] : null;
        $articles = $this->article->getAllAttop3($category_id_art);
        $categoryArt = $this->article->CatergorygetAllAt();

        // Lấy dữ liệu cho quy trình chăn nuôi
        $category_id_fm = isset($_GET['category_id_fm']) && is_numeric($_GET['category_id_fm']) ? (int)$_GET['category_id_fm'] : null;
        $FarmingProcess = $this->FarmingProcess->getAll($category_id_fm);
        $categoryFm = $this->FarmingProcess->CatergorygetAllfm();
        $productsTop =  $this->product->getAlltop();

        $categoryFmProducts = $this->product->getAllCategory();

        // Chuyển dữ liệu sang view
        $products = $allProducts;
        require __DIR__ . '/../view/header.php';
    }



    public function indexHeader_nav()
    {
        // Lấy 3 sản phẩm mới nhất
        $latestProducts = $this->product->getLatest();

        // Thiết lập phân trang, tìm kiếm, sắp xếp và danh mục
        $itemsPerPage = 8;
        $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($currentPage < 1) $currentPage = 1;
        $keyword = isset($_GET['search']) ? trim($_GET['search']) : '';
        $sort = isset($_GET['sort']) && strtoupper($_GET['sort']) === 'DESC' ? 'DESC' : 'ASC';
        $category_id = isset($_GET['category_id']) && $_GET['category_id'] !== '' && is_numeric($_GET['category_id']) ? (int)$_GET['category_id'] : null;
        $offset = ($currentPage - 1) * $itemsPerPage;

        if (!empty($keyword) || $category_id !== null) {
            $allProducts = $this->product->searchByName($keyword, $itemsPerPage, $offset, $sort, $category_id);
            $totalItems = $this->product->getTotalByNameAndCategory($keyword, $category_id);
        } else {
            $allProducts = $this->product->getPaginated($itemsPerPage, $offset, $sort);
            $totalItems = $this->product->getTotal();
        }

        $totalPages = ceil($totalItems / $itemsPerPage);
        if ($currentPage > $totalPages) $currentPage = $totalPages;

        // Lấy dữ liệu cho bài báo
        $category_id_art = isset($_GET['category_id_art']) && is_numeric($_GET['category_id_art']) ? (int)$_GET['category_id_art'] : null;
        $articles = $this->article->getAllAttop3($category_id_art);
        $categoryArt = $this->article->CatergorygetAllAt();

        // Lấy dữ liệu cho quy trình chăn nuôi
        $category_id_fm = isset($_GET['category_id_fm']) && is_numeric($_GET['category_id_fm']) ? (int)$_GET['category_id_fm'] : null;
        $FarmingProcess = $this->FarmingProcess->getAll($category_id_fm);
        $categoryFm = $this->FarmingProcess->CatergorygetAllfm();
        $productsTop =  $this->product->getAlltop();

        $categoryFmProducts = $this->product->getAllCategory();

        // Chuyển dữ liệu sang view
        $products = $allProducts;
        require __DIR__ . '/../view/Header_nav.php';
    }


    public function index2()
    {
        $categoryFmProductsone = $this->FarmingProcess->getAllMain();
        require __DIR__ . '/../view/detailList.php';
    }
    public function inventory()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?controller=auth&action=login");
            exit;
        }

        // Thiết lập phân trang
        $itemsPerPage = 8; // Số sản phẩm mỗi trang
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Trang hiện tại
        if ($currentPage < 1) $currentPage = 1;
        $offset = ($currentPage - 1) * $itemsPerPage; // Vị trí bắt đầu

        // Lấy danh sách sản phẩm tồn kho trên 3 tháng với phân trang
        $unsoldProducts = $this->product->getUnsoldProducts($itemsPerPage, $offset);
        $totalUnsoldItems = $this->product->getTotalUnsoldProducts();

        $totalPages = ceil($totalUnsoldItems / $itemsPerPage); // Tổng số trang
        if ($currentPage > $totalPages) $currentPage = $totalPages;

        require __DIR__ . '/../view/inventory.php';
    }
    public function manage()
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header("Location: ?controller=product&action=index");
            exit;
        }

        // Get search parameters from GET request
        $name = isset($_GET['name']) ? trim($_GET['name']) : '';
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int)$_GET['id'] : null;
        $start_date = isset($_GET['start_date']) ? trim($_GET['start_date']) : null;
        $end_date = isset($_GET['end_date']) ? trim($_GET['end_date']) : null;

        // Validate dates
        if ($start_date && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $start_date)) {
            $start_date = null;
        }
        if ($end_date && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $end_date)) {
            $end_date = null;
        }

        // Fetch products with search parameters
        $products = $this->product->getAllAdmin($name, $id, $start_date, $end_date);

        // Load the view
        require __DIR__ . '/../view/admin_manager.php';
    }
    public function add()
    {
        header('Content-Type: application/json');
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            echo json_encode(['success' => false, 'message' => 'Bạn không có quyền truy cập.']);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
            error_log('$_FILES: ' . print_r($_FILES, true));

            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
            $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT, ['options' => ['default' => null]]);
            $top = isset($_POST['top']) && $_POST['top'] == '1' ? true : false;

            if (!$name || $price === false || $quantity === false) {
                echo json_encode(['success' => false, 'message' => 'Vui lòng điền đầy đủ và đúng các trường bắt buộc.']);
                exit;
            }

            $image_urls = [];
            $upload_dir = "../public/img/";
            if (!is_writable($upload_dir)) {
                echo json_encode(['success' => false, 'message' => 'Thư mục img không có quyền ghi.']);
                exit;
            }

            if (isset($_FILES['img']) && is_array($_FILES['img']['name'])) {
                $allowed_exts = ['jpg', 'jpeg', 'png', 'gif'];
                $file_count = count($_FILES['img']['name']);
                error_log("Number of files uploaded: $file_count");

                for ($i = 0; $i < $file_count; $i++) {
                    if ($_FILES['img']['error'][$i] === UPLOAD_ERR_OK) {
                        $img_name = $_FILES['img']['name'][$i];
                        $img_tmp = $_FILES['img']['tmp_name'][$i];
                        $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                        error_log("Processing file $i: $img_name, Extension: $img_ext");

                        if (!in_array($img_ext, $allowed_exts)) {
                            echo json_encode(['success' => false, 'message' => "Định dạng ảnh $img_name không hợp lệ. Chỉ chấp nhận JPG, PNG, hoặc GIF."]);
                            exit;
                        }

                        $img_new_name = uniqid() . '.' . $img_ext;
                        $target = $upload_dir . $img_new_name;
                        if (move_uploaded_file($img_tmp, $target)) {
                            $image_urls[] = $img_new_name;
                            error_log("Uploaded file $i: $img_new_name");
                        } else {
                            error_log("Failed to upload file $i: $img_name");
                            echo json_encode(['success' => false, 'message' => "Tải ảnh $img_name lên thất bại."]);
                            exit;
                        }
                    } else {
                        error_log("File $i error code: " . $_FILES['img']['error'][$i]);
                    }
                }
            }

            error_log('Image URLs to insert: ' . print_r($image_urls, true));
            if ($this->product->add($name, $price, $quantity, $description, $category_id, $top, $image_urls)) {
                echo json_encode(['success' => true, 'message' => 'Thêm sản phẩm thành công.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Thêm sản phẩm thất bại.']);
            }
            exit;
        }

        require __DIR__ . '/../view/admin_manager.php';
    }
    
    public function edit($id)
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            if ($this->isAjaxRequest()) {
                echo json_encode(['success' => false, 'message' => 'Bạn cần đăng nhập với vai trò admin.']);
                exit;
            }
            header("Location: ?controller=auth&action=login");
            exit;
        }

        // Validate product ID
        $product_id = filter_var($id, FILTER_VALIDATE_INT);
        if (!$product_id) {
            if ($this->isAjaxRequest()) {
                echo json_encode(['success' => false, 'message' => 'ID sản phẩm không hợp lệ.']);
                exit;
            }
            $_SESSION['error'] = "ID sản phẩm không hợp lệ.";
            header("Location: ?controller=product&action=manage");
            exit;
        }

        // Fetch product data
        $product = $this->product->getById($product_id);
        if (!$product) {
            if ($this->isAjaxRequest()) {
                echo json_encode(['success' => false, 'message' => 'Sản phẩm không tồn tại.']);
                exit;
            }
            $_SESSION['error'] = "Sản phẩm không tồn tại.";
            header("Location: ?controller=product&action=manage");
            exit;
        }

        if (isset($_POST['edit_product'])) {
            // Sanitize and validate inputs
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
            $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
            $is_locked = isset($_POST['is_locked']) ? 1 : 0;
            $top = isset($_POST['top']) && $_POST['top'] == '1' ? true : false;

            // Validate required fields
            if (!$name || $price === false || $quantity === false || !$category_id) {
                if ($this->isAjaxRequest()) {
                    echo json_encode(['success' => false, 'message' => 'Vui lòng điền đầy đủ và đúng các trường bắt buộc.']);
                    exit;
                }
                $_SESSION['error'] = "Vui lòng điền đầy đủ và đúng các trường bắt buộc.";
                header("Location: ?controller=product&action=edit&id=$product_id");
                exit;
            }

            // Handle image deletion
            $delete_images = isset($_POST['delete_images']) ? (array) $_POST['delete_images'] : [];
            if (!empty($delete_images)) {
                $delete_images = array_map('intval', $delete_images); // Sanitize IDs
                $this->product->deleteImages($product_id, $delete_images);
            }

            // Handle new image uploads
            $image_urls = [];
            if (!empty($_FILES['img']['name'][0])) {
                $allowed_exts = ['jpg', 'jpeg', 'png', 'gif'];
                foreach ($_FILES['img']['name'] as $key => $img_name) {
                    if ($_FILES['img']['error'][$key] === UPLOAD_ERR_OK) {
                        $img_tmp = $_FILES['img']['tmp_name'][$key];
                        $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));

                        if (!in_array($img_ext, $allowed_exts)) {
                            if ($this->isAjaxRequest()) {
                                echo json_encode(['success' => false, 'message' => 'Định dạng ảnh không hợp lệ. Chỉ chấp nhận JPG, PNG, hoặc GIF.']);
                                exit;
                            }
                            $_SESSION['error'] = "Định dạng ảnh không hợp lệ. Chỉ chấp nhận JPG, PNG, hoặc GIF.";
                            header("Location: ?controller=product&action=edit&id=$product_id");
                            exit;
                        }

                        $img_new_name = uniqid() . '.' . $img_ext;
                        $target = "../public/img/" . $img_new_name;

                        if (move_uploaded_file($img_tmp, $target)) {
                            $image_urls[] = $img_new_name;
                        } else {
                            if ($this->isAjaxRequest()) {
                                echo json_encode(['success' => false, 'message' => 'Tải ảnh lên thất bại.']);
                                exit;
                            }
                            $_SESSION['error'] = "Tải ảnh lên thất bại.";
                            header("Location: ?controller=product&action=edit&id=$product_id");
                            exit;
                        }
                    }
                }
            }

            // Call model’s edit method
            if ($this->product->edit($product_id, $name, $price, $quantity, $description, $category_id, $is_locked, $top, $image_urls)) {
                if ($this->isAjaxRequest()) {
                    echo json_encode(['success' => true, 'message' => 'Cập nhật sản phẩm thành công.']);
                    exit;
                }
                $_SESSION['success'] = "Cập nhật sản phẩm thành công.";
                header("Location: ?controller=product&action=manage");
            } else {
                if ($this->isAjaxRequest()) {
                    echo json_encode(['success' => false, 'message' => 'Cập nhật sản phẩm thất bại.']);
                    exit;
                }
                $_SESSION['error'] = "Cập nhật sản phẩm thất bại.";
                header("Location: ?controller=product&action=edit&id=$product_id");
            }
            exit;
        }

        // Load the edit product view
        require __DIR__ . '/../view/edit_product.php';
    }

    // Helper method to detect AJAX request
    private function isAjaxRequest()
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
    public function remove_image()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Bạn cần đăng nhập với vai trò admin.']);
            exit;
        }

        // Get and validate parameters
        $product_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $image_id = filter_input(INPUT_GET, 'image_id', FILTER_VALIDATE_INT);

        if (!$product_id || !$image_id) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'ID sản phẩm hoặc ID ảnh không hợp lệ.']);
            exit;
        }

        // Check if the image belongs to the product
        $image = $this->product->getImageById($image_id);
        if (!$image || $image['product_id'] != $product_id) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Ảnh không tồn tại hoặc không thuộc sản phẩm này.']);
            exit;
        }

        // Delete the image
        if ($this->product->deleteImage($image_id)) {
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Xóa ảnh thành công.']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Xóa ảnh thất bại.']);
        }
        exit;
    }
    public function searchAjax()
    {
        try {
            $keyword = isset($_GET['search']) ? trim($_GET['search']) : '';
            $sort = isset($_GET['sort']) && strtoupper($_GET['sort']) === 'DESC' ? 'DESC' : 'ASC';
            // Explicitly cast category_id to int, treat empty string or invalid as null
            $category_id = isset($_GET['category_id']) && $_GET['category_id'] !== '' && is_numeric($_GET['category_id']) ? (int)$_GET['category_id'] : null;
            $itemsPerPage = 8;
            $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
            if ($currentPage < 1) $currentPage = 1;
            $offset = ($currentPage - 1) * $itemsPerPage;

            error_log("searchAjax input: keyword=$keyword, sort=$sort, category_id=" . var_export($category_id, true) . ", page=$currentPage");

            // Validate category_id exists in categories table
            if ($category_id !== null) {
                $categories = $this->product->getAllCategory();
                $valid_category = array_filter($categories, fn($cat) => $cat['ID'] == $category_id);
                if (empty($valid_category)) {
                    error_log("Invalid category_id: $category_id");
                    echo json_encode([
                        'products' => [],
                        'totalPages' => 0,
                        'currentPage' => $currentPage,
                        'keyword' => $keyword,
                        'sort' => $sort,
                        'category_id' => $category_id,
                        'error' => 'Danh mục không hợp lệ'
                    ]);
                    exit;
                }
            }

            if (!empty($keyword) || $category_id !== null) {
                $products = $this->product->searchByName($keyword, $itemsPerPage, $offset, $sort, $category_id);
                $totalItems = $this->product->getTotalByNameAndCategory($keyword, $category_id);
            } else {
                $products = $this->product->getPaginated($itemsPerPage, $offset, $sort);
                $totalItems = $this->product->getTotal();
            }

            $totalPages = ceil($totalItems / $itemsPerPage);

            error_log("searchAjax output: products=" . count($products) . ", totalItems=$totalItems, totalPages=$totalPages");

            echo json_encode([
                'products' => $products,
                'totalPages' => $totalPages,
                'currentPage' => $currentPage,
                'keyword' => $keyword,
                'sort' => $sort,
                'category_id' => $category_id
            ]);
            exit;
        } catch (Exception $e) {
            error_log("Lỗi trong searchAjax: " . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => 'Có lỗi xảy ra trên server: ' . $e->getMessage()]);
            exit;
        }
    }

    public function detail($id)
    {

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === false || $id === null) {
            $_SESSION['error'] = "ID sản phẩm không hợp lệ.";
            header("Location: ?controller=product&action=index&redirected=1");
            exit;
        }
        $product = $this->product->getById($id);
        if (!$product) {
            $_SESSION['error'] = "Sản phẩm không tồn tại.";
            header("Location: ?controller=product&action=index&redirected=1");
            exit;
        }

        // Lấy đánh giá và bình luận
        $reviews = $this->productReview->getByProductId($id);
        $comments = $this->productComment->getByProductId($id);
        $averageRating = $this->productReview->getAverageRating($id);

        // Lấy trả lời cho từng bình luận
        foreach ($comments as &$comment) {
            $comment['replies'] = $this->commentReply->getByCommentId($comment['ID']);
        }
        $categoryFmProductsone = $this->FarmingProcess->getAllMain();
        $categoryartProductsone = $this->article->getAllMain();

        require_once __DIR__ . '/../view/detail.php';
    }
    public function addReview()
    {
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập để đánh giá.']);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
            $rating = filter_input(INPUT_POST, 'rating', FILTER_VALIDATE_INT);
            $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($product_id === false || $rating === false || $rating < 1 || $rating > 5) {
                echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ.']);
                exit;
            }

            if ($this->productReview->add($product_id, $_SESSION['user_id'], $rating, $comment)) {
                echo json_encode(['success' => true, 'message' => 'Thêm đánh giá thành công.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Thêm đánh giá thất bại.']);
            }
        }
        exit;
    }

    public function addComment()
    {
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập để bình luận.']);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
            $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($product_id === false || empty($comment)) {
                echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ.']);
                exit;
            }

            if ($this->productComment->add($product_id, $_SESSION['user_id'], $comment)) {
                echo json_encode(['success' => true, 'message' => 'Thêm bình luận thành công.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Thêm bình luận thất bại.']);
            }
        }
        exit;
    }

    public function addReply()
    {
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập để trả lời.']);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment_id = filter_input(INPUT_POST, 'comment_id', FILTER_VALIDATE_INT);
            $reply = filter_input(INPUT_POST, 'reply', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($comment_id === false || empty($reply)) {
                echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ.']);
                exit;
            }

            if ($this->commentReply->add($comment_id, $_SESSION['user_id'], $reply)) {
                echo json_encode(['success' => true, 'message' => 'Thêm trả lời thành công.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Thêm trả lời thất bại.']);
            }
        }
        exit;
    }


    public function delete($id)
    {
        if ($_SESSION['role'] !== 'admin') return;
        $this->product->delete($id);
        header("Location: ?controller=product&action=manage");
    }
    public function searchAjax_2()
    {
        header('Content-Type: application/json');

        // Get search parameters from POST request
        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
        $id = isset($_POST['id']) && is_numeric($_POST['id']) ? (int)$_POST['id'] : null;
        $start_date = isset($_POST['start_date']) ? trim($_POST['start_date']) : null;
        $end_date = isset($_POST['end_date']) ? trim($_POST['end_date']) : null;

        // Validate dates
        if ($start_date && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $start_date)) {
            $start_date = null;
        }
        if ($end_date && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $end_date)) {
            $end_date = null;
        }

        // Fetch products
        $products = $this->product->getAllAdmin($name, $id, $start_date, $end_date);

        // Return JSON response
        echo json_encode(['success' => true, 'products' => $products]);
        exit;
    }
}
