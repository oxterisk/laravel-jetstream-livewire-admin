<div>

    <?php echo $__env->make( 'companies.companies-index' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Form Modal -->
    <?php echo $__env->make( 'companies.modal-company-form' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Form Modal -->

    <!-- Assign Modules Modal -->
    <?php echo $__env->make( 'companies.modal-company_module-assign' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Assign Modules Modal -->

    <!-- Delete Confirmation Modal -->
    <?php echo $__env->make( 'companies.modal-company-destroy' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Delete Confirmation Modal -->

</div>
<?php /**PATH /media/ox/Devel/laravel/jetstream/resources/views/companies/manage-companies.blade.php ENDPATH**/ ?>