</html><?php requireComponents("head.php"); ?>

<body class="h-full">
    <div class="min-h-full">
        <?php requireComponents("nav.php") ?>
        <?php requireComponents("banner.php", ['heading' => $heading]) ?>
        <main>
            <form action="/notes" method="POST" class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="col-span-full">
                            <label for="body" class="block text-sm font-medium leading-6 text-gray-900 <?= getValueIfKeyExists($errors, 'body') ? 'text-red-500' : '' ?>">Body</label>

                            <span class="text-red-500 font-semibold text-xs">
                                <?= getValueIfKeyExists($errors, 'body') ?>
                            </span>
                            <div class="mt-2 <?= getValueIfKeyExists($errors, 'body') ? 'border border-red-500 rounded-md' : '' ?>">
                                <textarea id="body" name="body" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $_POST['body'] ?? '' ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>
        </main>
    </div>

</body>

</html>