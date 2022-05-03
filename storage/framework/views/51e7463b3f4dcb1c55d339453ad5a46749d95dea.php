<?php $attributes = $attributes->exceptProps(['filters' => '', 'actions' => '', 'thead' => '', 'tbody' => '', 'data' => '', 'searchModel' => '']); ?>
<?php foreach (array_filter((['filters' => '', 'actions' => '', 'thead' => '', 'tbody' => '', 'data' => '', 'searchModel' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="mb-5">
    <?php if( session()->has('flash.banner') ): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.banner','data' => ['style' => ''.e(session('flash.bannerStyle')).'','message' => ''.e(session('flash.banner')).'']]); ?>
<?php $component->withName('jet-banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['style' => ''.e(session('flash.bannerStyle')).'','message' => ''.e(session('flash.banner')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>
</div>

<?php if( $searchModel != '' || $actions != '' ): ?>
<div class="flex flex-col md:flex-row justify-between gap-3 mb-5">
    <?php if( $searchModel != '' ): ?>
    <div class="relative rounded-md shadow-sm order-2 md:order-1">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <span class="text-gray-500 sm:text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </span>
        </div>
        <input wire:model.debounce.500ms="<?php echo e($searchModel); ?>" type="text" name="search-<?php echo e($searchModel); ?>" id="search-<?php echo e($searchModel); ?>" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Search">
    </div>
    <?php endif; ?>
    <div class="order-1 md:order-2">
        <div>
            <?php echo e($actions); ?>

        </div>
    </div>
</div>
<?php endif; ?>

<?php if( $filters != '' ): ?>
<div class="bg-gray-50 shadow mb-5 p-4 rounded-md text-gray-800 text-sm">
    <?php echo e($filters); ?>

</div>
<?php endif; ?>

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                <table class="w-full divide-y divide-gray-200 table-striped">
                    <thead class="bg-gray-200">
                        <tr>
                            <?php echo e($thead); ?>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php echo e($tbody); ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php if( $data != '' ): ?>
<div class="mt-4">
    <?php echo e($data->links()); ?>

</div>
<?php endif; ?><?php /**PATH /media/ox/Devel/laravel/jetstream/resources/views/components/datetable.blade.php ENDPATH**/ ?>