<x-app-layout>

    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transfer Claim') }}
        </h2>
    </x-slot>
    <div class="container justify-content-center">
    <div class="row">
        <div class="col-lg-12 margin-tb mt-5">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}">Create New Transfer Claim</a><br><br>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered ">
        <tr>
            <th>Sl.No</th>
            <th>Employee ID</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Basic Pay</th>
            <!-- <th>Transfer Claim Date</th> -->
            <th>Transfer Claim Type</th>
            <th>Claim Amount</th>
            <th>Current Location</th>
            <th>New Location</th>
            <th width="150px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->employee_id }}</td>
            <td>{{ $product->designation }}</td>
            <td>{{ $product->department }}</td>
            <td>{{ $product->basic_pay }}</td>
            <!-- <td>{{ $product->transfer_claim_date }}</td> -->
            <td>{{ $product->transfer_claim_type }}</td>
            <td>{{ $product->claim_amount }}</td>
            <td>{{ $product->current_location }}</td>
            <td>{{ $product->new_location }}</td>
            <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    
  
    {!! $products->links() !!}
      
</x-app-layout>
