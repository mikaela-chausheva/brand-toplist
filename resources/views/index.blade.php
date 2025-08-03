<!-- cRud -> Read functionality -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Brand Toplist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <h1>Top Brands</h1>

    @if(session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    @if($brands->isEmpty())
        <div class="message">
            No brands found.
        </div>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Brand Name</th>
                    <th>Image</th>
                    <th>Rating</th>
                    <th>Country</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $index => $brand)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $brand->brand_name }}</td>
                        <td><img src="{{ $brand->brand_image }}" alt="Logo"></td>
                        <td>{{ $brand->rating }}/5</td>
                        <td>{{ $brand->country_code ?? 'Default' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>
</html>
