<div>

    <?php echo $__env->make( 'admin.permissions.permissions-index' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Form Modal -->
    <?php echo $__env->make( 'admin.permissions.modal-permission-form' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Form Modal -->

    <!-- Delete Confirmation Modal -->
    <?php echo $__env->make( 'admin.permissions.modal-permission-destroy' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Delete Confirmation Modal -->

</div><?php /**PATH /media/ox/Devel/laravel/jetstream/resources/views/admin/permissions/manage-permissions.blade.php ENDPATH**/ ?>