

<style>
.tile-body {
  padding: 20px;
  border: 1px solid #ddd;
}

.form-group {
  margin-bottom: 15px;
}

.table {
  width: 100%;
}

.table th,
.table td {
  padding: 10px;
  border: 1px solid #ddd;
}

.total {
  font-weight: bold;
}

/* Invoice heading styling */
.invoice h3 {
  font-weight: bold;
  text-align: center; /* Center align the invoice heading */
}

/* Button styles */
.btn-primary {
  background-color: #007bff;
  color: white;
  border: none; /* Remove default button border */
  border-radius: 5px; /* Add rounded corners */
  padding: 10px 20px; /* Adjust padding for better button size */
  cursor: pointer; /* Indicate clickable behavior with cursor */
}

.addRow,
.remove {
  background-color: transparent; /* Remove default button background */
  color: #333; /* Set text color */
  border: 1px solid #ccc; /* Add a thin border */
  border-radius: 3px; /* Add subtle rounded corners */
  padding: 5px 10px; /* Adjust padding for smaller buttons */
  cursor: pointer; /* Indicate clickable behavior with cursor */
  margin-right: 5px; /* Add some margin for spacing */
}

.addRow {
  background-color: #008000;
  color: white;
}

.remove {
  color: red; /* Red for "Remove" button */
}
</style>

@extends('layouts.app')

@section('title', 'Commande | ')
@section('contents')


    <main class="app-content">


         <div class="row">
             <div class="clearix"></div>
            <div class="col-md-12">
                <div class="tile">
                    <h1 class="tile-title"><b>Commande</b></h1>
                    <div class="tile-body">
                        <form  method="POST" action="{{route('commandes/store')}}">
                            @csrf
                            <div class="form-group col-md-3">
                              <label class="control-label"><b>Customer Name</b></label><br>
                              <select name="customer_id" id="customer_id" class="form-control">
                                 <option value="">Select Customer</option>
                             @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                           @endforeach
                              </select>   
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label"><b>Date</b></label>
                                <input name="date"  class="form-control datepicker"  value="<?php echo date('Y-m-d')?>" type="date" placeholder="Enter your email">
                            </div>



                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Discount %</th>
                                <th scope="col">Amount</th>
                                <th scope="col"><a class="addRow badge badge-success text-white"><i class="fa fa-plus"></i> Add Row</a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><select name="product_id[]" class="form-control productname" >
                                        <option>Select Product</option>
                                    @foreach($products as $product)
                                            <option name="product_id[]" value="{{$product->id}}">{{$product->title}}</option>
                                        @endforeach
                                    </select></td>
                                <td><input type="text" name="qty[]" class="form-control qty" ></td>
                                <td><input type="text" name="price[]" class="form-control price" ></td>
                                <td><input type="text" name="dis[]" class="form-control dis" ></td>
                                <td><input type="text" name="amount[]" class="form-control amount" ></td>
                                <td><a   class="btn btn-danger remove"> <i class="fa fa-remove"></i></a></td>
                             </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Total</b></td>
                                <td><b  class="total"></b></td>
                                <td></td>
                            </tr>
                            </tfoot>

                        </table>
                        <br>

                            <div >
                                <button class="btn btn-primary"  type="submit">Submit</button>
                            </div>
                     </form>
                    </div>
                </div>


                </div>
            </div>







    </main>

@endsection
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
     <script src="{{asset('/')}}js/multifield/jquery.multifield.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){



            $('tbody').delegate('.productname', 'change', function () {

                var  tr = $(this).parent().parent();
                tr.find('.qty').focus();

            })

            $('tbody').delegate('.productname', 'change', function () {

                var tr =$(this).parent().parent();
                var id = tr.find('.productname').val();
                var dataId = {'id':id};
                $.ajax({
                    type    : 'GET',
                    url     :'{!! URL::route('findPrice') !!}',

                    dataType: 'json',
                    data: {"_token": $('meta[name="csrf-token"]').attr('contents'), 'id':id},
                    success:function (data) {
                        tr.find('.price').val(data.price);
                    }
                });
            });

            $('tbody').delegate('.qty,.price,.dis', 'keyup', function () {

                var tr = $(this).parent().parent();
                var qty = tr.find('.qty').val();
                var price = tr.find('.price').val();
                var dis = tr.find('.dis').val();
                var amount = (qty * price)-(qty * price * dis)/100;
                tr.find('.amount').val(amount);
                total();
            });
            function total(){
                var total = 0;
                $('.amount').each(function (i,e) {
                    var amount =$(this).val()-0;
                    total += amount;
                })
                $('.total').html(total);
            }

            $('.addRow').on('click', function () {
                addRow();

            });

            function addRow() {
                var addRow = '<tr>\n' +
                    '         <td><select name="product_id[]" class="form-control productname " >\n' +
                    '         <option value="0" selected="true" disabled="true">Select Product</option>\n' +
'                                        @foreach($products as $product)\n' +
'                                            <option value="{{$product->id}}">{{$product->title}}</option>\n' +
'                                        @endforeach\n' +
                    '               </select></td>\n' +
'                                <td><input type="text" name="qty[]" class="form-control qty" ></td>\n' +
'                                <td><input type="text" name="price[]" class="form-control price" ></td>\n' +
'                                <td><input type="text" name="dis[]" class="form-control dis" ></td>\n' +
'                                <td><input type="text" name="amount[]" class="form-control amount" ></td>\n' +
'                                <td><a   class="btn btn-danger remove"> <i class="fa fa-remove"></i></a></td>\n' +
'                             </tr>';
                $('tbody').append(addRow);
            };


            $('.remove').live('click', function () {
                var l =$('tbody tr').length;
                if(l==1){
                    alert('you cant delete last one')
                }else{

                    $(this).parent().parent().remove();

                }

            });
        });


    </script>

@endpush



