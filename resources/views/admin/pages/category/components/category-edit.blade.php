<option value="{{ $category->id }}" @if($category->id == old('parent_id', $data->parent_id)) selected @endif>
    {{ $char }} {{ $category->name }}
</option>
@if ($category->allChildren->isNotEmpty())
    @foreach ($category->allChildren as $childCategory)
        @include('admin.pages.category.components.category-edit', ['category' => $childCategory, 'char' => $char . '|-- ', 'data' => $data])
    @endforeach 
@endif 
