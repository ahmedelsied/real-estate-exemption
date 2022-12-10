<x-ui::form :route="$route" :name="$formName" :breadcrumbs="$formBreadCrumbs">
    <x-ui::form.select class="real-estate-select" name="real_estate_id" :label="__('Select real estate')" />
    <x-ui::form.input name="assigned" :label="__('Type assigned name')" />
    <x-ui::form.input name="beneficiary" :label="__('Type beneficiary name')" />
    <x-ui::form.input name="real_estate_owner" :label="__('Type real estate owner')" />
    <div class="col-12 my-5">
        <x-ui::form.toggle name="assigned_same_beneficiary" :label="__('Is assigned same beneficiary ?')"/>
    </div>
    <x-ui::form.select :options="$relationships" :selected="$model?->relationship" name="relationship" :label="__('Select relationship assigned and beneficiary')" />
    <x-ui::form.input name="national_id" :label="__('Type national id')" />
    <x-ui::form.input type="number" name="exclusion_value" :label="__('Type exclusion value')" />
    <x-ui::form.input name="notes" type="textarea" :label="__('Type notes')" />
    <x-slot name="scripts">
        <script src="{{ asset('admin/js/select2.min.js') }}"></script>
        <script>
            $('input[name=assigned_same_beneficiary]').on('change',function() {
                if(this.checked) {
                    $('select[name=relationship] option[value="same_person"]').attr("selected", "selected");
                }else{
                    $('select[name=relationship] option[value=""]').attr("selected", "selected");
                }
            });
        </script>
        <script>
            $(function(){     
                var defaultEstates = @json($realEstates),
                    firstTime = 1,
                    realEstateSelect = $('.real-estate-select');
                const estateSelect2Options = {
                    ajax:{
                        url:"{{ route('dashboard.core.real-estates.search') }}",
                        method: "GET",
                        delay:250,
                        processResults: function (response) {
                            EstatesResult = {};
                            var data = response.length == 0 ? defaultEstates : response.data;
                            $.map(data,function(estate){
                                EstatesResult[estate.id] = estate.file_number;
                            });
                            return {
                                    results: $.map(data, function (estate) {
                                                return {
                                                    text: estate.id + '#' +estate.file_number,
                                                    id: estate.id
                                                }
                                            })
                                };
                        }
                    }
                }
                realEstateSelect.on('select2:open', function (e) {
                    if(firstTime){
                        firstTime = 0;
                        $('.real-estate-select input.select2-search__field').attr('placeholder','{{ __('Type real estate name or id') }}');
                    }
                    else{
                        return false;
                    }
                });
                realEstateSelect.select2(estateSelect2Options);
            })
        </script>
    </x-slot>
</x-ui::form>