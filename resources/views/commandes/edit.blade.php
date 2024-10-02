@extends('layouts.app')

@section('title', 'Commande  | ')
@section('contents')
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.app-content {
    padding: 30px;
    background-color: #f9f9f9;
}

.app-title {
    margin: 0;
}

.invoice {
    padding: 30px;
    background-color: #f9f9f9;
}

.invoice-info {
    margin: 0;
    padding: 0;
}

.row {
    margin: 0;
    padding: 0;
}

.col-4 {
    margin: 0;
    padding: 0;
}

.table {
    border-collapse: collapse;
    width: 100%;
}

.table th,
.table td {
    text-align: left;
    padding: 8px;
    border: 1px solid #ddd;
}

.table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table tr:hover {
    background-color: #ddd;
}

.total {
    font-weight: bold;
}

.btn-primary {
    background-color: #008000;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 12px 22px;
    cursor: pointer;
}

    </style>

    <main class="app-content">

        <div class="row">
            <div class="clearix"></div>
            <div class="col-md-12">
                <div class="tile">
                    <h1 class="tile-title"><b>Edit Commande</b></h1>
                    <hr><br>
                    <div class="tile-body">
                        <form  method="POST" action="{{route('commandes/update',$invoice->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group col-md-3">
                                <label class="control-label">Customer Name</label><br>
                                <select name="customer_id" class="form-control">

                                                    
                                  @php
                                  $customer = $customers->where('id', $invoice->customer_id)->first();
                                  @endphp
                                  
                
                                    <option name="customer_id" value="{{  $customer->id  }}">{{ $customer->name }}</option>
                                    
                                    
                                    @foreach($customers as $customer)
                                        <option name="customer_id" value="{{$customer->id}}">{{$customer->name}} </option>
                                    @endforeach
                                </select>                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Date</label>
                                <input name="date" class="form-control datepicker" value="{{ $invoice->updated_at }}" type="date" placeholder="Enter your email">

                            </div>



                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col"><a class="addRow"><i class="fa fa-plus"></i></a></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b>Total</b></td>
                                    <td><b class="total"></b></td>
                                    <td></td>
                                </tr>
                                </tfoot>

                            </table>
                            <br>
                            <div >
                                <button class="btn-primary" type="submit">Submit</button>
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
                    data: {"_token": $('meta[name="csrf-token"]').attr('content'), 'id':id},
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



