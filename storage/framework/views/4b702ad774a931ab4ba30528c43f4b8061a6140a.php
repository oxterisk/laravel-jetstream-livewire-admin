<?php $attributes = $attributes->exceptProps(['thead' => '', 'tbody' => '']); ?>
<?php foreach (array_filter((['thead' => '', 'tbody' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                <table class="w-full divide-y divide-gray-200 table-striped">
                    <thead class="bg-gray-200">
                        <tr>
                            <?php echo e($thead); ?>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php echo e($tbody); ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /media/ox/Devel/laravel/jetstream/resources/views/components/table.blade.php ENDPATH**/ ?>