

@extends('layouts.app')

@section('titel', 'Tax | ')
@section('contents')

<style>
    /* Global style for the main content */
    .app-content {
        padding: 20px;
        background-color: #f4f4f4;
    }

    /* Button Styles */
    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
        padding: 8px 16px;
        border-radius: 5px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
        padding: 8px 16px;
        border-radius: 5px;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    /* Table Styles */
    .table {
        background-color: #fff;
        border-collapse: collapse;
        width: 100%;
    }

    .table-hover tbody tr:hover {
        background-color: #f5f5f5;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
        padding: 8px;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
        background-color: #e9ecef;
    }
</style>

    <main class="app-content">
        <div class="app-title">
            
   
        </div>
        <div class="">
            <a class="btn btn-primary" href="{{route('taxs/create')}}"><i class="fa fa-plus"> </i> Add New Tax</a>
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>Tax </th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $taxes as $tax)
                            <tr>
                                <td>{{ $tax->name }} %</td>
                                @if($tax->status)
                                <td>Active</td>
                                    @else
                                    <td>Inactive</td>
                                @endif


                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('taxs/edit', $tax->id)}}"><i class="fa fa-edit" ></i></a>
                                    <button class="btn btn-danger btn-sm waves-effect" type="submit" onclick="deleteTag({{ $tax->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <form id="delete-form-{{ $tax->id }}" action="{{ route('taxs/destroy',$tax->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
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
    <script type="text/javascript">
        function deleteTag(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
