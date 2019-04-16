<form action="/filter">

    <br>
    <label for="">Price</label>&emsp;
    min: <input type="text" name="min_price" value="{{Request::get('min_price')}}">&emsp;
    max: <input type="text" name="max_price" value="{{Request::get('max_price')}}">
    &emsp;&emsp;&emsp;
    <label for="">Category:</label>&emsp;
    <?php $categories = Request::has('categories') ? Request::get('categories'): [] ?>
    <input type="checkbox" name="categories[]" value="1" {{in_array(1, $categories ) ? 'checked' :'' }}>
    Phones
    &emsp;
    <input type="checkbox" name="categories[]" value="2" {{in_array(2, $categories ) ? 'checked' :'' }}>
    Laptops
    &emsp;
    <input type="checkbox" name="categories[]" value="3" {{in_array(3, $categories ) ? 'checked' :'' }}>
    Gadgets
    &emsp;

    <button>Go</button>
</form>

<hr>
