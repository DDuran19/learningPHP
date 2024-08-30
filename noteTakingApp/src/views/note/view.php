<?php requireComponents("head.php"); ?>

<body class="h-full">
    <div class="min-h-full">
        <?php requireComponents("nav.php") ?>
        <?php requireComponents("banner.php", ['heading' => $heading]) ?>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <a href="/notes" class="py-6 text-blue-500 hover:underline"> Go Back</a>
                <p>
                    <?= htmlspecialchars($note['body']) ?>
                </p>
                <hr class="my-6" />
                <form method="post" class="mt-6 flex items-center justify-end gap-x-6">
                    <input type="hidden" name="__method" value="DELETE" readonly />
                    <input type="number" name="id" value="<?= $note['id'] ?>" hidden />
                    <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete</button>
                </form>
            </div>

        </main>
    </div>

</body>

</html>