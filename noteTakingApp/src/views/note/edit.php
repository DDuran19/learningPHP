<form id="edit-note" action="/notes/<?= $note['id'] ?>" method="POST" class="col-span-full">
    <input type="hidden" name="__method" value="PATCH" class="hidden" hidden readonly />
    <label for="body" class="block text-sm font-medium leading-6 text-gray-900 <?= getValueIfKeyExists($errors, 'body') ? 'text-red-500' : '' ?>">Body</label>
    <span class="text-red-500 font-semibold text-xs">
        <?= getValueIfKeyExists($errors, 'body') ?>
    </span>
    <div class="mt-2 <?= getValueIfKeyExists($errors, 'body') ? 'border border-red-500 rounded-md' : '' ?>">
        <textarea id="body" name="body" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $_POST['body'] ?? $note['body'] ?? '' ?></textarea>
    </div>
</form>