<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Access System</title>
    <!-- FontAwesome สำหรับไอคอน -->
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
            overflow: hidden;
            position: relative;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* วงกลมแสงฟุ้งฉากหลัง */
        .circle-1, .circle-2 {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.6;
            z-index: 1;
        }
        .circle-1 {
            width: 300px;
            height: 300px;
            background: #6366f1;
            top: 15%;
            left: 20%;
        }
        .circle-2 {
            width: 350px;
            height: 350px;
            background: #a855f7;
            bottom: 15%;
            right: 20%;
        }

        /* การ์ด Glassmorphism */
        .login-card {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 420px;
            padding: 45px 35px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
        }

        .login-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .icon-box {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            background: linear-gradient(135deg, #6366f1, #a855f7);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.4);
        }

        .icon-box i {
            font-size: 26px;
            color: #ffffff;
        }

        .login-header h2 {
            color: #ffffff;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .login-header p {
            color: #94a3b8;
            font-size: 14px;
            margin-top: 5px;
        }

        .input-group {
            position: relative;
            margin-bottom: 22px;
        }

        .input-group label {
            display: block;
            color: #cbd5e1;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 16px;
            transition: all 0.3s;
        }

        .input-wrapper input {
            width: 100%;
            padding: 14px 16px 14px 48px;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #ffffff;
            font-size: 15px;
            outline: none;
            transition: all 0.3s ease;
        }

        .input-wrapper input::placeholder {
            color: #475569;
        }

        .input-wrapper input:focus {
            border-color: #a855f7;
            box-shadow: 0 0 15px rgba(168, 85, 247, 0.4);
            background: rgba(15, 23, 42, 0.8);
        }

        .input-wrapper input:focus + i {
            color: #a855f7;
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            margin-top: 10px;
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            border: none;
            border-radius: 12px;
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.4);
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(168, 85, 247, 0.5);
            background: linear-gradient(135deg, #4f46e5 0%, #9333ea 100%);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .footer-text {
            text-align: center;
            margin-top: 25px;
            color: #64748b;
            font-size: 12px;
        }
    </style>
</head>
<body>

    <div class="circle-1"></div>
    <div class="circle-2"></div>

    <div class="login-card">
        <div class="login-header">
            <div class="icon-box">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <h2>Login</h2>
            <p>กรุณากรอกข้อมูลเพื่อเข้าสู่ระบบ</p>
        </div>

        <form action="check_login.php" method="post">
            <div class="input-group">
                <label for="username">USERNAME</label>
                <div class="input-wrapper">
                    <input type="text" id="username" name="username" placeholder="Username" required autocomplete="off">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>

            <div class="input-group">
                <label for="password">PASSWORD</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                    <i class="fa-solid fa-lock"></i>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                SIGN IN <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i>
            </button>
        </form>

        <div class="footer-text">
            &copy; Secure Authentication Portal
        </div>
    </div>

</body>
</html>