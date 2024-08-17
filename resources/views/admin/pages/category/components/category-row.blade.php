<tr>
    <td>{{ $char }} {{ $category->name }}</td>
    <td>{{ $category->slug }}</td>
    <td>{{ $category->posts->count() }}</td>
    <td>
        <a href="{{ route('admin.category.delete', $category->id) }}" 
           onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" 
           class="me-2 btn btn-sm bg-light-danger text-dark-danger" 
           data-bs-toggle="tooltip" data-placement="top" title="Xóa">
            <i class="bi bi-trash"></i>
        </a>
        <a href="{{ route('admin.category.edit', $category->id) }}" 
           class="btn btn-sm bg-light-primary text-dark-primary" 
           data-bs-toggle="tooltip" data-placement="top" title="Sửa">
            <i class="bi bi-pen"></i>
        </a>
    </td>
</tr>
@if ($category->allChildren->isNotEmpty())
    @foreach ($category->allChildren as $childCategory)
        @include('admin.pages.category.components.category-row', ['category' => $childCategory, 'char' => $char . '|-- '])
    @endforeach
@endif
