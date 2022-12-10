<x-ui::layout title="Dashboard">
    <div class="row">
        <div class="col-4">
            <div class="card card-body">
                
            </div>
            <div class="card card-body">
                <p class="text-black">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="font-weight-semibold mb-0">{{ $total }}</h3>
                            <span class="text-uppercase font-size-sm text-muted">{{ __('Total exclusion value') }}</span>
                        </div>

                        <div class="ml-3 align-self-center">
                            <i class="fas fa-coins fa-2x text-danger"></i>
                        </div>
                    </div>
                </p>
            </div>
        </div>
    </div>
</x-ui::layout>