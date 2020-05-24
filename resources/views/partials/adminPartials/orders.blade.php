<script type="text/javascript" src="{{ URL::asset('js/orders.js') }}" defer></script>
<div class="collapse" id="orders">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Orders</h4>
        </div>
    </div>
    <div class="form-group input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
    </div>

    <div class="table-overflow">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User Email</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                @if ($order->user->id != 1)
                <tr class="clickable">
                    <td>Order #{{$order->id}}</td>
                    <td>{{$order->user->email}}</td>
                    <td>{{$order->purchasedate}}</td>
                    <td>
                        <div class="input-group mb-3">
                            <select class="purchaseUpdater custom-select" id="order-{{$order->id}}">
                                <option value="Awaiting Payment"
                                    <?php echo ($order->status->pstate == 'Awaiting Payment') ? "selected":""; ?>>
                                    Awaiting Payment
                                </option>
                                <option value="Payment in-store"
                                    <?php echo ($order->status->pstate == 'Payment in-store') ? "selected":""; ?>>
                                    Payment in-store
                                </option>
                                <option value="Processing"
                                    <?php echo ($order->status->pstate == 'Processing') ? "selected":""; ?>>
                                    Processing
                                </option>
                                <option value="Sent" <?php echo ($order->status->pstate == 'Sent') ? "selected":""; ?>>
                                    Sent
                                </option>
                                <option value="Delivered"
                                    <?php echo ($order->status->pstate == 'Delivered') ? "selected":""; ?>>
                                    Delivered
                                </option>
                            </select>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>