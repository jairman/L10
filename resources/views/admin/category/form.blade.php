<div class="form-group mb-3">
    <label for="name">Category:</label>
    <input type="text" name="name" id="name" class="form-control"
        value="{{ old('name', $category->name ?? '') }}">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="description">Description:</label>
    <input type="text" name="description" id="description" class="form-control"
        value="{{ old('description', $category->description ?? '') }}">
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="parent_id">Categories Father:</label>
    <select name="parent_id" id="parent_id" class="form-control">
        <option value="">Seleccionar Categoría Padre</option>
        @foreach ($parentCategories as $parentCategory)
            <option value="{{ $parentCategory->id }}"
                {{ old('parent_id', $category->parent_id ?? '') == $parentCategory->id ? 'selected' : '' }}>
                {{ $parentCategory->name }}</option>
        @endforeach
    </select>
</div>



<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="#" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary ms-auto ajax-submit">{{ isset($category) ? 'Actualizar' : 'Guardar' }}</button>
        </div>
    </div>
</div>
