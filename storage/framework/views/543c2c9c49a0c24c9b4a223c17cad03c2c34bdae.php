<div>

    <?php echo $__env->make( 'admin.users.users-index' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Form Modal -->
    <?php echo $__env->make( 'admin.users.modal-user-form' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Form Modal -->

    <!-- Form Password Modal -->
    <?php echo $__env->make( 'admin.users.modal-password-update' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Form Password Modal -->

    <!-- Assign Roles Modal -->
    <?php echo $__env->make( 'admin.users.modal-user_role-assign' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Assign Roles Modal -->

    <!-- Assign Companies Modal -->
    <?php echo $__env->make( 'admin.users.modal-user_company-assign' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Assign Companies Modal -->

    <!-- Delete Confirmation Modal -->
    <?php echo $__env->make( 'admin.users.modal-user-destroy' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Delete Confirmation Modal -->

</div>
<?php /**PATH /media/ox/Devel/laravel/jetstream/resources/views/admin/users/manage-users.blade.php ENDPATH**/ ?>