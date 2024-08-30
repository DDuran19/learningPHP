<?php requireComponents("head.php"); ?>

<body class="h-full">
    <div class="min-h-full">
        <?php requireComponents("nav.php") ?>
        <?php requireComponents("banner.php", ['heading' => $heading]) ?>
        <main>
            <?php
            if (isset($_GET['mode'])  && $_GET['mode'] === 'edit') {
                $mode = $_GET['mode'];
            }

            ?>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="col-span-full">
                            <a href="/notes" class="py-6 text-blue-500 hover:underline"> Go Back</a>
                            <p>
                                <?php
                                if (isset($_GET['mode'])  && $_GET['mode'] === 'edit') {
                                    require(__DIR__ . '/edit.php');
                                } else {
                                    echo htmlspecialchars($note['body']);
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">

                    <button type="submit" form="delete-note" class="text-sm font-semibold leading-6 text-gray-900">
                        <?= (isset($_GET['mode']) && $mode === 'edit') ? 'Cancel' : 'Delete' ?>
                    </button>
                    <button type="submit" form="edit-note" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <?= (isset($_GET['mode']) && $mode === 'edit') ? 'Save' : 'Edit' ?>
                    </button>
                </div>
            </div>

            <?php if (!isset($_GET['mode']) || $_GET['mode'] !== 'edit') { ?>
                <form class="hidden" hidden id="delete-note" action="/notes/<?= $note['id'] ?>" method="post">
                    <input type="hidden" name="__method" value="DELETE" readonly />
                </form>

                <form action="/notes/<?= $note['id'] ?>" method="get" class="hidden" id="edit-note" hidden>
                    <input class="hidden" type="text" name="mode" value="edit" readonly hidden />
                </form>
            <?php } else { ?>
                <form class="hidden" hidden id="delete-note" action="/notes/<?= $note['id'] ?>" method="GET">
                </form>
            <?php } ?>


        </main>
    </div>

</body>

</html>