<table class="table">
    <tbody>
        <tr>
            <td colspan ="2">Screen size</td>
            <td colspan ="2">
            {{$specs['screensize']['value']}}"
            </td>
        </tr>
        <tr>
            <td colspan ="2">Screen resolution</td>
            <td colspan ="2">
            {{$specs['screenres']['value']}} pixels
            </td>
        </tr>
        <tr>
            <td colspan ="2">OS</td>
            <td colspan ="2">
            {{$specs['os']['name']}}
            </td>
        </tr>
        <tr>
            <td colspan ="2">RAM</td>
            <td colspan ="2">
            {{$specs['ram']['value']}}GB 
            </td>
        </tr>
            <tr>
                <td colspan ="2">Weight</td>
                <td colspan ="2">
                {{$specs['weight']['value']}}g
                </td>
            </tr>
        <tr>
            <td colspan ="2">CPU</td>
            <td colspan ="2">
                {{$specs['cpu']['cores']}}-core 
            {{$specs['cpu']['freq']}} GHz
            {{$specs['cpu']['name']}}
            </td>
        </tr>
        <tr>
            <td colspan ="2">GPU</td>
            <td colspan ="2">
            {{$specs['gpu']['name']}}
            </td>
        </tr>
        <tr>
            <td colspan ="2">Water resistance rating</td>
            <td colspan ="2">
            {{$specs['waterproofing']['value']}}
            </td>
        </tr>
        <tr>
            <td colspan ="2">Camera resolution</td>
            <td colspan ="2">
            {{$specs['camerares']['value']}}MP
            </td>
        </tr>
        <tr>
            <td colspan ="2">Fingerprint Type</td>
            <td colspan ="2">
            {{$specs['fingerprint']['value']}}
            </td>
        </tr>
        <tr>
            <td colspan ="2">Storage</td>
            <td colspan ="2">
            {{$specs['storage']['value']}}GB
            </td>
        </tr>
        <tr>
            <td colspan ="2">Battery</td>
            <td colspan ="2">
            {{$specs['battery']['value']}}mAh
            </td>
        </tr>
    </tbody>
</table>
