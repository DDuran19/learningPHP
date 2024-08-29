<?php requireComponents("head.php"); ?>

<body class="h-full">
    <div class="min-h-full">
        <?php requireComponents("nav.php") ?>
        <?php requireComponents("banner.php", ['heading' => $heading]) ?>
        <main>
            <ul class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <?php foreach ($notes as $note) : ?>
                    <li>
                        <a class="text-blue-500 hover:underline" href="/note?id=<?= $note['id'] ?>">
                            <?= htmlspecialchars($note['body']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <p class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
            </p>
        </main>
    </div>

</body>

</html>