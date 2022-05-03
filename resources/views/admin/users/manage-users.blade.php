<div>

    @include( 'admin.users.users-index' )

    <!-- Form Modal -->
    @include( 'admin.users.modal-user-form' )
    <!-- /Form Modal -->

    <!-- Form Password Modal -->
    @include( 'admin.users.modal-password-update' )
    <!-- /Form Password Modal -->

    <!-- Assign Roles Modal -->
    @include( 'admin.users.modal-user_role-assign' )
    <!-- /Assign Roles Modal -->

    <!-- Assign Companies Modal -->
    @include( 'admin.users.modal-user_company-assign' )
    <!-- /Assign Companies Modal -->

    <!-- Delete Confirmation Modal -->
    @include( 'admin.users.modal-user-destroy' )
    <!-- /Delete Confirmation Modal -->

</div>
