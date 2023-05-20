@csrf

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Product</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" name="name" value="{{ $product->name ?? old('name') }}">
    </div>
    @error('name')
        <p class="error">
            <span>{{ $message }}</span>
        </p>
    @enderror
</div>
<br>
<div class="form-group row">
    <label class="col-lg-3 col-form-label">Price</label>
    <div class="col-lg-9">
        <input type="number" class="form-control" name="price" value="{{ $product->price ?? old('price') }}">
    </div>
    @error('price')
        <p class="error">
            <span>{{ $message }}</span>
        </p>
    @enderror
</div>
<br>
<div class="form-group row">
    <label class="col-lg-3 col-form-label">Description</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" name="content"
            value="{{ $product->description ?? old('description') }}">
    </div>
    @error('content')
        <p class="error">
            <span>{{ $message }}</span>
        </p>
    @enderror
</div>
<br>
<div class="form-group row">
    <label class="col-lg-3 col-form-label">Category</label>
    <div class="col-lg-9">
        <select class="form-select form-control" name='category_id'>
            <option value="">Select Categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    @error('category_id')
        <p class="error">
            <span>{{ $message }}</span>
        </p>
    @enderror
</div>
<br>
<div class="form-group row">
    <label class="col-lg-3 col-form-label">Upload image</label>
    <div class="col-lg-9">
        <input type="file" class="form-control" name="image">
    </div>
    @error('image')
        <p class="error">
            <span>{{ $message }}</span>
        </p>
    @enderror
</div>
<br>
<div class="text-end">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
