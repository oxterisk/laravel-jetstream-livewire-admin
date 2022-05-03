<div>

    <?php echo $__env->make( 'modules.modules-index' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Form Modal -->
    <?php echo $__env->make( 'modules.modal-module-form' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Form Modal -->

    <!-- Delete Confirmation Modal -->
    <?php echo $__env->make( 'modules.modal-module-destroy' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Delete Confirmation Modal -->

</div><?php /**PATH /media/ox/Devel/laravel/jetstream/resources/views/modules/manage-modules.blade.php ENDPATH**/ ?>