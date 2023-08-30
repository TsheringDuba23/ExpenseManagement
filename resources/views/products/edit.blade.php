<x-app-layout>    
    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Fuel Claims') }}
        </h2>
    </x-slot>
    <div class="container justify-content-center">
    <div class="row"> 
        <div class="col-lg-12 margin-tb mt-3">
            <!-- <div class="pull-left mt-5">
                <h2>Edit Transfer Claim</h2>
            </div> -->
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
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
  
    <form action="{{ route('products.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')
   
        <div class="row">
            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <strong>Employee ID</strong>
                    <input type="text" name="employee_id" value="{{ $product->employee_id }}" class="form-control" placeholder="Employee ID">
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <strong>Designation</strong>
                    <input type="text" name="designation" value="{{ $product->designation }}" class="form-control" placeholder="Designation">
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <strong>Department</strong>
                    <input type="text" name="department" value="{{ $product->department }}" class="form-control" placeholder="Department">
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <strong>Basic Pay</strong>
                    <input type="text" name="basic_pay" value="{{ $product->basic_pay }}" class="form-control" placeholder="Basic Pay">
                </div>
            </div>
            <!-- <div class="col-md-6 mt-3">
                <div class="form-group">
                    <strong>Transfer Claim Date</strong>
                    <input type="date" name="transfer_claim_date" value="{{ $product->transfer_claim_date }}" class="form-control">
                </div>
            </div> -->
            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <strong>Transfer Claim Type</strong>
                    <select class="form-select" name="transfer_claim_type" value="{{ $product->transfer_claim_type }}" placeholder="Transfer Claim Type">
                    <option selected>Select</option>
                    <option value="Transfer Grant">Transfer Grant</option>
                    <option value="Carriage Charge">Carriage Charge</option>
                </select>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <strong>Current Location</strong>
                    <input type="text" name="current_location" value="{{ $product->current_location }}" class="form-control" placeholder="Current Location">
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <strong>New Location</strong>
                    <input type="text" name="new_location" value="{{ $product->new_location }}" class="form-control" placeholder="New Location">
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <strong>Claim Amount</strong>
                    <input type="text" name="claim_amount" value="{{ $product->claim_amount }}" class="form-control" placeholder="Claim Amount">
                </div>
            </div>
        </div>
   
        <div class="row mt-5 justify-content-center">
            <button type="submit" class="btn btn-primary col-md-4">Submit</button>
        </div>
    </form>
    </div>
</x-app-layout>
