<?php $attributes = $attributes->exceptProps(['text' => '', 'title' => '', 'type' => '']); ?>
<?php foreach (array_filter((['text' => '', 'title' => '', 'type' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php switch( $type ):

    case ( 'success' ): ?>
        <?php if( $text == '' ): ?>
            <?php $class="bg-green-600"; ?>
        <?php else: ?>
            <?php $class="bg-green-100 text-green-800"; ?>
        <?php endif; ?>
        <?php break; ?>;

    <?php case ( 'danger' ): ?>
        <?php if( $text == '' ): ?>
            <?php $class="bg-red-600"; ?>
        <?php else: ?>
            <?php $class="bg-red-100 text-red-800"; ?>
        <?php endif; ?>
        <?php break; ?>;

    <?php case ( 'warning' ): ?>
        <?php if( $text == '' ): ?>
            <?php $class="bg-orange-400"; ?>
        <?php else: ?>
            <?php $class="bg-orange-100 text-orange-800"; ?>
        <?php endif; ?>
        <?php break; ?>;

    <?php case ( 'info' ): ?>
        <?php if( $text == '' ): ?>
            <?php $class="bg-blue-300"; ?>
        <?php else: ?>
            <?php $class="bg-blue-100 text-blue-800"; ?>
        <?php endif; ?>
        <?php break; ?>;

    <?php default: ?>
        <?php if( $text == '' ): ?>
            <?php $class="bg-gray-200"; ?>
        <?php else: ?>
            <?php $class="bg-gray-100 text-gray-800"; ?>
        <?php endif; ?>

<?php endswitch; ?>

<?php if( $text == '' ): ?>
    <?php $text = '&nbsp;'; ?>
<?php endif; ?>

<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo e($class); ?>" title="<?php echo e($title); ?>">
    <?php echo $text; ?>

</span>
<?php /**PATH /media/ox/Devel/laravel/jetstream/resources/views/components/badge.blade.php ENDPATH**/ ?>