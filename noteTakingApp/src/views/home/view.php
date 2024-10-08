<?php requireComponents("head.php"); ?>

<body class="h-full">
    <div class="min-h-full">
        <?php requireComponents("nav.php") ?>
        <?php requireComponents("banner.php", ['heading' => $heading]) ?>
        <main>
            <div class="mx-auto max-w-7xl flex flex-col px-4 py-6 sm:px-6 lg:px-8">
                Welcome to homepage <?= $_SESSION['userDetails']['email'] ?? '' ?>
            </div>
        </main>
    </div>

</body>

</html>