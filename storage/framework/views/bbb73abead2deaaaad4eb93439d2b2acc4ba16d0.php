<div>

    <?php echo $__env->make( 'admin.roles.roles-index' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Form Modal -->
    <?php echo $__env->make( 'admin.roles.modal-role-form' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Form Modal -->

    <!-- Assign Permissions Modal -->
    <?php echo $__env->make( 'admin.roles.modal-role_permission-assign' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Assign Permissions Modal -->

    <!-- Delete Confirmation Modal -->
    <?php echo $__env->make( 'admin.roles.modal-role-destroy' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Delete Confirmation Modal -->

</div><?php /**PATH /media/ox/Devel/laravel/jetstream/resources/views/admin/roles/manage-roles.blade.php ENDPATH**/ ?>