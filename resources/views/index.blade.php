<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Brand Toplist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
<h1 class="text-center mb-4">Top Brands in Your Country</h1>

    <div class="table-responsive">
    @if($brands->isEmpty())
        <div class="message">
            No brands found.
        </div>
    @else
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Brand Name</th>
                    <th>Image</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody id="brand-table-body">
                @foreach($brands as $index => $brand)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $brand->brand_name }}</td>
                        <td><img src="{{ $brand->brand_image }}" width="30px" height="30px" alt="Logo"></td>
                        <td>{{ $brand->rating }}/5</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
  </div>

</body>
</html>