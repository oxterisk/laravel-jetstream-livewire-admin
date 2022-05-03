<?php $attributes = $attributes->exceptProps(['wrap' => true]); ?>
<?php foreach (array_filter((['wrap' => true]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<td <?php echo e($attributes->merge(['class' => 'px-6 py-4 whitespace-nowrap'])); ?>>
    <?php if( $wrap ): ?>
    <div class="text-sm text-gray-900">
        <?php echo e($slot); ?>

    </div>
    <?php else: ?>
        <?php echo e($slot); ?>

    <?php endif; ?>
</td><?php /**PATH /media/ox/Devel/laravel/jetstream/resources/views/components/datetable-td.blade.php ENDPATH**/ ?>