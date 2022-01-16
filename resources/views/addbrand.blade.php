
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>

       <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Brand name</label>
            <input type="text" name="brand" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>

          <select  name="category_id" class="form-select" aria-label="Default select example">
            <option selected>Category</option>
            @foreach ($data as $item)
            <option value={{$item->id}}>{{$item->categories}}</option>
            @endforeach
           
           
          </select>

          <button type="submit">submit</button>
       </form>
          
    </body>
    </html>
