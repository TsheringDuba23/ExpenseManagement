<x-app-layout>

    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Fuel Claim') }}
        </h2>
    </x-slot>
    <div class="container justify-content-center">
    <div class="row"> 
    <div class="col-lg-12 margin-tb mt-3">
        <!-- <div class="pull-left mt-5">
            <h2>Edit Fuel Claim</h2>
        </div> -->
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('fuels.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('fuels.update', $fuel->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Employee Name</strong>
                <input type="text" name="employee_name"  value=" {{Auth::user()->name}}" class="form-control" placeholder="Employee Name" readonly> 
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Location</strong>
                <input type="text" name="location" value="{{ $fuel->location }}" class="form-control" placeholder="Location">
            </div>
        </div>
        <div class="col-md-6  mt-3">
            <div class="form-group">
                <strong>Date</strong>
                <input type="text" name="date" value="{{ $fuel->date }}" class="form-control" placeholder="Date">
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Vehicle No</strong>
                <input type="text" name="vehicle_no" value="{{ $fuel->vehicle_no }}" class="form-control" placeholder="Vehicle No">
            </div>
        </div>

         <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Vehicle Type</strong>
                <select class="form-select" name="vehicle_type" id="vehicleTypeSelect" value="{{ $fuel->vehicle_type }}">
                        <option value="" {{ $fuel->vehicle_type ? '' : 'selected' }}>Select a vehicle type</option>
                        <option value="Creta" {{ $fuel->vehicle_type === 'Creta' ? 'selected' : '' }}>Creta</option>
                        <option value="Maruti Ecco" {{ $fuel->vehicle_type === 'Maruti Ecco' ? 'selected' : '' }}>Maruti Ecco</option>
                        <option value="Bolero" {{ $fuel->vehicle_type === 'Bolero' ? 'selected' : '' }}>Bolero</option>
                        <option value="Santafee" {{ $fuel->vehicle_type === 'Santafee' ? 'selected' : '' }}>Santafee</option>
                        <option value="Isuzu D Max" {{ $fuel->vehicle_type === 'Isuzu D Max' ? 'selected' : '' }}>Isuzu D Max</option>
                        <option value="Isuzu S Cabin" {{ $fuel->vehicle_type === 'Isuzu S Cabin' ? 'selected' : '' }}>Isuzu S Cabin</option>
                        <option value="Motorbikes" {{ $fuel->vehicle_type === 'Motorbikes' ? 'selected' : '' }}>Motorbikes</option>
                        <option value="i-20 Active" {{ $fuel->vehicle_type === 'i-20 Active' ? 'selected' : '' }}>i-20 Active</option>
                        <option value="COW" {{ $fuel->vehicle_type === 'COW' ? 'selected' : '' }}>COW</option>
                        <option value="MUX" {{ $fuel->vehicle_type === 'MUX' ? 'selected' : '' }}>MUX</option>
                        <option value="TUV" {{ $fuel->vehicle_type === 'TUV' ? 'selected' : '' }}>TUV</option>      
                </select>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Initial KM</strong>
                <input type="text" name="initial_km" value="{{ $fuel->initial_km }}" class="form-control" placeholder="Initial KM">
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Final KM</strong>
                <input type="text" name="final_km" value="{{ $fuel->final_km }}" class="form-control" placeholder="Final KM">
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Quantity</strong>
                <input type="text" name="quantity" value="{{ $fuel->quantity }}" class="form-control" placeholder="Quantity">
            </div>
        </div>
      
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Mileage</strong>
                <input type="text" name="mileage" class="form-control" id="vehicleMileage" value="{{ $fuel->mileage }}"  readonly>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Rate</strong>
                <input type="text" name="rate" value="{{ $fuel->rate }}" class="form-control" placeholder="Rate">
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Amount</strong>
                <input type="text" name="amount" value="{{ $fuel->amount }}" class="form-control" placeholder="Amount">
            </div>
        </div>
    </div>

    <div class="row mt-5 justify-content-center">
        <button type="submit" class="btn btn-primary col-md-4">Submit</button>
    </div>
</form>
    </div>

    <script>
    const mileageValues = {
        Creta: 12,
        "Maruti Ecco": 8.5,
        Bolero: 8,
        Santafee: 11,
        "Isuzu D Max": 8.5,
        "Isuzu S Cabin": 8.5,
        Motorbikes: 28,
        "i-20 Active": 4,
        COW: 4,
        MUX: 13,
        TUV: 9,
        
        // Add more vehicle-mileage pairs here
    };

    const vehicleTypeSelect = document.getElementById('vehicleTypeSelect');
    const vehicleMileageInput = document.getElementById('vehicleMileage');

    vehicleTypeSelect.addEventListener('change', () => {
        const selectedVehicle = vehicleTypeSelect.value;
        const mileage = mileageValues[selectedVehicle] || '';
        vehicleMileageInput.value = mileage;
    });
</script>
</x-app-layout>
