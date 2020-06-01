<div id="sales">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="mx-auto">
            <h4 class="mx-auto">Sales</h4>
        </div>

        <div class="ml-auto p-2">
            <button class="btn btn-primary" type="button"><i class="fas fa-plus"></i></button>
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
                <tr>
                    <td>
                        @foreach($sale->products as $p)
                            <p>{{$p->model}}</p>
                        @endforeach
                    </td>
                    <td>{{$sale->id}}</td>
                    <td>{{$sale->val}}%</td>
                    <td>{{ $sale->begindate}}</td>
                    <td>{{$sale->enddate}}</td>
                    <td>
                        <a href="#" class="thumbnail">
                            <i class="far fa-times-circle fa-2x ml-4 text-danger"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>