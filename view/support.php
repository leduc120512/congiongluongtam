<?php
// File: support.php
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .assist-box {
            font-family: 'Inter', sans-serif;
            position: fixed;
            bottom: 20px;
            left: 20px;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 16px;
            width: 280px;
            z-index: 1000;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .assist-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .assist-title {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 12px;
            text-align: center;
            background: linear-gradient(to right, #4f46e5, #06b6d4);
            background-clip: text;
            /* Thêm thuộc tính chuẩn */
            -webkit-background-clip: text;
            /* Giữ prefix cho trình duyệt cũ */
            color: transparent;
            /* Thay -webkit-text-fill-color bằng color: transparent */
        }

        .connect-area {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            background: #f0f9ff;
            border-radius: 10px;

        }

        .connect-area:hover {
            background: #e0f2fe;
            transform: scale(1.03);
        }

        .connect-content {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .network-logo {
            width: 45px;
            height: 16px;
            object-fit: contain;
            border-radius: 4px;
        }

        .call-link {
            font-size: 15px;
            font-weight: 600;
            color: #1e40af;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .call-link:hover {
            color: #3b82f6;
            text-decoration: underline;
        }

        .chat-link {
            display: flex;
            align-items: center;
            margin-left: 8px;
        }

        .chat-link img {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            transition: transform 0.2s ease;
        }

        .chat-link:hover img {
            transform: rotate(15deg) scale(1.1);
        }

        @media (max-width: 640px) {
            .assist-box {
                width: 200px;
                bottom: 16px;
                left: 16px;
                padding: 12px;
            }

            .assist-title {
                font-size: 14px;
                margin-bottom: 10px;
            }

            .connect-area {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 8px;
            }

            .connect-content {
                gap: 6px;
            }

            .network-logo {
                width: 36px;
                height: 12px;
            }

            .call-link {
                font-size: 13px;
            }

            .chat-link img {
                width: 20px;
                height: 20px;
            }

            .chat-link {
                margin-left: 6px;
            }
        }
    </style>
</head>

<body>
    <div class="assist-box">
        <h4 class="assist-title">Hỗ trợ Tư vấn</h4>
        <div class="connect-area">
            <div class="connect-content">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTE-w1ycHZhg_1ctxIE2GK8N5c9tz4eBJpSSA&s"
                    class="network-logo"
                    alt="Viettel" />
                <a href="tel:0983525093"
                    class="call-link">
                    0983525093
                </a>
            </div>
            <a href="https://zalo.me/0983525093" target="_blank" class="chat-link">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Icon_of_Zalo.svg/1024px-Icon_of_Zalo.svg.png"
                    alt="Zalo" />
            </a>
        </div>
    </div>
</body>

</html>