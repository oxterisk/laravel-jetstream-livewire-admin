<?php $attributes = $attributes->exceptProps(['iteration' => 0]); ?>
<?php foreach (array_filter((['iteration' => 0]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<tr <?php echo e($iteration % 2 == 0 ? 'class=bg-gray-50' : ''); ?>>
    <?php echo e($slot); ?>

</tr><?php /**PATH /media/ox/Devel/laravel/jetstream/resources/views/components/datetable-tr.blade.php ENDPATH**/ ?>