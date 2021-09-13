<div class="m-3">
    @can('order_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.orders.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.order.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.order.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-userOrders">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.order.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.order.fields.user') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.uuid') }}
                            </th>
                            <th>
                                {{ trans('cruds.order.fields.product_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.order.fields.product_price') }}
                            </th>
                            <th>
                                {{ trans('cruds.order.fields.product_quantity') }}
                            </th>
                            <th>
                                {{ trans('cruds.order.fields.order_price') }}
                            </th>
                            <th>
                                {{ trans('cruds.order.fields.payment_gateway') }}
                            </th>
                            <th>
                                {{ trans('cruds.order.fields.payment') }}
                            </th>
                            <th>
                                {{ trans('cruds.order.fields.status') }}
                            </th>
                            <th>
                                {{ trans('cruds.order.fields.product') }}
                            </th>
                            <th>
                                {{ trans('cruds.product.fields.price') }}
                            </th>
                            <th>
                                {{ trans('cruds.product.fields.package') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $key => $order)
                            <tr data-entry-id="{{ $order->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $order->id ?? '' }}
                                </td>
                                <td>
                                    {{ $order->user->username ?? '' }}
                                </td>
                                <td>
                                    {{ $order->user->uuid ?? '' }}
                                </td>
                                <td>
                                    {{ $order->product_name ?? '' }}
                                </td>
                                <td>
                                    {{ $order->product_price ?? '' }}
                                </td>
                                <td>
                                    {{ $order->product_quantity ?? '' }}
                                </td>
                                <td>
                                    {{ $order->order_price ?? '' }}
                                </td>
                                <td>
                                    {{ $order->payment_gateway ?? '' }}
                                </td>
                                <td>
                                    {{ $order->payment ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Order::STATUS_SELECT[$order->status] ?? '' }}
                                </td>
                                <td>
                                    {{ $order->product->name ?? '' }}
                                </td>
                                <td>
                                    {{ $order->product->price ?? '' }}
                                </td>
                                <td>
                                    {{ $order->product->package ?? '' }}
                                </td>
                                <td>
                                    @can('order_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.orders.show', $order->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan



                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-userOrders:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection