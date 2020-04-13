<thead>
    <tr>
        <th scope="col"></th>
        <th scope="col">Products</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>

        <?php if($xButton == 'true'){ ?>
            <th scope="col">Remove</th>
        <?php }?>

    </tr>
</thead>
<tbody>

<?php for($nr = 0; $nr < $phoneNr; $nr++){?>
    <tr>
        <td>
            <a href="{{ url('phone') }}">
            <img src="{{ asset('/images/tele1.jpg') }}" alt="..." style="width:80px;">
        </td>
        <td>
            <div class="card-body">
                <h5 class="card-title">Samsung Galaxy S5 (64GB - Preto) </h5>
                <h6 class="card-text">Samsung</h6>
            </div>
        </td>
        <td>1</td>
        <td>499.99€</td>

        <?php if($xButton == 'true')
        {?>
            <td>
                <a href="#" class="thumbnail">
                    <i class="far fa-times-circle fa-2x ml-4"></i>
                </a>
            </td>
        <?php }?>

    </tr>
<?php }?>