{{-- Advane Filter Form Start --}}
<form method="GET" action="{{ route('ad.filter') }}">
    @method('GET')
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label>
                <input type="text" class="filter-input" name="keyword" id="keyword" placeholder="Keyword"
                    value="{{ request('keyword') }}">
            </label>
        </div>
        <div class="col-md-6">
            <label>
                <input type="text" class="filter-input" name="duration" id="duration" placeholder="Duration"
                    value="{{ request('duration') }}">
            </label>
        </div>
        <div class="col-md-6 mt-3">
            <select class="filter-input" name="service_id[]" id="service_id" multiple>
                <option value="">Service</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" {{ request('service_id') == $service->id ? 'selected' : '' }}>
                        {{ $service->title ?? 'N/A' }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 mt-3">
            <select class="filter-input" name="pet_id[]" id="pet_id" multiple>
                <option value="">Pet</option>
                @foreach ($petTypes as $petType)
                    <option value="{{ $petType->id }}" {{ request('pet_id') == $petType->id ? 'selected' : '' }}>
                        {{ $petType->species ?? 'N/A' }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label>
                <input type="text" class="filter-input" name="behavior" id="behavior" placeholder="Behavior"
                    value="{{ request('behavior') }}">
            </label>
        </div>
        <div class="col-md-6">
            <input type="date" class="filter-input" name="date" id="date" value="{{ request('date') }}">
        </div>
        <div class="col-md-6">
            <label>
                <input type="text" class="filter-input" name="location" id="location" placeholder="City"
                    value="{{ request('location') }}">
            </label>
        </div>
        <div class="col-md-6">
            <button class="filter-cancel-button">Cancel</button>
            <button class="filter-submit-button">Submit</button>
        </div>
    </div>
</form>
{{-- Advance Filter Form End --}}
@push('scripts')
    <script>
        $(document).ready(function() {

            $('#service_id,#pet_id').select2({
                width: '100%'
            });
        });

    </script>
@endpush
