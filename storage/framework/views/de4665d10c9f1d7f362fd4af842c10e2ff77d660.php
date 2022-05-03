<div>

    <?php echo $__env->make( 'users.list-users' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Form Modal -->
    <?php echo $__env->make( 'users.modal-user-form' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Form Modal -->

    <!-- Form Password Modal -->
    <?php echo $__env->make( 'users.modal-password-update' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Form Password Modal -->

    <!-- Assign Roles Modal -->
    <?php echo $__env->make( 'users.modal-user_role-assign' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Assign Roles Modal -->

    <!-- Assign Companies Modal -->
    <?php echo $__env->make( 'users.modal-user_company-assign' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Assign Companies Modal -->

    <!-- Delete Confirmation Modal -->
    <?php echo $__env->make( 'users.modal-user-delete' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Delete Confirmation Modal -->

</div>
<?php /**PATH /media/ox/Devel/laravel/jetstream/resources/views/users/manage-users.blade.php ENDPATH**/ ?>