<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
</head>
<body>
    <div>
    <h3>Add Product</h3>
    <form method="POST" action="" enctype="multipart/form-data">
        @csrf
        <input name='Name' type="text" placeholder="Product Name"><br>

        <select  name="Categories_id" class="form-select" aria-label="Default select example">
            <option selected>Category</option>
            @foreach ($data as $item)
            <option value={{$item->categories}}>{{$item->categories}}</option>
            @endforeach
           
           
          </select>

          <select  name="Brand_id" class="form-select" aria-label="Default select example">
            <option selected>Choose Brands</option>
            @foreach ($brands as $item)
            <option value={{$item->brand}}>{{$item->brand}}</option>
            @endforeach
           
           
          </select>



          <select  name="typecategories_id" class="form-select" aria-label="Default select example">
            <option selected>Sub Category</option>
            <option value="Featured" >Featured</option>
            <option value="Latest" >Latest</option>
            <option value="Top" >Top</option>
           
           
           
          </select>

        <input name='Description' type="text" placeholder="Product Description"><br>
        <input name='Price' type="text" placeholder="Product Price"><br>
        <label>Front View<label><input type="file" name='Picture_url1'><br>
        <label>Back View<label><input type="file" name='Picture_url2'><br>
        <label>Side View<label><input type="file" name='Picture_url3'><br>
        <label>Top View<label><input type="file" name='Picture_url4'><br>
        <input type="text" name='Color' placeholder="Product Colour"><br>
        <input type="text" name='Size' placeholder="Product Size"><br>
        <input type="text" name='SlicedPercentage' placeholder="Product Sliced Percentage"><br>
        <input type="text" name='AdditionalInfo' placeholder="Additional Information"><br>
        <button type="submit">Add Product</button>
    </form>
    <div>
</body>
</html>