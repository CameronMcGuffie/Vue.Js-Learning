<?php
    $page = $_GET['p'];
    $page = addslashes($page); // Clean up the GET param to remove nasties.
?>
<html>
    <head>
        <title>StudyHelper by Cameron McGuffie</title>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js" integrity="sha512-VZ6m0F78+yo3sbu48gElK4irv2dzPoep8oo9LEjxviigcnnnNvnTOJRSrIhuFk68FMLOpiNz+T77nNY89rnWDg==" crossorigin="anonymous"></script>
        <link href="/styles.css?t=<?php echo time(); /*Bypass the trusty ol Cloudflare cache*/ ?>" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="sitename">StudyHelper</div>
            </div>
            <div class="top">
                <div class="ribbon">

                </div>
                <div class="nav" id="nav">
                    <div v-for="ni in navList">
                        <div class="nav_item" :onclick=`location.href='${ni.id}'`>{{ ni.text }}</div>
                    </div>
                </div>
                <div class="ribbon">

                </div>
            </div>
            <div class="middle">
                <div class="content">
                    <?php
                        if($page == '') {
                            include('pages/home.php');
                        } elseif(file_exists('pages/' . $page . '.php') == true) {
                            include('pages/' . $page . '.php');
                        } else {
                            echo "<h2>404: That page doesn't exist yet.. Come back later :)</h2>";
                            echo "Or.. maybe you're being a sneaky snake... Naughty, we log these requests... <b>Your IP</b>: " . $_SERVER['REMOTE_ADDR'];
                        }
                    ?>
                </div>
            </div>
        </div>
        <script src="/vue/index.js?t=<?php echo time(); /*Bypass the trusty ol Cloudflare cache*/ ?>"></script>
        <?php
            if(file_exists('vue/' . $page . '.js') == true) {
                echo "<script src=\"/vue/$page.js?t=" . time() . "\"></script>";
            }
        ?>
    </body>
</html>