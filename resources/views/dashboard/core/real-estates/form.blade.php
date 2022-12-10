<x-ui::form :route="$route" :name="$formName" :breadcrumbs="$formBreadCrumbs">
    <x-ui::form.select :options="$sides" class="select" :selected="$model?->side_id" name="side_id" :label="__('Select side')" />
    <x-ui::form.input name="street" :label="__('Type street name')" />
    <x-ui::form.input name="file_number" :label="__('Type file number')" />
    <x-ui::form.input name="estate_number" :label="__('Type estate number')" />
    <x-ui::form.input name="type" :value="__('residential')" disabled :label="__('Type estate type')" />
    <x-slot name="scripts">
        <script src="{{ asset('admin/js/select2.min.js') }}"></script>
        <script>
            
            $(function(){
                $('.select').select2();
            })
        </script>
    </x-slot>
</x-ui::form>