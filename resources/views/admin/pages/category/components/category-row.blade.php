<tr>
    <td>{{ $char }} {{ $category->name }}</td>
    <td>{{ $category->posts->count() }}</td>
    <td>
        @if ($category->meta_keyword)
            @foreach (json_decode($category->meta_keyword) as $keyword)
                <span class="badge bg-light-primary text-dark-primary">{{ $keyword->value }}</span>
            @endforeach
        @endif
    </td>
    <td>{{ $category->meta_description }}</td>
    <td>
        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm bg-light-primary text-dark-primary"
            data-bs-toggle="tooltip" data-placement="top" title="Sửa">
            <i class="bi bi-pen"></i>
        </a>
        @if (Auth()->user()->can('delete category'))
            <a href="{{ route('admin.category.delete', $category->id) }}"
                onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')"
                class="me-2 btn btn-sm bg-light-danger text-dark-danger" data-bs-toggle="tooltip" data-placement="top"
                title="Xóa">
                <i class="bi bi-trash"></i>
            </a>
            {{-- @endif --}}
        @endif
    </td>
</tr>

@if ($category->allChildren->isNotEmpty())
    @foreach ($category->allChildren as $childCategory)
        @include('admin.pages.category.components.category-row', [
            'category' => $childCategory,
            'char' => $char . '|-- ',
        ])
    @endforeach
@endif
