@extends('layouts.app')

@section('title', 'Sales | ')

@section('contents')

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Sales Table</h1><hr>
    </div>
  </div>

  <div class="row mt-2">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <style>
            /* Table styling */
            .table {
              width: 100%;
              border-collapse: collapse;
            }

            .table th,
            .table td {
              padding: 10px;
              border: 1px solid #ddd;
            }

            .table thead th {
              text-align: left; /* Align table headers to the left */
            }
          </style>

          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($sales as $sale)
                <tr>
                  <td>{{ $sale->product->title }}</td>
                  <td>{{ $sale->qty }}</td>
                  <td>{{ $sale->price }}</td>
                  <td>{{ $sale->amount }}</td>
                  <td>{{ $sale->created_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection

@push('js')
  <script type="text/javascript" src="{{asset('/')}}js/plugins/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="{{asset('/')}}js/plugins/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
  <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

@endpush