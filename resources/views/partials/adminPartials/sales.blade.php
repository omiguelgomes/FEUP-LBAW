<script type="text/javascript" src="{{ URL::asset('js/sale.js') }}" defer></script>
<div id="sales">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="mx-auto">
            <h4 class="mx-auto">Sales</h4>
        </div>
    </div>

    <div class="form-group input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
    </div>

    <div class="table-overflow">
        <table id="tabela" class="table table-hover">
            <thead>
                <tr>
                    <th>Product's Name</th>
                    <th>Discount ID</th>
                    <th>Discount (%)</th>
                    <th>Beginning Date</th>
                    <th>Ending Date</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                <tr class="sale" id='sale-{{$sale->id}}'>
                    <td>
                        @foreach($sale->products as $p)
                            <p>{{$p->model}}</p>
                        @endforeach
                    </td>
                    <td class="align-middle">{{$sale->id}}</td>
                    <td class="align-middle">{{$sale->val}}%</td>
                    <td class="align-middle">{{ $sale->begindate}}</td>
                    <td class="align-middle">{{$sale->enddate}}</td>
                    <td class="align-middle">
                        <a value="{{$sale->id}}" class="saleDelete thumbnail">
                            <i class="far fa-times-circle fa-2x ml-4 text-danger"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>