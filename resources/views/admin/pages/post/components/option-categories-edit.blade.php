<option {{ in_array($category->id, $id_category) ? 'selected' : '' }} value="{{ $category->id }}"> {{ $char }} {{ $category->name }} </option>
@foreach ($category->allChildren as $key => $category)
    @include('admin.pages.post.components.option-categories', [
        'category' => $category ,
        'key' => $key,
        'char' => $char . '|-- ',
        'id_category' => $id_category,
        ])
@endforeach