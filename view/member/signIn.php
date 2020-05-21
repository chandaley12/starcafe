<!DOCTYPE HTML>
<html>

<head>
    <title></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <section id="main">
            <header>
                <span class="avatar"><img src="images/avatar.jpg" alt="" /></span>
                <h1>Star Coffee</h1>
                <p> best coffee please.</p>

                <form method="get" action="./index.php">
                    <input type="hidden" name="action" value="signin">
                    <div>
                        <label class="form"></label>
                        <!--라벨 비워둠-->
                        <input type="text" class="login" name="id" placeholder="input id">
                    </div>
                    <div>
                        <div class="input-group input-group-flat">

                            <input type="password" class="form-control" name="pw" placeholder="input password">

                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a href="#" class="login2">Show password</a>
                                </span>
                            </div>
                        </div>
                        <input type="submit" class="fit" value="login">
                    </div>
                </form>
                <form method="get" action="./index.php">
                    <input type="hidden" name="action" value="signup">
                    <input type="hidden" name="type" value="form">
                    <input type="submit" class="fit" value="signup">
                </form>
                <a href="#" class="login2">ID / PW 찾기</a>
            </header>
            <!-- Footer -->
            <footer id="footer">
            </footer>

        </section>
    </div>

    <!-- Scripts -->
    <script>
        if ('addEventListener' in window) {
            window.addEventListener('load', function() {
                document.body.className = document.body.className.replace(/\bis-preload\b/, '');
            });
            document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
        }
    </script>

</body>

</html>