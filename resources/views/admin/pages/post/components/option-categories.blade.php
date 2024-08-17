<option value="{{ $category->id }}"> {{ $char }} {{ $category->name }} </option>
@foreach ($category->allChildren as $key => $category)
    @include('admin.pages.post.components.option-categories', [
        'category' => $category ,
        'key' => $key,
        'char' => $char . '|-- ',
        ])
@endforeach