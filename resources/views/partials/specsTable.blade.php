<table class="table text-center">
    <tbody>
        <tr>
            <td>Screen size</td>
            <td>
                {{$product->screensize->value}}"
            </td>
        </tr>
        <tr>
            <td>Screen resolution</td>
            <td>
                {{$product->screenres->value}} pixels
            </td>
        </tr>
        <tr>
            <td>OS</td>
            <td>
                {{$product->os->name}}
            </td>
        </tr>
        <tr>
            <td>RAM</td>
            <td>
                {{$product->ram->value}}GB
            </td>
        </tr>
        <tr>
            <td>Weight</td>
            <td>
                {{$product->weight->value}}g
            </td>
        </tr>
        <tr>
            <td>CPU</td>
            <td>
                {{$product->cpu->cores}}-core
                {{$product->cpu->freq}} GHz
                {{$product->cpu->name}}
            </td>
        </tr>
        <tr>
            <td>GPU</td>
            <td>
                {{$product->gpu->name}}
            </td>
        </tr>
        <tr>
            <td>Water resistance rating</td>
            <td>
                {{$product->waterproofing->value}}
            </td>
        </tr>
        <tr>
            <td>Camera resolution</td>
            <td>
                {{$product->camerares->value}}MP
            </td>
        </tr>
        <tr>
            <td>Fingerprint Type</td>
            <td>
                {{$product->fingerprinttype->value}}
            </td>
        </tr>
        <tr>
            <td>Storage</td>
            <td>
                {{$product->storage->value}}GB
            </td>
        </tr>
        <tr>
            <td>Battery</td>
            <td>
                {{$product->battery->value}}mAh
            </td>
        </tr>
    </tbody>
</table>