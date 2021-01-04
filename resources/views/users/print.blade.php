<div class="row">
    <a href="{{ route('htmltopdfview',['download'=>'pdf']) }}">Download PDF</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Details</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->details }}</td>
        </tr>
        @endforeach
    </table>
</div>