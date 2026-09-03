<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- $2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(-45deg, #0f172a, #1e1b4b, #311042, #020617);
            background-size: 400% 400%;
            animation: gradientBG 12s ease infinite;
            position: relative;
            overflow: hidden;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* เอฟเฟกต์ไฟฉากหลัง */
        .circle-1, .circle-2 {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.5;
            z-index: 1;
        }
        .circle-1 {
            width: 350px;
            height: 350px;
            background: #6366f1;
            top: 10%;
            right: 15%;
        }
        .circle-2 {
            width: 300px;
            height: 300px;
            background: #a855f7;
            bottom: 10%;
            left: 15%;
        }

        /* การ์ดหลัก */
        .dashboard-card {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 450px;
            padding: 40px 30px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
            text-align: center;
        }

        .avatar-box {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #6366f1, #a855f7);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.4);
            border: 3px solid rgba(255, 255, 255, 0.2);
        }

        .avatar-box i {
            font-size: 36px;
            color: #ffffff;
        }

        .welcome-text {
            color: #94a3b8;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .username {
            color: #ffffff;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 25px;
            word-break: break-all;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            background: rgba(34, 197, 94, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #4ade80;
            border-radius: 20px;
            font-size: 13px;
            margin-bottom: 30px;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background-color: #22c55e;
            border-radius: 50%;
            box-shadow: 0 0 8px #22c55e;
        }

        .btn-logout {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 14px;
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid rgba(239, 68, 68, 0.4);
            border-radius: 12px;
            color: #fca5a5;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: rgba(239, 68, 68, 0.8);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(239, 68, 68, 0.3);
        }

        .btn-logout:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>

    <div class="circle-1"></div>
    <div class="circle-2"></div>

    <div class="dashboard-card">
        <div class="avatar-box">
            <i class="fa-solid fa-user-check"></i>
        </div>
        
        <p class="welcome-text">ยินดีต้อนรับเข้าสู่ระบบ</p>
        <h1 class="username">คุณ <?= htmlspecialchars($_SESSION["username"]) ?></h1>

        <div class="status-badge">
            <span class="status-dot"></span> Online System Active
        </div>

        <div>
            <a href="logout.php" class="btn-logout">
                <i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ (Logout)
            </a>
        </div>
    </div>

</body>
</html>