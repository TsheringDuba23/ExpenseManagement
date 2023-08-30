<x-app-layout>

    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Fuel Claim') }}
        </h2>
    </x-slot>
    <div class="container justify-contemt-center">
    <div class="row">
    <div class="col-lg-12 margin-tb mt-3">
        <!-- <div class="pull-left mt-5">
            <h3>Add Fuel Claim</h3>
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
   
<form action="{{ route('fuels.store') }}" method="POST">
    @csrf
  
    <div class="row">
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Employee Name</strong>
                <!-- <input type="text" name="employee_name" class="form-control" placeholder="Employee Name"> -->
                <input type="text" name="employee_name" class="form-control" placeholder="Employee ID" value=" {{Auth::user()->name}}" readonly>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Location</strong>
                <input type="text" name="location" class="form-control" placeholder="Location">
            </div>
        </div>
        <div class="col-md-6  mt-3">
            <div class="form-group">
                <strong>Date</strong>
                <input type="date" name="date" class="form-control" placeholder="Date">
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Vehicle No</strong>
                <input type="text" name="vehicle_no" class="form-control" placeholder="Vehicle No">
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Vehicle Type</strong>
                <select class="form-select" name="vehicle_type" id="vehicleTypeSelect">
                    <option value="" selected>Select a vehicle type</option>
                    <option value="Creta">Creta</option>
                    <option value="Maruti Ecco">Maruti Ecco</option>
                    <option value="Bolero">Bolero</option>
                    <option value="Santafee">Santafee</option>
                    <option value="Isuzu D Max">Isuzu D Max</option>
                    <option value="Isuzu S Cabin">Isuzu S Cabin</option>
                    <option value="Motorbikes">Motorbikes</option>
                    <option value="i-20 Active">i-20 Active</option>
                    <option value="COW">COW</option>
                    <option value="MUX">MUX</option>
                    <option value="TUV">TUV</option>
                        
                </select>
        </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Initial KM</strong>
                <input type="text" name="initial_km" class="form-control" placeholder="Initial KM">
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Final KM</strong>
                <input type="text" name="final_km" class="form-control" placeholder="Final KM">
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Qty(ltrs)</strong>
                <input type="text" name="quantity" class="form-control" placeholder="Qty(ltrs)">
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Mileage</strong>
                <input type="text" name="mileage" class="form-control" id="vehicleMileage" readonly>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Rate</strong>
                <input type="text" name="rate" class="form-control" placeholder="Rate">
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <strong>Amount</strong>
                <input type="text" name="amount" class="form-control" placeholder="Amount">
            </div>
        </div>
    </div>
   
    <div class="row mt-5 justify-content-center">
        <button type="submit" class="btn btn-info btn-block col-md-4">Submit</button>
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
        TUV: 19,
        
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
