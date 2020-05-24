<script type="text/javascript" src="{{ URL::asset('js/product.js') }}" defer></script>

<div id="products">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Manage Products</h4>
        </div>
        <div class="ml-auto p-2">
            <a href="{{ url('/admin/product/add') }}">
                <button class="btn btn-primary" type="button"><i class="fas fa-plus"></i></button>
            </a>
        </div>
    </div>

    <div id="tabelProducts">
        <br>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
        </div>

        <div class="table-overflow productContainer" id="productContainer">
            <table id="tabela" class="table table-hover productTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Current Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $item)
                    <tr id="product-{{$item->id}}">
                        <td>{{$item->model}}</td>
                        <td>
                            <form class="form-inline productForm" id="productFormID" method="POST"
                                action="{{ url('admin/product/update/'.$item->id) }}">
                                {{ csrf_field() }}
                                <div class="form-row col-xs-2">
                                    <input id="inputStock" type="number" min="0" max="10000" name="inputStock"
                                        class="form-control productStock" value='{{ $item->stock }}' required autofocus>
                                    @if ($errors->has('inputStock'))
                                    <span class="error">
                                        {{ $errors->first('inputStock') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="form-row p-2">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="fas fa-check text-success"></i></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>